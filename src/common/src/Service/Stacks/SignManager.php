<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

class SignManager extends Manager
{
    public function signMint(string $message, bool $verbose = false): ?string
    {
        return $this->exec('stx-sign-mint-message ' . $message, $verbose);
    }

    public function signWithdraw(string $message, bool $verbose = false): ?string
    {
        return $this->exec('stx-sign-withdraw-message ' . $message, $verbose);
    }
}

// test:
// npm exec stx-sign-mint-message 314159 7 1 1 1 1 1 1673445045 30000 ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP 029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7
// php -r 'exec("stx-sign-mint-message 314159 7 1 1 1 1 1 1673445045 30000 ST3NBRSFKX28FQ2ZJ1MAKX58HKHSDGNV5N7R21XCP 029fb154a570a1645af3dd43c3c668a979b59d21a46dd717fd799b13be3b2a0dc7", $output); var_dump($output);'
