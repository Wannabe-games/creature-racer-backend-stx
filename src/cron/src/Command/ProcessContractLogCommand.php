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
    private string $contractMatchPattern;

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
        $this->setDescription('Get contracts log data.');
        $this->contractMatchPattern = '/^' . $this->container->getParameter('deployer_contract_address') . '\.([\w-]+)-v([1-9][0-9]?)/';
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

        $output->write('Start time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
            $output->writeln('Last processed block: ' . $lastProcessedBlock);
            $output->writeln('Actual block: ' . $actualBlock);
            $output->writeln('Block to parse: ' . $processingBlocks);
            $output->writeln('Blocks in pack: ' . $maxBlocksToRead);
            $output->writeln('Block packages: ' . $packages);
        }

        $addedLogs = 0;

        for ($i = 0; $i < $packages; ++$i) {
            $nextBlock = $lastProcessedBlock + ($i * $maxBlocksToRead) + 1;
            $endBlock = $lastProcessedBlock + ($i * $maxBlocksToRead) + $maxBlocksToRead;

            if ($endBlock > $actualBlock) {
                $endBlock = $actualBlock;
            }

            if ($output->isVerbose()) {
                $output->writeln('Parsing block from: ' . $nextBlock . ', to: ' . $endBlock . ', iteration: ' . ($i + 1) . ' of ' . $packages);
            }

            $log = $this->providerManager->getLog($nextBlock, $maxBlocksToRead);

            if (!is_array($log)) {
                $output->write('End time: ' . date('Y-m-d H:i:s '));

                if ($output->isVerbose()) {
                    $output->writeln('');
                }

                $output->writeln('Added logs: ' . $addedLogs);

                $this->release();

                return Command::INVALID;
            }

            foreach ($log as $rowData) {
                $paymentLog = $this->createPaymentLog($rowData);

                if (!$paymentLog || $this->contractLogRepository->find($paymentLog->getId())) {
                    continue;
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

                $output->write('End time: ' . date('Y-m-d H:i:s '));

                if ($output->isVerbose()) {
                    $output->writeln('');
                }

                $output->writeln('Error adding log: ' . $e->getMessage());

                $this->release();

                return Command::INVALID;
            }

            $this->contractLogRepository->commitTransaction();

            sleep(5);
        }

        $output->write('End time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
        }

        $output->writeln('Added logs: ' . $addedLogs);

        $this->release();

        return Command::SUCCESS;
    }

    private function createPaymentLog(mixed $rowData): ?ContractLog
    {
        if ('contract_call' !== $rowData?->tx_type || !preg_match($this->contractMatchPattern, $rowData?->contract_call->contract_id, $contract)) {
            return null;
        }

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
        $paymentLog->setStatus($rowData?->tx_status);
        $paymentLog->setCreatedAt(new DateTime($rowData?->burn_block_time_iso));

        if ((int)$rowData?->event_count > 0) {
            $paymentLog->setEvents($this->providerManager->getTransactionDetails($rowData?->tx_id)->events ?? []);
        }

        return $paymentLog;
    }
}
