<?php

namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Repository\SettingsRepository;
use App\Common\Service\Stacks\ProviderManager;
use App\Entity\Settings;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetBlockNumberCommand extends Command
{
    protected static $defaultName = 'app:payment-contract:set-start-block-number';

    public function __construct(
        private ProviderManager $providerManager,
        private SettingsRepository $settingsRepository
    ) {
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Set payment contract start block number')
            ->setDefinition(
                [
                    new InputArgument('block-number', InputArgument::OPTIONAL, 'Number of last block', $this->providerManager->getBlockNumber()),
                ]
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $blockNumber = (int)$input->getArgument('block-number');

        /** @var Settings $lastProcessedBlockNumber */
        $lastProcessedBlockNumber = $this->settingsRepository->findOneBy(
            [
                'systemType' => SystemTypes::PAYMENT_LAST_BLOCK_NUMBER,
            ]
        );

        if (null === $lastProcessedBlockNumber) {
            $lastProcessedBlockNumber = new Settings();
            $lastProcessedBlockNumber->setSystemType(SystemTypes::PAYMENT_LAST_BLOCK_NUMBER);
        }

        $lastProcessedBlockNumber->setValue(['block' => $blockNumber > 0 ? $blockNumber - 1 : 0]);

        $this->settingsRepository->save($lastProcessedBlockNumber);

        return Command::SUCCESS;
    }
}
