<?php
namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Service\Ethereum\PaymentContractManager;
use App\Common\Service\Ethereum\ProviderManager;
use App\Common\Service\Ethereum\StakingContractManager;
use App\Document\Log\PaymentLog;
use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Common\Repository\Creature\CreatureRepository;
use App\Entity\Settings;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StakingOpenCycleCommand extends Command
{
    public function __construct(
        private StakingContractManager $stakingContractManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:staking-contract:cycle:open';

    protected function configure()
    {
        $this
            ->setDescription('Open Staking cycle.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        do {
            $i = (int)$this->stakingContractManager->openNewCycle();

        } while ($i);

        return 0;
    }
}
