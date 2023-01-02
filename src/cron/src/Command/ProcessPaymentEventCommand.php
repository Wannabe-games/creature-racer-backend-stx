<?php
namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Ethereum\PaymentContractManager;
use App\Common\Service\Ethereum\ProviderManager;
use App\Document\Log\PaymentLog;
use App\Document\UserReferralPool;
use App\Entity\Settings;
use App\Entity\User;
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
        $lastProcessedBlockNumber = $this->settingsRepository->findOneBy([
            'systemType' => SystemTypes::PAYMENT_LAST_BLOCK_NUMBER,
        ]);
        $blockNumber = $this->providerManager->getBlockNumber();

        $lastBlockNumber = (int)$lastProcessedBlockNumber->getValue()['block'];

        $output->writeln('Start time: '.date('Y-m-d H:i:s'));
        $output->writeln('Start block: '.$lastBlockNumber);
        $output->writeln('Actual block: '.$blockNumber);

        $processingBlocks = $blockNumber-$lastBlockNumber;

        $output->writeln('Block to parse: '.$processingBlocks);
        $packages = (int)ceil($processingBlocks/2000);
//        dump($packages);
        $output->writeln('Block packages: '.$packages);

        $logsCounter = 0;
        for ($i = 0; $i < $packages; ++$i) {
            $nextBlock = $lastBlockNumber+($i*2000);
//            dump($nextBlock);
            $jsonString = $this->paymentContractManager->getLog($nextBlock);
            $jsonLogs = json_decode($jsonString);
//            dump($jsonLogs);
            $output->writeln('Parsing block from: '.$nextBlock.' to: '.($nextBlock+2000).' iteration: '.$i+1);

            if (!empty($jsonString) && empty($jsonLogs) && !is_array($jsonLogs)) {
                $lastProcessedBlockNumber->setValue(['block' => $nextBlock]);
                $this->settingsRepository->save($lastProcessedBlockNumber);
                $output->writeln('Added logs: '.$logsCounter);

                return -1;
            } elseif (empty($jsonString) && empty($jsonLogs)) {
                continue;
            }

            foreach ($jsonLogs as $log) {
                $rawData = $log->parsedLogs->args;
                $amount = hexdec($rawData[1]->hex) / 1000000000000;
                $referralAmount = hexdec($rawData[4]->hex);
                $referralPool = $referralAmount == 0 ? $referralAmount : $referralAmount / 1000000000000;

                $paymentLog = new PaymentLog();
                $paymentLog->setUserWallet(strtolower($rawData[0]));
                $paymentLog->setTimestamp((new \DateTimeImmutable())->setTimestamp(hexdec($rawData[2]->hex)));
                $paymentLog->setAmountReferralPool($referralPool);
                $paymentLog->setAmountRewardPool(($amount-0.1-$referralPool)/2);

                /** @var User $user */
                $user = $this->userRepository->findOneBy([
                    'wallet' => strtolower($rawData[0])
                ]);

                $this->documentManager->persist($paymentLog);

                if (
                    !empty($user) &&
                    !empty($user->getFromReferralNft())
                ) {
                    /** @var UserReferralPool $referralPoolLog */
                    $referralPoolLog = $this->userReferralPoolRepository->findOneBy([
                        'user' => $user->getFromReferralNft()->getOwner()->getId(),
                        'status' => UserReferralPoolStatus::CRON_VERIFICATION,
                        'isReceived' => false
                    ]);

                    $referralPoolLog->addPaymentLog($paymentLog);
                    $paymentLog->setUserReferralPool($referralPoolLog);
                }

                ++$logsCounter;
            }
            $this->documentManager->flush();

            $lastProcessedBlockNumber->setValue(['block' => $nextBlock+2000]);
            $this->settingsRepository->save($lastProcessedBlockNumber);
        }

        $output->writeln('End time: '.date('Y-m-d H:i:s'));
        $output->writeln('Added logs: '.$logsCounter);

        return 0;
    }
}
