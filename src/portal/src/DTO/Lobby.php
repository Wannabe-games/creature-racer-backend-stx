<?php

namespace App\DTO;

use App\Entity\Game\Lobby as LobbyEntity;
use App\Entity\User as UserEntity;

class Lobby
{
    public function serialize(LobbyEntity $lobby): array
    {
        $serializedData['id'] = $lobby->getUuid();
        $serializedData['host'] = $this->serializeUser($lobby->getHost());
        $serializedData['opponent'] = $lobby->getOpponent() ? $this->serializeUser($lobby->getOpponent()) : null;
        $serializedData['winnerId'] = $lobby->getWinner()?->getId();
        $serializedData['betAmount'] = $lobby->getBetAmount();
        $serializedData['timeleft'] = $lobby->getTimeleft()?->getTimestamp();
        $serializedData['status'] = $lobby->getStatus();

        return $serializedData;
    }

    public function serializeUser(UserEntity $user): array
    {
        $serializedData['id'] = $user->getId();
        $serializedData['name'] = $user->getFullName();
        $serializedData['avatar'] = '';
        $serializedData['score'] = 0;

        return $serializedData;
    }
}
