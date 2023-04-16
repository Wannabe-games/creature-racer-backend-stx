<?php

namespace App\Command;

use App\Common\Repository\ReferralNftRepository;
use App\Common\Service\Stacks\ProviderManager;
use App\Common\Service\Stacks\ReferralNftContractManager;
use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessReferralMintAndTransferCommand extends Command
{
    public function __construct(
        private ProviderManager $providerManager,
        private ReferralNftContractManager $referralNftContractManager,
        private ReferralNftRepository $referralNftRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:referral-mint-and-transfer';

    protected function configure()
    {
        $this->setDescription('Process referral NFT mint and transfer.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $currentTime = new DateTime();

        while ($rnft = $this->referralNftRepository->getNextRnftToMint($currentTime)) {
            $mintHash = $rnft->isSpecial() ?
                $this->referralNftContractManager->specialMint($rnft->getRefCode()) :
                $this->referralNftContractManager->mint($rnft->getRefCode());
            $rnft->setMintHash($mintHash);
            $rnft->setUpdatedAt($currentTime);
            $this->referralNftRepository->flush();
        }

        while ($rnft = $this->referralNftRepository->getNextRnftToTransfer($currentTime)) {
            if ('success' === $this->providerManager->getTransactionStatus($rnft->getMintHash())) {
                $transferHash = $this->referralNftContractManager->transfer($rnft->getRefCode(), $rnft->getOwner()?->getWallet());
                $rnft->setTransferHash($transferHash);
            }
            $rnft->setUpdatedAt($currentTime);
            $this->referralNftRepository->flush();
        }

        return Command::SUCCESS;
    }
}
