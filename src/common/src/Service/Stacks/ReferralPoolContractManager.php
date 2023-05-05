<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use App\Common\Service\CommandService;

class ReferralPoolContractManager
{
    public function getBalance(bool $verbose = false): int
    {
        return (int)CommandService::exec('stx-referral-pool-get-balance', [], $verbose);
    }

    public function getWithdrawCount(string $wallet, bool $verbose = false): int
    {
        return (int)CommandService::exec('stx-referral-pool-get-withdrawal-count', [$wallet], $verbose);
    }

    public function signWithdraw(array $params, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-referral-pool-sign-withdraw', $params, $verbose);
    }
}
