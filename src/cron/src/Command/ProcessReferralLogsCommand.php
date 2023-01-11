<?php

namespace App\Command;

use App\Common\Enum\UserReferralPoolStatus;
use App\Common\Repository\Document\UserReferralPoolRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Ethereum\ReferralPoolContractManager;
use App\Document\Log\PaymentLog;
use App\Document\UserReferralPool;
use App\Entity\User;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessReferralLogsCommand extends Command
{
    protected static $defaultName = 'app:logs:referral-data';

    protected function configure()
    {
        $this->setDescription('Get data for user referral pool.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new DateTime();

        $output->writeln('-------------------------------------------------------------------------------');
        $output->writeln('Start processing referral & payment logs. ' . $date->format('Y-m-d H:i:s'));
        $output->writeln('');

        // Prepare payment logs
        $this->getApplication()->find('app:payment-contract:event:payment')->run(
            new ArrayInput(
                [
                    'command' => 'app:payment-contract:event:payment',
                ]
            ),
            $output
        );

        $output->writeln('');

        // Prepare referral pool logs
        $this->getApplication()->find('app:user-referral-pool:get-settlement')->run(
            new ArrayInput(
                [
                    'command' => 'app:user-referral-pool:get-settlement',
                ]
            ),
            $output
        );

        $output->writeln('');
        $output->writeln('End process at: ' . $date->format('Y-m-d H:i:s'));
        $output->writeln('-------------------------------------------------------------------------------');

        return 0;
    }
}
