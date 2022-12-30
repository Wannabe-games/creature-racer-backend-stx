<?php

namespace App\Command;

use App\Common\Service\Stacks\ReferralPoolContractManager;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ContractTestCommand extends Command
{
    public function __construct(
        private ReferralPoolContractManager $referralPoolContractManager,
        private RewardPoolContractManager $rewardPoolContractManager,
        private StakingContractManager $stakingContractManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:contract-test';

    protected function configure(): void
    {
        $this->setDescription('Open staking cycle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $verbose = (bool)$input->getOption('verbose');

        $output->writeln('Referral Pool');
        $output->writeln('=============');
        $output->writeln('getBalance: ' . $this->referralPoolContractManager->getBalance($verbose));

        $output->writeln('');

        $output->writeln('Reward Pool');
        $output->writeln('===========');
        $output->writeln('getCurrentCycle: ' . $this->rewardPoolContractManager->getCurrentCycle($verbose));
        $output->writeln('getBalance: ' . $this->rewardPoolContractManager->getBalance($verbose));
        $output->writeln('getCollectedCycleBalance: ' . $this->rewardPoolContractManager->getCollectedCycleBalance($this->rewardPoolContractManager->getCurrentCycle()));
        $output->writeln('getCycleBalance: ' . $this->rewardPoolContractManager->getCycleBalance($this->rewardPoolContractManager->getCurrentCycle(), $verbose));
        $output->writeln('getWithdrawCount: ' . $this->rewardPoolContractManager->getWithdrawCount('ST2N463GNSRTC3SE3FFQCPM1AZNWXQ54JBM3K338M', $verbose));

        $output->writeln('');

        $output->writeln('Staking');
        $output->writeln('=======');
        $output->writeln('getCurrentCycle: ' . $this->stakingContractManager->getCurrentCycle($verbose));
        $output->writeln('getTotalShare: ' . $this->stakingContractManager->getTotalShare($verbose));
        $output->writeln('getUserShare: ' . $this->stakingContractManager->getUserShare('ST2N463GNSRTC3SE3FFQCPM1AZNWXQ54JBM3K338M', $verbose));
        $output->writeln('getUserReward: ' . $this->stakingContractManager->getUserReward('ST2N463GNSRTC3SE3FFQCPM1AZNWXQ54JBM3K338M', $verbose));

        return Command::SUCCESS;
    }
}
