<?php

namespace App\DTO;

use App\Entity\Creature\CreatureUser;

/**
 * Class NftUserCreature
 * @package App\DTO\NftUserCreature
 */
class NftUserCreature
{
    /**
     * @param CreatureUser $creatureUser
     *
     * @return string
     */
    public function toStringMessage(CreatureUser $creatureUser): string
    {
        return implode(' ', $this->serialize($creatureUser));
    }

    /**
     * @param CreatureUser $creatureUser
     *
     * @return array
     */
    public function serialize(CreatureUser $creatureUser): array
    {
        $serializedData['nftId'] = $creatureUser->getId();
        $serializedData['typeId'] = $creatureUser->getCreature()->getId();
        $serializedData['part1'] = $creatureUser->getMuscles() + 1;
        $serializedData['part2'] = $creatureUser->getLungs() + 1;
        $serializedData['part3'] = $creatureUser->getHeart() + 1;
        $serializedData['part4'] = $creatureUser->getBelly() + 1;
        $serializedData['part5'] = $creatureUser->getButtocks() + 1;
        $serializedData['expiryTimestamp'] = (int)$creatureUser->getNftExpiryDateFormat('U');
        $serializedData['price'] = 1000000;
        $serializedData['key'] = $creatureUser->getUser()->getPublicKey();

        return $serializedData;
    }
}
