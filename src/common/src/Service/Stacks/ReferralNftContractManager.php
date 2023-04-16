<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ReferralNftContractManager extends Manager
{
    public function getInvitationsByInvitee(string $invitee, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-get-invitations-by-invitee', [$invitee], $verbose);
    }

    public function getInvitationsByRefCode(string $refCode, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-get-invitations-by-ref-code', [$refCode], $verbose);
    }

    public function getRefcodeProfit(string $refCode, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-get-refcode-profit', [$refCode], $verbose);
    }

    public function incrementInvitations(string $refCode, string $wallet, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-increment-invitations', [$refCode, $wallet], $verbose);
    }

    public function mint(string $refCode, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-mint', [$refCode], $verbose);
    }

    public function setUri(string $uri, bool $verbose = false): string
    {
        return $this->exec('stx-referral-nft-set-uri', [$uri], $verbose);
    }

    public function specialMint(string $refCode, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-special-mint', [$refCode], $verbose);
    }

    public function transfer(string $refCode, string $wallet, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-nft-transfer', [$refCode, $wallet], $verbose);
    }
}
