<?php
declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ReferralPoolContractManager
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
        $contractAddress = $this->container->getParameter('referral_pool_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress
        ];

        exec('referral-pool-get-balance '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }

    /**
     * @return float
     */
    public function getBalanceInMatic(): float
    {
        return (int)$this->getBalance()/1000000000000000000;
    }

    /**
     * @param int  $amount
     * @param int  $count
     * @param bool $verbose
     *
     * @return string
     */
    public function getSignWithdraw(int $amount, int $count, bool $verbose = false): string
    {
        $privateKey = $this->container->getParameter('private_wallet_key');

        $variable = [
            $privateKey,
            $amount,
            $count
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
}
