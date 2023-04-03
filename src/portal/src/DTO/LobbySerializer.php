<?php

namespace App\DTO;

use App\Entity\Game\Lobby as LobbyEntity;
use App\Entity\User as UserEntity;

class LobbySerializer
{
    public function serialize(LobbyEntity $lobby): array
    {
        $serializedData['id'] = $lobby->getId();
        $serializedData['host'] = $this->serializeUser($lobby->getHost(), $lobby->getHostRace()?->getScore());
        $serializedData['opponent'] = $lobby->getOpponent() ? $this->serializeUser($lobby->getOpponent(), $lobby->getOpponentRace()?->getScore()) : null;
        $serializedData['winnerId'] = $lobby->getWinner()?->getId();
        $serializedData['betAmount'] = $lobby->getBetAmount();
        $serializedData['createdAt'] = $lobby->getCreatedAt()?->getTimestamp();
        $serializedData['timeleft'] = $lobby->getTimeleft()?->getTimestamp();
        $serializedData['status'] = $lobby->getStatus();

        return $serializedData;
    }

    public function serializeUser(UserEntity $user, ?int $score = 0): array
    {
        $serializedData['id'] = $user->getId();
        $serializedData['name'] = $user->getFullName();
        $serializedData['avatar'] = '';
        $serializedData['score'] = $score;

        return $serializedData;
    }
}
