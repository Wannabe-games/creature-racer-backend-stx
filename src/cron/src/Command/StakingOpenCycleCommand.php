<?php

namespace App\Command;

use App\Common\Service\Stacks\StakingContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StakingOpenCycleCommand extends Command
{
    public function __construct(
        private StakingContractManager $stakingContractManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:staking-open-new-cycle';

    protected function configure(): void
    {
        $this->setDescription('Open Staking cycle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        do {
            $i = (int)$this->stakingContractManager->openNewCycle(true);
        } while ($i);

        return Command::SUCCESS;
    }
}
