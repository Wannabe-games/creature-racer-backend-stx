<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use App\Common\Service\CommandService;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreatureNftContractManager
{
    public function __construct(
        private ContainerInterface $container
    ) {
    }

    public function getUriForCreatureType(string $creatureType): string
    {
        return $this->container->getParameter('base_url') . '/api/contract/creature/' . urlencode($creatureType) . '/metadata.json';
    }

    public function setUri(string $uri, bool $verbose = false): string
    {
        return CommandService::exec('stx-creature-nft-set-uri', [$uri], $verbose);
    }

    public function signMint(array $params, bool $verbose = false): ?string
    {
        return CommandService::exec('stx-creature-nft-sign-mint', $params, $verbose);
    }
}
