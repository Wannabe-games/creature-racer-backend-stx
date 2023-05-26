<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use App\Common\Service\CommandService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ReferralNftContractManager
{
    public function __construct(
        private ContainerInterface $container
    ) {
    }

    public function getInvitationsByInvitee(string $invitee, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-get-invitations-by-invitee', [$invitee], $verbose);
    }

    public function getInvitationsByRefCode(string $refCode, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-get-invitations-by-ref-code', [$refCode], $verbose);
    }

    public function getRefcodeProfit(string $refCode, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-get-refcode-profit', [$refCode], $verbose);
    }

    public function getUriForRefCode(string $refCode): string
    {
        return $this->container->getParameter('base_url') . '/api/contract/rnft/' . urlencode($refCode) . '/metadata.json';
    }

    public function incrementInvitations(string $refCode, string $wallet, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-increment-invitations', [$refCode, $wallet], $verbose);
    }

    public function mint(string $refCode, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-mint', [$refCode, $this->getUriForRefCode($refCode)], $verbose);
    }

    public function setReferralToReceivingFixedBonus(string $refCode, bool $verbose = false): ?string
    {
        return CommandService::exec('set-referral-to-receiving-fixed-bonus', [$refCode], $verbose);
    }

    public function setUri(string $uri, bool $verbose = false): string
    {
        return CommandService::exec('stx-referral-nft-set-uri', [$uri], $verbose);
    }

    public function signMint(string $refCode, string $publicKey, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-sign-mint', [$refCode, $this->getUriForRefCode($refCode), $publicKey], $verbose);
    }

    public function specialMint(string $refCode, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-special-mint', [$refCode, $this->getUriForRefCode($refCode)], $verbose);
    }

    public function transfer(string $refCode, string $wallet, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-nft-transfer', [$refCode, $wallet], $verbose);
    }
}
