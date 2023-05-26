<?php

namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Repository\ContractLogRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Service\Stacks\ProviderManager;
use App\Entity\ContractLog;
use App\Entity\Settings;
use DateTime;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProcessContractLogCommand extends Command
{
    use LockableTrait;

    protected static $defaultName = 'app:contract-log';

    public function __construct(
        private ContainerInterface $container,
        private ProviderManager $providerManager,
        private ContractLogRepository $contractLogRepository,
        private SettingsRepository $settingsRepository
    ) {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Get data from payment contract.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return Command::SUCCESS;
        }

        /** @var Settings $lastProcessedBlockSettings */
        $lastProcessedBlockSettings = $this->settingsRepository->findOneBy(['systemType' => SystemTypes::PAYMENT_LAST_BLOCK_NUMBER]);

        if (null === $lastProcessedBlockSettings) {
            $lastProcessedBlockSettings = new Settings();
            $lastProcessedBlockSettings->setSystemType(SystemTypes::PAYMENT_LAST_BLOCK_NUMBER);
            $lastProcessedBlockSettings->setValue(['block' => 0]);
        }

        $maxBlocksToRead = 50;
        $lastProcessedBlock = $lastProcessedBlockSettings->getValue()['block'];
        $actualBlock = $this->providerManager->getBlockNumber();
        $processingBlocks = $actualBlock - $lastProcessedBlock;
        if ($processingBlocks < 0) {
            $processingBlocks = 0;
        }
        $packages = (int)ceil($processingBlocks / $maxBlocksToRead);
        $contractIdMatchPattern = '/^' . $this->container->getParameter('referral_pool_contract_address') . '\.([\w-]+)-v([1-9][0-9]?)/';

        $output->writeln('Start time: ' . date('Y-m-d H:i:s'));
        $output->writeln('Last processed block: ' . $lastProcessedBlock);
        $output->writeln('Actual block: ' . $actualBlock);
        $output->writeln('Block to parse: ' . $processingBlocks);
        $output->writeln('Blocks in pack: ' . $maxBlocksToRead);
        $output->writeln('Block packages: ' . $packages);

        $addedLogs = 0;

        for ($i = 0; $i < $packages; ++$i) {
            $nextBlock = $lastProcessedBlock + ($i * $maxBlocksToRead) + 1;
            $endBlock = $lastProcessedBlock + ($i * $maxBlocksToRead) + $maxBlocksToRead;

            if ($endBlock > $actualBlock) {
                $endBlock = $actualBlock;
            }

            $output->writeln('Parsing block from: ' . $nextBlock . ', to: ' . $endBlock . ', iteration: ' . $i + 1);

            $log = $this->providerManager->getLog($nextBlock, $maxBlocksToRead);

            if (empty($log)) {
                $lastProcessedBlockSettings->setValue(['block' => $nextBlock]);
                $this->settingsRepository->save($lastProcessedBlockSettings);

                continue;
            } elseif (!is_array($log)) {
                $lastProcessedBlockSettings->setValue(['block' => $nextBlock]);
                $this->settingsRepository->save($lastProcessedBlockSettings);

                $output->writeln('End time: ' . date('Y-m-d H:i:s'));
                $output->writeln('Added logs: ' . $addedLogs);

                $this->release();

                return Command::INVALID;
            }

            foreach ($log as $rowData) {
                if ('contract_call' !== $rowData?->tx_type || 'success' !== $rowData?->tx_status) {
                    continue;
                }

                if (!preg_match($contractIdMatchPattern, $rowData?->contract_call->contract_id, $contract)) {
                    continue;
                }
//print_r($rowData);exit;
                $paymentLog = new ContractLog();
                $paymentLog->setId($rowData?->tx_id);
                $paymentLog->setBlockHeight($rowData?->block_height);
                $paymentLog->setWallet($rowData?->sender_address);
                $paymentLog->setFee($rowData?->fee_rate);
                $paymentLog->setPostConditions($rowData?->post_conditions);
                $paymentLog->setContractName($contract[1]);
                $paymentLog->setContractVersion($contract[2]);
                $paymentLog->setContractFunctionName($rowData?->contract_call->function_name);
                $paymentLog->setContractFunctionArgs($rowData?->contract_call->function_args);
                $paymentLog->setCreatedAt(new DateTime($rowData?->burn_block_time_iso));
                if ($rowData?->event_count > 0) {
                    $paymentLog->setEvents($this->providerManager->getTransactionDetails($rowData?->tx_id)->events ?? []);
                }
                $this->contractLogRepository->persist($paymentLog);

                $addedLogs++;
            }

            $lastProcessedBlockSettings->setValue(['block' => $endBlock]);

            $this->contractLogRepository->beginTransaction();

            try {
                $this->contractLogRepository->flush();
            } catch (Exception $e) {
                $this->contractLogRepository->rollbackTransaction();

                $output->writeln('End time: ' . date('Y-m-d H:i:s'));
                $output->writeln('Error adding log: ' . $e->getMessage());

                $this->release();

                return Command::INVALID;
            }

            $this->contractLogRepository->commitTransaction();
        }

        $output->writeln('End time: ' . date('Y-m-d H:i:s'));
        $output->writeln('Added log: ' . $addedLogs);

        $this->release();

        return Command::SUCCESS;
    }
}
