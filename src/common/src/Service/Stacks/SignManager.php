<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use Symfony\Component\DependencyInjection\ContainerInterface;

class SignManager
{
    /**
     * @param ContainerInterface $container
     */
    public function __construct(
        protected ContainerInterface $container
    ) {
    }

    /**
     * @param string $message
     * @param bool $verbose
     * @return string|null
     */
    public function signMintMessage(string $message, bool $verbose = false): ?string
    {
        $command = 'stx-sign-mint-message ' . $message;
        $status = exec($command, $result);

        if ($verbose) {
            echo($command);
            var_dump($status);
            var_dump($result);
        }

        return $result[0] ?? null;
    }
}
