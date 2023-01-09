<?php

declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use App\Entity\User;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CreatureNftContractManager
{
    /**
     * @param ContainerInterface $container
     *
     * @throws Exception
     */
    public function __construct(
        protected ContainerInterface $container
    ) {
    }

    public function setUri(bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('creature_nft_contract_address');
        $privateOperatorKey = $this->container->getParameter('private_wallet_key');
        $uri = $this->container->getParameter('base_url') . 'api/nft/metadata/';

        $variable = [
            $env,
            $providedUrl,
            $uri,
            $privateOperatorKey,
            $contractAddress,
        ];

        exec('referral-set-uri ' . implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: ' . $env);
            var_dump('provider_url: ' . $providedUrl);
            var_dump('contract_address: ' . $contractAddress);
            var_dump('result: ' . $result[0]);
        }

        return $result[0];
    }
}
