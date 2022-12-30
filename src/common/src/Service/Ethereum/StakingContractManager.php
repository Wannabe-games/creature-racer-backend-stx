<?php

declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class StakingContractManager
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

    /**
     * @param string $userAddress
     * @param bool $verbose
     *
     * @return string
     */
    public function getUserShare(string $userAddress, bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('staking_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $userAddress,
            $contractAddress
        ];

        exec('staking-get-user-share ' . implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: ' . $env);
            var_dump('provider_url: ' . $providedUrl);
            var_dump('user_address: ' . $userAddress);
            var_dump('contract_address: ' . $contractAddress);
            var_dump('result: ' . $result[0]);
        }

        return $result[0];
    }

    /**
     * @param bool $verbose
     *
     * @return string
     */
    public function getTotalShare(bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('staking_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress
        ];

        exec('staking-get-total-share ' . implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: ' . $env);
            var_dump('provider_url: ' . $providedUrl);
            var_dump('contract_address: ' . $contractAddress);
            var_dump('result: ' . $result[0]);
        }

        return $result[0];
    }

    /**
     * @param string $userAddress
     *
     * @return float
     */
    public function getUserReward(string $userAddress): float
    {
        return (int)$this->getUserShare($userAddress) / (int)$this->getTotalShare();
    }

    /**
     * @param bool $verbose
     *
     * @return string|null
     */
    public function openNewCycle(bool $verbose = false): ?string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('staking_contract_address');
        $privateOperatorKey = $this->container->getParameter('private_wallet_key');

        $variable = [
            $env,
            $providedUrl,
            $privateOperatorKey,
            $contractAddress,
        ];

        exec('staking-open-new-cycle ' . implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: ' . $env);
            var_dump('provider_url: ' . $providedUrl);
            var_dump('contract_address: ' . $contractAddress);
            is_array($result) && key_exists(0, $result) ? var_dump('result: ' . $result[0]) : var_dump($result);
        }

        return is_array($result) && key_exists(0, $result) ? $result[0] : null;
    }
}
