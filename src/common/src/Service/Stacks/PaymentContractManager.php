<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class PaymentContractManager extends Manager
{
    public function getLog(int $startBlock = 1, int $maxBlocksToRead = 10, bool $verbose = false): string
    {
        return $this->exec('stx-payment-get-data-from-payment-event', [$startBlock, $maxBlocksToRead], $verbose);
    }
}
