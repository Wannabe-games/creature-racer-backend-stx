<?php

namespace App\DTO;

use App\Entity\User as UserEntity;

class User
{
    public function serialize(UserEntity $user): array
    {
        $serializedData['id'] = $user->getId();
        $serializedData['name'] = $user->getFullName();
        $serializedData['avatar'] = '';
        $serializedData['score'] = 0;

        return $serializedData;
    }
}
