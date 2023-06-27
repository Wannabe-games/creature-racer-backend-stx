<?php

namespace App\Command;

use App\Common\Service\Stacks\ProviderManager;
use App\Common\Service\Stacks\RewardPoolContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RewardPoolOpenNewCycleCommand extends Command
{
    protected static $defaultName = 'app:reward-pool-open-new-cycle';

    public function __construct(
        private ProviderManager $providerManager,
        private RewardPoolContractManager $rewardPoolContractManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Open reward pool cycle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        do {
            $transactionHash = $this->rewardPoolContractManager->openNewCycle(true);
            sleep(5);
        } while (!$transactionHash || !in_array($this->providerManager->getTransactionStatus($transactionHash), ['pending', 'success']));

        return Command::SUCCESS;
    }
}
