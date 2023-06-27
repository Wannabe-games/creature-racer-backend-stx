<?php

namespace App\Command;

use App\Common\Enum\UserRewardPoolStatus;
use App\Common\Repository\Document\UserRewardPoolRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use App\Document\UserRewardPool;
use App\Entity\User;
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

        $rewardPoolCycle = $this->rewardPoolContractManager->getCurrentCycle();
        $rewardPoolBalance = $this->rewardPoolContractManager->getCollectedCycleBalance($rewardPoolCycle);
        $stakingCycle = $this->stakingContractManager->getCurrentCycle();
        $totalStakingShare = $this->stakingContractManager->getTotalShare();

        if ($rewardPoolCycle < 1 || $stakingCycle < 1 || $rewardPoolCycle !== $stakingCycle) {
            $io->error('Error! Wrong cycle numbers (reward pool: ' . $rewardPoolCycle . ', staking cycle: ' . $stakingCycle . ').');
            $this->release();
            return Command::FAILURE;
        }

        $output->write('Start time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
        }

        /** @var User[] $users */
        $users = $this->userRepository->findAll();
        $count = count($users);

        if ($count > 0) {
            $progressBar = new ProgressBar($output, $count);
            $progressBar->setFormat('debug');

            if ($output->isVerbose()) {
                $output->writeln('Reward pool cycle: ' . $rewardPoolCycle);
                $output->writeln('Reward pool balance: ' . $rewardPoolBalance);
                $output->writeln('Staking cycle: ' . $stakingCycle);
                $output->writeln('Staking total share: ' . $totalStakingShare);
                $progressBar->start();
            }

            foreach ($users as $user) {
                if ($output->isVerbose()) {
                    $progressBar->display();
                }

                if (empty($user->getWallet())) {
                    if ($output->isVerbose()) {
                        $progressBar->advance();
                    }
                    continue;
                }

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

                if ($output->isVerbose()) {
                    $progressBar->advance();
                }

                sleep(1);
            }

            if ($output->isVerbose()) {
                $progressBar->finish();
                $output->writeln('');
            }
        }

        $output->write('End time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
        }

        $output->writeln('Update users: ' . $count);

        if ($output->isVerbose()) {
            $io->success('Complete!');
        }

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
