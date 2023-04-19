<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class ProviderManager extends Manager
{
    public function getBlockNumber(bool $verbose = false): int
    {
        return (int)$this->exec('stx-get-block-number', [], $verbose);
    }

    public function getLog(int $startBlock = 1, int $maxBlocksToRead = 10, bool $verbose = false): string
    {
        return $this->exec('stx-get-log', [$startBlock, $maxBlocksToRead], $verbose);
    }

    public function getTransactionDetails(string $transactionHash, bool $verbose = false): ?string
    {
        return $this->exec('stx-get-transaction-details', [$transactionHash], $verbose);
    }

    public function getTransactionStatus(string $transactionHash, bool $verbose = false): ?string
    {
        return $this->exec('stx-get-transaction-status', [$transactionHash], $verbose);
    }
}
