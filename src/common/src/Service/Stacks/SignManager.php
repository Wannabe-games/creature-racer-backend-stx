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
        $pid = exec($command, $result);

        if ($verbose) {
            echo('command: ' . $command . "\n");
            echo('pid: ' . $pid . "\n");
            echo("response:\n");
            var_dump($result);
        }

        return $result[0] ?? null;
    }
}

// test:
// bin/stx-sign-mint-message.js 314159 7 1 1 1 1 1 1673445045 30000 ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP 029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7
// php -r 'exec("stx-sign-mint-message 314159 7 1 1 1 1 1 1673445045 30000 ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP 029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7", $output); var_dump($output);'
