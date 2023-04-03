<?php

namespace App\DTO;

use App\Entity\Creature\Creature as CreatureEntity;

/**
 * Class Creature
 * @package App\DTO\UserCreature
 */
class CreatureSerializer
{
    public function __construct(
        private CreatureLevelSerializer $creatureLevel
    ) {
    }

    /**
     * @param CreatureEntity $creature
     * @return array
     */
    public function serialize(CreatureEntity $creature): array
    {
        $serializedData['id'] = $creature->getId();
        $serializedData['tier'] = $creature->getTier();
        $serializedData['type'] = $creature->getType();
        $serializedData['name'] = $creature->getName();
        $serializedData['skinColor'] = 0;

        $serializedData['speed'] = 0;
        $serializedData['boostAcceleration'] = 0;
        $serializedData['acceleration'] = 0;
        $serializedData['boostTime'] = 0;

        $serializedData['speedMin'] = $creature->getSpeedMin();
        $serializedData['boostAccelerationMin'] = $creature->getBoostAccelerationMin();
        $serializedData['accelerationMin'] = $creature->getAccelerationMin();
        $serializedData['boostTimeMin'] = $creature->getBoostTimeMin();

        $serializedData['speedMax'] = $creature->getSpeedMax();
        $serializedData['accelerationMax'] = $creature->getAccelerationMax();
        $serializedData['boostTimeMax'] = $creature->getBoostTimeMax();
        $serializedData['boostAccelerationMax'] = $creature->getBoostAccelerationMax();

        return array_merge($serializedData, $this->creatureLevel->getSerializedLevelData($creature->getType()));
    }
}
