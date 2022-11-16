<?php
namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\SettingsRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Ethereum\ReferralPoolContractManager;
use App\Common\Service\Ethereum\StakingContractManager;
use App\Document\Log\PaymentLog;
use App\Document\UserReferralPool;
use App\Entity\Settings;
use App\Entity\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessReferralPoolCommand extends Command
{
    public function __construct(
        private DocumentManager $documentManager,
        private UserReferralPoolRepository $userReferralPoolRepository,
        private UserRepository $userRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:user-referral-pool:get-settlement';

    protected function configure()
    {
        $this->setDescription('Get data for user referral pool.');
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ODM\MongoDB\MongoDBException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();
        $users = $this->userRepository->findAll();

        $output->writeln('Importing referral pool data: '.$date->format('Y-m-d'));

        $progressBar = new ProgressBar($output, count($users));
        $progressBar->start();
        $progressBar->setFormat('debug');

        /** @var User $user */
        foreach ($users as $user) {
            if (empty($user->getWallet())) {
                $progressBar->advance();

                continue;
            }

            /** @var UserReferralPool $referralLog */
            $referralLog = $this->userReferralPoolRepository->findForProcess($user->getId());

            if (empty($referralLog)) {
                $referralLog = new UserReferralPool();
                $dateToday = new \DateTime($date->format('Y-m-d'));

                $referralLog->setTimestamp($dateToday);
                $referralLog->setUser($user->getId());
                $referralLog->setStatus(UserReferralPoolStatus::CRON_VERIFICATION);

                $this->documentManager->persist($referralLog);
            } elseif (empty($referralLog->getStatus())) {
                $referralLog->setStatus(UserReferralPoolStatus::CRON_VERIFICATION);
                $referralLog->setChangeStatusDate(new \DateTime());
            } elseif ($referralLog->getStatus() != UserReferralPoolStatus::CRON_VERIFICATION) {
                $progressBar->advance();

                continue;
            }

            $referralLog->setMyReward('0');

            if (!$referralLog->getPaymentLogs()->isEmpty()) {
                /** @var PaymentLog $paymentLog */
                foreach ($referralLog->getPaymentLogs() as $paymentLog) {
                    $referralLog->setMyReward(number_format((int)$referralLog->getMyReward()+$paymentLog->getAmountReferralPool(),0,'.',''));
                }
            }

            $this->documentManager->flush();

            $progressBar->advance();
        }

        $progressBar->finish();
        $output->writeln('');

        return 0;
    }
}
