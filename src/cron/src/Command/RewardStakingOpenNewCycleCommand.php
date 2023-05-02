<?php

namespace App\Command;

use App\Common\Service\Stacks\ProviderManager;
use App\Common\Service\Stacks\StakingContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RewardStakingOpenNewCycleCommand extends Command
{
    public function __construct(
        private ProviderManager $providerManager,
        private StakingContractManager $stakingContractManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:reward-staking-open-new-cycle';

    protected function configure(): void
    {
        $this->setDescription('Open staking cycle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        do {
            $transactionHash = $this->stakingContractManager->openNewCycle(true);
            sleep(1);
        } while (!$transactionHash || 'pending' !== $this->providerManager->getTransactionStatus($transactionHash));

        return Command::SUCCESS;
    }
}
