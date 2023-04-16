<?php

namespace App\Command;

use App\Common\Service\Stacks\CreatureNftContractManager;
use App\Common\Service\Stacks\ReferralNftContractManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SetUrisCommand extends Command
{
    protected static $defaultName = 'app:contract:set-all-uri';

    public function __construct(
        private CreatureNftContractManager $creatureNftContractManager,
        private ReferralNftContractManager $referralNftContractManager,
        protected ContainerInterface $container,
        string $name = null
    ) {
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

        $uri = $this->container->getParameter('base_url') . 'api/nft/metadata/';
        $this->creatureNftContractManager->setUri($uri);
        $this->referralNftContractManager->setUri($uri);

        $output->writeln('Done');

        return 0;
    }
}
