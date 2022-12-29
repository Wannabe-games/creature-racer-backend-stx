<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class RewardPoolContractManager extends Manager
{
    public function openNewCycle(bool $verbose = false): ?string
    {
        return $this->exec('stx-reward-pool-open-new-cycle', $verbose);
    }

    public function getCurrentCycle(bool $verbose = false): string
    {
        return $this->exec('stx-reward-pool-get-current-cycle', $verbose);
    }

    public function getCollectedCycleBalance(int $cycle, bool $verbose = false): ?string
    {
        return $this->exec('stx-reward-pool-collected-balance-in-cycle ' . $cycle, $verbose);
    }
}

// test:
// bin/stx-reward-pool-open-new-cycle.js
// php -r 'exec("bin/stx-reward-pool-open-new-cycle.js", $output); var_dump($output);'
