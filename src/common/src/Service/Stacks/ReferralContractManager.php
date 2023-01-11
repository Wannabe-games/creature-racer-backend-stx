<?php

declare(strict_types=1);

namespace App\Common\Service\Stacks;

use App\Entity\User;

class ReferralContractManager extends Manager
{
    public function setUri(string $uri, bool $verbose = false): string
    {
        return $this->exec('stx-referral-set-uri', [$uri], $verbose);
    }

    public function incrementInvitations(User $user, bool $verbose = false): ?string
    {
        return $this->exec('stx-referral-increment-invitations', [$user->getWallet(), $user->getFromReferralNft()?->getRefCode()], $verbose);
    }
}
