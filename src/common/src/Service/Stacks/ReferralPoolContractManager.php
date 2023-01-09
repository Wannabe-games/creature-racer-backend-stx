<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ReferralPoolContractManager extends Manager
{
    public function getBalance(bool $verbose = false): int
    {
        return (int)$this->exec('stx-referral-pool-get-balance', [], $verbose);
    }

    public function signWithdraw(string $message, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-pool-sign-withdraw', [$message], $verbose);
    }
}
