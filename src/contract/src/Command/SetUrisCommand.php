<?php
namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Service\Ethereum\CreatureNftContractManager;
use App\Common\Service\Ethereum\ReferralContractManager;
use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Common\Repository\Creature\CreatureRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetUrisCommand extends Command
{
    protected static $defaultName = 'app:contract:set-all-uri';

    public function __construct(
        private CreatureNftContractManager $nftContractManager,
        private ReferralContractManager $referralContractManager,
        string $name = null
    )
    {
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setDescription('Set URI on Referral and CreatureNFT contacts.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln('Start setting URIs');

        $this->nftContractManager->setUri();
        $this->referralContractManager->setUri();

        $output->writeln('Done');

        return 0;
    }
}
