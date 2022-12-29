<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use Symfony\Component\DependencyInjection\ContainerInterface;

class Manager
{
    public function __construct(
        protected ContainerInterface $container
    ) {
    }

    protected function exec(string $command, bool $verbose = false): ?string
    {
        exec($command, $result);

        if ($verbose) {
            echo('command: ' . $command);
            echo("\n");
            echo('response:');
            var_dump($result);
        }

        return $result[0] ?? null;
    }
}
