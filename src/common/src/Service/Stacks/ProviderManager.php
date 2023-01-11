<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ProviderManager extends Manager
{
    public function getBlockNumber(bool $verbose = false): int
    {
        return (int)$this->exec('stx-get-block-number', [], $verbose);
    }
}
