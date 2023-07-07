<?php

namespace App\Command;

use App\Common\Repository\ContractLogRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Service\Stacks\ProviderManager;
use App\Entity\ContractLog;
use DateTime;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProcessContractLogCommand2 extends Command
{
    use LockableTrait;

    protected static $defaultName = 'app:contract-log-2';
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
        $this->setDescription('Get data from payment contract.');
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

        $output->write('Start time: ' . date('Y-m-d H:i:s '));

        if ($output->isVerbose()) {
            $output->writeln('');
        }

        $wallet = $this->container->getParameter('operator_contract_address');
        $addedLogs = 0;
        $limit = 50;
        $total = $limit;

        for ($offset = 0; $offset < $total; $offset += $limit) {
            $log = $this->providerManager->getLogByWallet($wallet, $offset, $limit);
            $total = (int)$log?->total;

            if ($output->isVerbose()) {
                $output->writeln('Parsing rows: ' . ($offset + 1) . '-' . min($offset + $limit, $total));
            }

            if (!is_array($log?->results)) {
                $output->write('End time: ' . date('Y-m-d H:i:s '));

                if ($output->isVerbose()) {
                    $output->writeln('');
                }

                $output->writeln('Added logs: ' . $addedLogs);

                $this->release();

                return Command::INVALID;
            }

            foreach ($log->results as $rowData) {
                $paymentLog = $this->createPaymentLog($rowData->tx);

                if (!$paymentLog) {
                    continue;
                }

                if ($this->contractLogRepository->find($paymentLog->getId())) {
                    break;
                }

                $this->contractLogRepository->persist($paymentLog);

                $addedLogs++;
            }

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
