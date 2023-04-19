<?php

namespace App\Command;

use App\Common\Enum\UserRewardPoolStatus;
use App\Common\Repository\Document\UserRewardPoolRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use App\Document\UserRewardPool;
use App\Entity\User;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ProcessRewardPoolCommand extends Command
{
    use LockableTrait;

    protected static $defaultName = 'app:user-reward-pool:get-settlement';

    public function __construct(
        private RewardPoolContractManager $rewardPoolContractManager,
        private StakingContractManager $stakingContractManager,
        private DocumentManager $documentManager,
        private UserRewardPoolRepository $userRewardPoolRepository,
        private UserRepository $userRepository
    ) {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Get data for user reward pool.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return Command::SUCCESS;
        }

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Start...');

        $rewardPoolCycle = $this->rewardPoolContractManager->getCurrentCycle();
        $rewardPoolBalance = $this->rewardPoolContractManager->getCollectedCycleBalance($rewardPoolCycle);
        $stakingCycle = $this->stakingContractManager->getCurrentCycle();
        $totalStakingShare = $this->stakingContractManager->getTotalShare();

        if ($rewardPoolCycle !== $stakingCycle) {
            $io->error('Error! Different cycle numbers (reward pool: ' . $rewardPoolCycle . ', staking cycle: ' . $stakingCycle . ').');
            $this->release();
            return Command::FAILURE;
        }

        $output->writeln('Reward pool cycle: ' . $rewardPoolCycle);
        $output->writeln('Reward pool balance: ' . $rewardPoolBalance);
        $output->writeln('Staking cycle: ' . $stakingCycle);
        $output->writeln('Staking total share: ' . $totalStakingShare);

        /** @var User[] $users */
        $users = $this->userRepository->findAll();

        $progressBar = new ProgressBar($output, count($users));
        $progressBar->start();
        $progressBar->setFormat('debug');

        foreach ($users as $user) {
            if (empty($user->getWallet())) {
                $progressBar->advance();
                continue;
            }

            /** @var UserRewardPool $userRewardPool */
            $userRewardPool = $this->userRewardPoolRepository->findCycleByUser($user->getId(), $rewardPoolCycle);

            if (null === $userRewardPool) {
                $userRewardPool = $this->createUserRewardPool($user, $rewardPoolCycle);
            }

            $userStakingShare = $this->stakingContractManager->getUserShare($user->getWallet());
            $userStakingPower = $totalStakingShare ? $userStakingShare / $totalStakingShare : 0;
            $userRewardPool->setMyStakingPower($userStakingPower * 100);
            $userRewardPool->setMyReward(round($userStakingPower * $rewardPoolBalance));
            $userRewardPool->setTotalRewardPool($rewardPoolBalance);

            $this->documentManager->flush();
            $progressBar->advance();
        }

        $progressBar->finish();

        $io->success('Complete!');
        $this->release();

        return Command::SUCCESS;
    }

    /**
     * @param int $rewardPoolCycle
     * @param User $user
     * @return UserRewardPool
     */
    private function createUserRewardPool(User $user, int $rewardPoolCycle): UserRewardPool
    {
        $userRewardPool = new UserRewardPool();
        $userRewardPool->setCycle($rewardPoolCycle);
        $userRewardPool->setUserId($user->getId());
        $userRewardPool->setReceived(false);
        $userRewardPool->setStatus(UserRewardPoolStatus::CRON_VERIFICATION);
        $this->documentManager->persist($userRewardPool);

        return $userRewardPool;
    }
}
