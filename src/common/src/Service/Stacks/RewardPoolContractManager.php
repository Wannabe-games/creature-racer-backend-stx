<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class RewardPoolContractManager extends Manager
{
    public function getBalance(bool $verbose = false): int
    {
        return (int)$this->exec('stx-reward-pool-get-balance', [], $verbose);
    }

    public function getCollectedCycleBalance(int $cycle, bool $verbose = false): int
    {
        return (int)$this->exec('stx-reward-pool-get-collected-balance', [$cycle], $verbose);
    }

    public function getCurrentCycle(bool $verbose = false): int
    {
        return (int)$this->exec('stx-reward-pool-get-current-cycle', [], $verbose);
    }

    public function getCycleBalance(int $cycle, bool $verbose = false): int
    {
        return (int)$this->exec('stx-reward-pool-get-cycle-balance', [$cycle], $verbose);
    }

    public function getWithdrawCount(string $wallet, bool $verbose = false): int
    {
        return (int)$this->exec('stx-reward-pool-get-withdrawal-count', [$wallet], $verbose);
    }

    public function openNewCycle(bool $verbose = false): ?string
    {
        return $this->exec('stx-reward-pool-open-new-cycle', [], $verbose);
    }

    public function signWithdraw(string $message, bool $verbose = false): ?string
    {
        return $this->exec('stx-reward-pool-sign-withdraw', [$message], $verbose);
    }
}
