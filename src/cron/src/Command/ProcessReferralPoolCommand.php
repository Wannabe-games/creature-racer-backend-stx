<?php

namespace App\Command;

use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Repository\ContractLogRepository;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\UserRepository;
use App\Document\UserReferralPool;
use App\Entity\ContractLog;
use App\Entity\User;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\LockableTrait;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ProcessReferralPoolCommand extends Command
{
    use LockableTrait;

    protected static $defaultName = 'app:user-referral-pool:get-settlement';

    public function __construct(
        private DocumentManager $documentManager,
        private ContractLogRepository $contractLogRepository,
        private UserReferralPoolRepository $userReferralPoolRepository,
        private UserRepository $userRepository
    ) {
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Get data for user referral pool.');
    }

    /**
     * {@inheritdoc}
     *
     * @throws MongoDBException
     * @throws Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return Command::SUCCESS;
        }

        $io = new SymfonyStyle($input, $output);
        $io->writeln('Start...');

        /** @var User[] $users */
        $users = $this->userRepository->findAll();

        $progressBar = new ProgressBar($output, count($users));
        $progressBar->start();
        $progressBar->setFormat('debug');

        foreach ($users as $user) {
            /** @var ContractLog[] $rewardTransactionForWallet */
            $rewardTransactionForWallet = $user->getWallet() ? $this->contractLogRepository->findBy(['wallet' => $user->getWallet()]) : [];

            $myReward = 0;

            foreach ($rewardTransactionForWallet as $transaction) {
                foreach ($transaction->getEvents() as $event) {
                    if (str_contains($event['asset']['recipient'], 'creature-racer-referral-pool')) {
                        $myReward += $event['asset']['amount'];
                    }
                }
            }

            $userReferralPool = $this->userReferralPoolRepository->findByFromUserId($user->getId());

            if (null === $userReferralPool) {
                $userReferralPool = $this->createUserReferralPool($user);
            }

            $userReferralPool->setMyReward($myReward);

            $this->documentManager->flush();

            $progressBar->advance();
        }

        $progressBar->finish();

        $io->success('Complete!');
        $this->release();

        return Command::SUCCESS;
    }

    /**
     * @param User $user
     * @return UserReferralPool
     */
    private function createUserReferralPool(User $user): UserReferralPool
    {
        $referralLog = new UserReferralPool();
        $referralLog->setUserId($user->getFromReferralNft()?->getOwner()?->getId());
        $referralLog->setFromUserId($user->getId());
        $referralLog->setStatus(UserReferralPoolStatus::CRON_VERIFICATION);
        $this->documentManager->persist($referralLog);

        return $referralLog;
    }
}
