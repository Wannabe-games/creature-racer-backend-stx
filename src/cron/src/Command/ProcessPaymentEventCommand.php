<?php

namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Stacks\PaymentContractManager;
use App\Common\Service\Stacks\ProviderManager;
use App\Document\Log\PaymentLog;
use App\Document\UserReferralPool;
use App\Entity\Settings;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessPaymentEventCommand extends Command
{
    public function __construct(
        private PaymentContractManager $paymentContractManager,
        private ProviderManager $providerManager,
        private SettingsRepository $settingsRepository,
        private UserReferralPoolRepository $userReferralPoolRepository,
        private UserRepository $userRepository,
        private DocumentManager $documentManager
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:payment-contract:event:payment';

    protected function configure()
    {
        $this->setDescription('Get data from payment contract.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var Settings $lastProcessedBlockNumber */
        $lastProcessedBlockNumber = $this->settingsRepository->findOneBy(['systemType' => SystemTypes::PAYMENT_LAST_BLOCK_NUMBER]);
        if (null === $lastProcessedBlockNumber) {
            $lastProcessedBlockNumber = new Settings();
            $lastProcessedBlockNumber->setSystemType(SystemTypes::PAYMENT_LAST_BLOCK_NUMBER);
            $lastProcessedBlockNumber->setValue(['block' => 0]);
        }
        $actualBlockNumber = $this->providerManager->getBlockNumber();
        $startBlockNumber = $lastProcessedBlockNumber->getValue()['block'] + 1;
        $processingBlocks = $actualBlockNumber - $startBlockNumber;
        $maxBlocksToRead = 10;
        $packages = (int)ceil($processingBlocks / $maxBlocksToRead);

        $output->writeln('Start time: ' . date('Y-m-d H:i:s'));
        $output->writeln('Start block: ' . $startBlockNumber);
        $output->writeln('Actual block: ' . $actualBlockNumber);
        $output->writeln('Block to parse: ' . $processingBlocks);
        $output->writeln('Blocks in pack: ' . $maxBlocksToRead);
        $output->writeln('Block packages: ' . $packages);

        $logsCounter = 0;
        for ($i = 0; $i < $packages; ++$i) {
            $nextBlockNumber = $startBlockNumber + ($i * $maxBlocksToRead);
            $endBlockNumber = $nextBlockNumber + $maxBlocksToRead - 1;

            if ($endBlockNumber > $actualBlockNumber) {
                $endBlockNumber = $actualBlockNumber;
            }

            $output->writeln('Parsing block from: ' . $nextBlockNumber . ' to: ' . $endBlockNumber . ' iteration: ' . $i + 1);

            $jsonString = $this->paymentContractManager->getLog($nextBlockNumber, $maxBlocksToRead);
            $jsonLogs = json_decode($jsonString, false, 512, JSON_THROW_ON_ERROR);

            if (!empty($jsonString) && empty($jsonLogs) && !is_array($jsonLogs)) {
                $lastProcessedBlockNumber->setValue(['block' => $nextBlockNumber]);
                $this->settingsRepository->save($lastProcessedBlockNumber);
                $output->writeln('Added logs: ' . $logsCounter);

                return -1;
            } elseif (empty($jsonString) && empty($jsonLogs)) {
                continue;
            }

            foreach ($jsonLogs as $log) {
                $rawData = $log->parsedLogs->args;
                $amount = hexdec($rawData[1]->hex) / 1000000000000;
                $referralAmount = hexdec($rawData[4]->hex);
                $referralPool = $referralAmount === 0 ? $referralAmount : $referralAmount / 1000000000000;

                $paymentLog = new PaymentLog();
                $paymentLog->setUserWallet(strtolower($rawData[0]));
                $paymentLog->setTimestamp((new DateTimeImmutable())->setTimestamp(hexdec($rawData[2]->hex)));
                $paymentLog->setAmountReferralPool($referralPool);
                $paymentLog->setAmountRewardPool(($amount - 0.1 - $referralPool) / 2);

                /** @var User $user */
                $user = $this->userRepository->findOneBy(
                    [
                        'wallet' => strtolower($rawData[0])
                    ]
                );

                $this->documentManager->persist($paymentLog);

                if ($user !== null && $user->getFromReferralNft() !== null) {
                    /** @var UserReferralPool $referralPoolLog */
                    $referralPoolLog = $this->userReferralPoolRepository->findOneBy(
                        [
                            'user' => $user->getFromReferralNft()->getOwner()->getId(),
                            'status' => UserReferralPoolStatus::CRON_VERIFICATION,
                            'received' => false
                        ]
                    );

                    $referralPoolLog->addPaymentLog($paymentLog);
                    $paymentLog->setUserReferralPool($referralPoolLog);
                }

                ++$logsCounter;
            }
            $this->documentManager->flush();

            $lastProcessedBlockNumber->setValue(['block' => $endBlockNumber]);
            $this->settingsRepository->save($lastProcessedBlockNumber);
        }

        $output->writeln('End time: ' . date('Y-m-d H:i:s'));
        $output->writeln('Added logs: ' . $logsCounter);

        return 0;
    }
}
