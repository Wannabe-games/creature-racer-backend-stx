<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class StakingContractManager extends Manager
{
    public function getCurrentCycle(bool $verbose = false): int
    {
        return (int)$this->exec('stx-staking-get-current-cycle', [], $verbose);
    }

    public function getTotalShare(bool $verbose = false): int
    {
        return (int)$this->exec('stx-staking-get-total-share', [], $verbose);
    }

    public function getUserShare(string $wallet, bool $verbose = false): int
    {
        return (int)$this->exec('stx-staking-get-user-share', [$wallet], $verbose);
    }

    public function getUserStakingPower(string $wallet, bool $verbose = false): float
    {
        return ($totalShare = $this->getTotalShare($verbose)) ? $this->getUserShare($wallet, $verbose) / $totalShare : 0;
    }

    public function openNewCycle(bool $verbose = false): ?string
    {
        return $this->exec('stx-staking-open-new-cycle', [], $verbose);
    }
}
