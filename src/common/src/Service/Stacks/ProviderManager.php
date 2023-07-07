<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use App\Common\Service\CommandService;
use stdClass;

class ProviderManager
{
    public function getBlockNumber(bool $verbose = false): int
    {
        return (int)CommandService::exec('stx-get-block-number', [], $verbose);
    }

    public function getLog(int $startBlock = 1, int $maxBlocksToRead = 10, bool $verbose = false): ?array
    {
        return json_decode(CommandService::exec('stx-get-log', [$startBlock, $maxBlocksToRead], $verbose), false, 512, JSON_THROW_ON_ERROR);
    }

    public function getLogByWallet(string $wallet, int $offset = 0, int $limit = 50, bool $verbose = false): ?stdClass
    {
        return json_decode(CommandService::exec('stx-get-log-by-wallet', [$wallet, $offset, $limit], $verbose), false, 512, JSON_THROW_ON_ERROR);
    }

    public function getTransactionDetails(string $transactionHash, bool $verbose = false): ?stdClass
    {
        return json_decode(CommandService::exec('stx-get-transaction-details', [$transactionHash], $verbose), false, 512, JSON_THROW_ON_ERROR);
    }

    public function getTransactionStatus(string $transactionHash, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-get-transaction-status', [$transactionHash], $verbose);
    }
}
