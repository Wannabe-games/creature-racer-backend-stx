<?php

namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Enum\UserRewardPoolStatus;
use App\Common\Repository\Document\UserRewardPoolRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use App\Document\UserRewardPool;
use App\Entity\Settings;
use App\Entity\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessRewardPoolCommand extends Command
{
    public function __construct(
        private RewardPoolContractManager $rewardPoolContractManager,
        private StakingContractManager $stakingContractManager,
        private DocumentManager $documentManager,
        private UserRewardPoolRepository $userRewardPoolRepository,
        private UserRepository $userRepository,
        private SettingsRepository $settingsRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:user-reward-pool:get-settlement';

    protected function configure()
    {
        $this->setDescription('Get data for user reward pool.');
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ODM\MongoDB\MongoDBException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();

        $users = $this->userRepository->findAll();
        $cycle = $this->rewardPoolContractManager->getCurrentCycle();
        $balance = $this->rewardPoolContractManager->getCollectedCycleBalance($cycle);
        $totalShare = $this->stakingContractManager->getTotalShare();

        $output->writeln('Importing reward pool data in cycle: ' . $date->format('Y-m-d'));

        $this->verifyCycle($cycle, $output);

        $progressBar = new ProgressBar($output, count($users));
        $progressBar->start();
        $progressBar->setFormat('debug');

        /** @var User $user */
        foreach ($users as $user) {
            if (empty($user->getWallet())) {
                $progressBar->advance();

                continue;
            }
            $userShare = $this->stakingContractManager->getUserShare($user->getWallet());

            /** @var UserRewardPool $rewardLog */
            $rewardLog = $this->userRewardPoolRepository->findCycleByDate($date, $user->getId());

            if (empty($rewardLog)) {
                $rewardLog = new UserRewardPool();
                $dateToday = new \DateTime($date->format('Y-m-d'));

                $rewardLog->setCycle($cycle);
                $rewardLog->setTimestamp($dateToday);
                $rewardLog->setUser($user->getId());
                $rewardLog->setReceived(false);
                $rewardLog->setStatus(UserRewardPoolStatus::CRON_VERIFICATION);

                $this->documentManager->persist($rewardLog);
            } elseif (empty($rewardLog->getStatus())) {
                $rewardLog->setStatus(UserRewardPoolStatus::CRON_VERIFICATION);
            } elseif ($rewardLog->getStatus() != UserRewardPoolStatus::CRON_VERIFICATION) {
                $progressBar->advance();

                continue;
            }

            $rewardLog->setTotalRewardPool($balance);
            $rewardLog->setMyReward(number_format($totalShare ? $balance * ($userShare / $totalShare) : 0, 0, '.', ''));
            $rewardLog->setMyStakingPower($totalShare ? $userShare / $totalShare * 100 : 0);

            $this->documentManager->flush();

            $progressBar->advance();
        }

        $progressBar->finish();
        $output->writeln('');

        return 0;
    }

    /**
     * @param string $cycle
     * @param OutputInterface $output
     *
     * @return void
     *
     * @throws \Doctrine\ODM\MongoDB\MongoDBException
     */
    protected function verifyCycle(string $cycle, OutputInterface $output): void
    {
        $date = new \DateTime();
        $date->sub(new \DateInterval('P1D'));

        /** @var Settings|null $LastCycle */
        $LastCycle = $this->settingsRepository->findOneBy(['systemType' => SystemTypes::REWARD_POOL_CYCLE]);
        /** @var UserRewardPool $rewardPoolLog */
        $rewardPoolLog = $this->userRewardPoolRepository->getCycleFromLastDay($date->format('Y-m-d'));

        if (
            !empty($LastCycle) &&
            $cycle <= $LastCycle->getValue()['cycle'] &&
            !empty($rewardPoolLog) &&
            $rewardPoolLog->getCycle() == $cycle
        ) {
            $output->writeln('Processing is stop, because the new cycle isn\'t open.');

            exit();
        }

        if (empty($LastCycle)) {
            $LastCycle = new Settings();
            $LastCycle->setSystemType(SystemTypes::REWARD_POOL_CYCLE);
            $LastCycle->setValue(
                [
                    'cycle' => $cycle,
                    'date' => date('Y-m-d')
                ]
            );

            $this->settingsRepository->save($LastCycle);
        } elseif (
            $cycle > $LastCycle->getValue()['cycle'] &&
            $rewardPoolLog->getTimestamp()->format('Y-m-d') < date('Y-m-d')
        ) {
            $LastCycle->setValue(
                [
                    'cycle' => $cycle,
                    'date' => date('Y-m-d')
                ]
            );

            $this->settingsRepository->save($LastCycle);
        }
    }
}
