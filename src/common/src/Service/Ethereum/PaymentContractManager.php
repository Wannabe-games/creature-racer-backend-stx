<?php
declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PaymentContractManager
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
     * @param int  $block
     * @param bool $verbose
     *
     * @return string
     */
    public function getLog(int $block, bool $verbose = false): string
    {
        $env = $this->container->getParameter('app_env');
        $providedUrl = $this->container->getParameter('chain_provider_url');
        $contractAddress = $this->container->getParameter('payment_contract_address');

        $variable = [
            $env,
            $providedUrl,
            $contractAddress,
            $block
        ];

        if ($verbose) {
            var_dump('env: '.$env);
            var_dump('provider_url: '.$providedUrl);
            var_dump('contract_address: '.$contractAddress);
            var_dump('block: '.$block);
        }

        exec('payment-get-data-from-payment-event '.implode(' ', $variable), $result);

        // remove last come from array.
        if ($result[count($result)-2] == ',') {
            unset($result[count($result)-2]);
        }
        // parse json
        $jsonResult = implode('', $result);

        if ($verbose) {
            var_dump($result);
            var_dump($jsonResult);
        }

        return $jsonResult;
    }
}
