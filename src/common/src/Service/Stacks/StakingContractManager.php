<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use Symfony\Component\DependencyInjection\ContainerInterface;

class StakingContractManager
{
    /**
     * @param ContainerInterface $container
     */
    public function __construct(
        protected ContainerInterface $container
    ) {
    }

    /**
     * @param bool $verbose
     * @return string|null
     */
    public function openNewCycle(bool $verbose = false): ?string
    {
        $command = 'stx-staking-open-new-cycle';
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

// test:
// bin/stx-staking-open-new-cycle.js
// php -r 'exec("bin/stx-staking-open-new-cycle.js", $output); var_dump($output);'
