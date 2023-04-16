<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class Manager
{
    protected function exec(string $command, array $params = [], bool $verbose = false): ?string
    {
        $command = trim($command);

        if ('docker' !== getenv('ENVIRONMENT')) {
            $command = __DIR__ . '/../../../../js_scripts/bin/' . $command . '.js';
        }

        if (!empty($params)) {
            $command .= ' ' . implode(' ', array_map('escapeshellarg', array_map('trim', $params)));
        }

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
