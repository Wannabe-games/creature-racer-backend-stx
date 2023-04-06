<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ProviderManager extends Manager
{
    public function getTransactionStatus(string $transactionHash, bool $verbose = false): ?string
    {
        return $this->exec('stx-get-transaction-status', [$transactionHash], $verbose);
    }

    public function getBlockNumber(bool $verbose = false): int
    {
        return (int)$this->exec('stx-get-block-number', [], $verbose);
    }
}
