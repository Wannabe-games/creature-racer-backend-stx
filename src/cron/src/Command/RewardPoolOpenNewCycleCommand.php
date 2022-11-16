<?php
namespace App\Command;

use App\Common\Service\Ethereum\RewardPoolContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RewardPoolOpenNewCycleCommand extends Command
{
    public function __construct(
        private RewardPoolContractManager $rewardPoolContractManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:reward-pool-contract:cycle:open';

    protected function configure()
    {
        $this
            ->setDescription('Open Reward Pool cycle.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        do {
            $i = (int)$this->rewardPoolContractManager->openNewCycle();

        } while ($i);

        return 0;
    }
}
