<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ReferralContractManager extends Manager
{
    public function setUri(string $uri, bool $verbose = false): string
    {
        return $this->exec('stx-referral-set-uri', [$uri], $verbose);
    }

    public function incrementInvitations(string $refCode, string $wallet, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-increment-invitations', [$refCode, $wallet], $verbose);
    }

    public function mint(string $refCode, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-mint', [$refCode], $verbose);
    }

    public function specialMint(string $refCode, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-special-mint', [$refCode], $verbose);
    }

    public function transfer(string $refCode, string $wallet, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-transfer', [$refCode, $wallet], $verbose);
    }
}
