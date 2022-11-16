<?php
declare(strict_types=1);

namespace App\Common\Service\Ethereum;

use Exception;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ProviderManager
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
    public function getBlockNumber(bool $verbose = false): string
    {
        $providedUrl = $this->container->getParameter('chain_provider_url');

        $variable = [
            $providedUrl
        ];

        exec('get-block-number '.implode(' ', $variable), $result);

        if ($verbose) {
            var_dump('provider_url: '.$providedUrl);
            var_dump('result: '.$result[0]);
        }

        return $result[0];
    }
}
