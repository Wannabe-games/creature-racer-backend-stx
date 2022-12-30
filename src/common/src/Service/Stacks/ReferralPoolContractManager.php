<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ReferralPoolContractManager extends Manager
{
    public function getBalance(bool $verbose = false): int
    {
        return (int)$this->exec('stx-referral-pool-get-balance', $verbose);
    }
}
