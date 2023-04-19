<?php

namespace App\Command;

use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Stacks\StakingContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class RewardOpenNewCycleCommand extends Command
{
    use LockableTrait;

    protected static $defaultName = 'app:reward-open-new-cycle';

    public function __construct(
        private RewardPoolContractManager $rewardPoolContractManager,
        private StakingContractManager $stakingContractManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Open all cycle.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return Command::SUCCESS;
        }

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Start...');

        $rewardPoolCycle = $this->rewardPoolContractManager->getCurrentCycle();
        $stakingCycle = $this->stakingContractManager->getCurrentCycle();

        if ($rewardPoolCycle !== $stakingCycle) {
            $io->error('Error! Different cycle numbers (reward pool: ' . $rewardPoolCycle . ', staking cycle: ' . $stakingCycle . ').');
            $this->release();
            return Command::FAILURE;
        }

        $this->getApplication()->find('app:reward-pool-open-new-cycle')->run(new ArrayInput([]), $output);
        $this->getApplication()->find('app:reward-staking-open-new-cycle')->run(new ArrayInput([]), $output);

        $io->success('Complete!');
        $this->release();

        return Command::SUCCESS;
    }
}
