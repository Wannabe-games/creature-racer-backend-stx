<?php
declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class RewardPoolContractManager
{
    /**
     * @param ContainerInterface $container
     *
     * @throws Exception
     */
    public function __construct(
        protected ContainerInterface $container
    ) {}

    /**
     * @param bool $verbose
     *
     * @return string
     */
    public function getBalance(bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('reward_pool_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress
        ];

        exec('reward-pool-get-balance '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }

    /**
     * @param int  $cycle
     * @param bool $verbose
     *
     * @return string
     */
    public function getCycleBalance(int $cycle, bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('reward_pool_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress,
            $cycle
        ];

        exec('reward-pool-get-cycle-balance '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('cycle: '.$cycle);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }

    /**
     * @param int  $cycle
     * @param bool $verbose
     *
     * @return string
     */
    public function getCollectedCycleBalance(int $cycle, bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('reward_pool_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress,
            $cycle
        ];

        exec('reward-pool-collected-balance-in-cycle '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('cycle: '.$cycle);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }

    /**
     * @param bool $verbose
     *
     * @return string
     */
    public function getCurrentCycle(bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('reward_pool_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress
        ];

        exec('reward-pool-get-current-cycle '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
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
        $contractAddress = $this->container->getParameter('reward_pool_contract_address');
        $privateOperatorKey = $this->container->getParameter('private_wallet_key');

        $variable = [
            $env,
            $providedUrl,
            $privateOperatorKey,
            $contractAddress,
        ];

        exec('reward-pool-open-new-cycle '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            is_array($result) && key_exists(0, $result) ? var_dump('result: '.$result[0]) : var_dump($result);
        }

        return is_array($result) && key_exists(0, $result) ? $result[0] : null;
    }

    /**
     * @return float
     */
    public function getBalanceInMatic(): float
    {
        return (int)$this->getBalance()/1000000000000000000;
    }

    /**
     * @param int $cycle
     *
     * @return float
     */
    public function getCycleBalanceInMatic(int $cycle): float
    {
        return (int)$this->getCycleBalance($cycle)/1000000000000000000;
    }

    /**
     * @param int $cycle
     *
     * @return float
     */
    public function getCollectedCycleBalanceInMatic(int $cycle): float
    {
        return (int)$this->getCollectedCycleBalance($cycle)/1000000000000000000;
    }

    /**
     * @param string  $userWallet
     * @param string  $amount
     * @param int     $count
     * @param int     $cycle
     * @param bool    $verbose
     *
     * @return string
     */
    public function getSignWithdraw(string $userWallet, string $amount, int $count, int $cycle, bool $verbose = false): string
    {
        $privateKey = $this->container->getParameter('private_wallet_key');

        $variable = [
            $privateKey,
            $userWallet,
            $amount,
            $count,
            $cycle
        ];

        exec('sign-withdraw-message '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('privateKey: '.$privateKey);
            var_dump('amount: '.$amount);
            var_dump('count: '.$count);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }

    /**
     * @param string $userAddress
     * @param bool   $verbose
     *
     * @return string
     */
    public function getWithdrawCount(string $userAddress, bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('reward_pool_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress,
            $userAddress
        ];

        exec('reward-pool-get-withdrawal-count '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('userAddress: '.$userAddress);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }
}
