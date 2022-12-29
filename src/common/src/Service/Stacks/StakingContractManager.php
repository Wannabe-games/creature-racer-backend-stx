<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class StakingContractManager extends Manager
{
    public function openNewCycle(bool $verbose = false): ?string
    {
        return $this->exec('stx-staking-open-new-cycle', $verbose);
    }

    public function getTotalShare(bool $verbose = false): ?string
    {
        return $this->exec('stx-staking-get-total-share', $verbose);
    }

    public function getUserShare(string $wallet, bool $verbose = false): ?string
    {
        return $this->exec('stx-staking-get-user-share ' . $wallet, $verbose);
    }
}

// test:
// bin/stx-staking-open-new-cycle.js
// php -r 'exec("bin/stx-staking-open-new-cycle.js", $output); var_dump($output);'
