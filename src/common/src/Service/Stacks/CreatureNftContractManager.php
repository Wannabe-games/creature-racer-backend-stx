<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class CreatureNftContractManager extends Manager
{
    public function setUri(string $uri, bool $verbose = false): string
    {
        return $this->exec('stx-creature-nft-set-uri', [$uri], $verbose);
    }

    public function signMint(array $params, bool $verbose = false): ?string
    {
        return $this->exec('stx-creature-nft-sign-mint', $params, $verbose);
    }
}
