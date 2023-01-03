<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class Manager
{
    protected function exec(string $command, bool $verbose = false): ?string
    {
        exec($command, $result);

        if ($verbose) {
            echo("command:\n");
            echo("$command\n");
            echo("result:\n");
            echo(implode("\n", $result) . "\n");
        }

        return $result[0] ?? null;
    }
}
