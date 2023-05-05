<?php

namespace App\Command;

use App\Common\Repository\ReferralNftRepository;
use App\Common\Repository\UserRepository;
use App\Common\Service\Stacks\ProviderManager;
use App\Common\Service\Stacks\ReferralNftContractManager;
use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProcessReferralNftCommand extends Command
{
    public function __construct(
        private ProviderManager $providerManager,
        private ReferralNftContractManager $referralNftContractManager,
        private ReferralNftRepository $referralNftRepository,
        private UserRepository $userRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:referral-nft:set-refcodes';

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
            $this->referralNftRepository->save($rnft);
        }

        while ($rnft = $this->referralNftRepository->getNextRnftToTransfer($currentTime)) {
            if ($rnft->getMintHash() && 'success' === $this->providerManager->getTransactionStatus($rnft->getMintHash())) {
                $transferHash = $this->referralNftContractManager->transfer($rnft->getRefCode(), $rnft->getOwner()?->getWallet());
                $rnft->setTransferHash($transferHash);
            }
            $rnft->setUpdatedAt($currentTime);
            $this->referralNftRepository->save($rnft);
        }

        while ($user = $this->userRepository->getNextRnftToIncrementInvitation($currentTime)) {
            if ($user->getFromReferralNft()?->getTransferHash() && 'success' === $this->providerManager->getTransactionStatus($user->getFromReferralNft()?->getTransferHash())) {
                $incrementInvitationHash = $this->referralNftContractManager->incrementInvitations($user->getFromReferralNft()?->getRefCode(), $user->getWallet());
                $user->setIncrementInvitationHash($incrementInvitationHash);
            }
            $user->setUpdatedAt($currentTime);
            $this->userRepository->save($user);
        }

        return Command::SUCCESS;
    }
}
