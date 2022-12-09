<?php

declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use App\Entity\User;
use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ReferralContractManager
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
     * @param User $user
     * @param bool $verbose
     *
     * @return string|null
     */
    public function incrementInvitations(User $user, bool $verbose = false): ?string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('referral_contract_address');
        $privateOperatorKey = $this->container->getParameter('private_wallet_key');

        $variable = [
            $env,
            $providedUrl,
            $user->getWallet(),
            $user->getFromReferralNft()->getRefCode(),
            $privateOperatorKey,
            $contractAddress,
        ];

        exec('referral-increment-invitations ' . implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('env: ' . $env);
            var_dump('provider_url: ' . $providedUrl);
            var_dump('contract_address: ' . $contractAddress);
            var_dump('result: ' . $result[0]);
        }

        return $result[0] ?? null;
    }

    public function setUri(bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('referral_contract_address');
        $privateOperatorKey = $this->container->getParameter('private_wallet_key');
        $uri = $this->container->getParameter('base_url') . 'api/nft/referral/metadata/';

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
