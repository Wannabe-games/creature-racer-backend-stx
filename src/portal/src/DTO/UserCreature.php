<?php

namespace App\DTO;

use App\Common\Enum\CreatureLevels;
use App\Common\Enum\CreatureUpgradeTypes;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\CreatureUser;

/**
 * Class UserCreature
 * @package App\DTO\UserCreature
 */
class UserCreature
{
    public function __construct(
        private CreatureLevel $creatureLevel,
        private CreatureLevelRepository $creatureLevelRepository
    ) {
    }

    /**
     * @param CreatureUser $creatureUser
     * @return array
     */
    public function serialize(CreatureUser $creatureUser): array
    {
        $serializedData['id'] = $creatureUser->getUuid();
        $serializedData['creatureId'] = $creatureUser->getCreature()->getId();
        $serializedData['name'] = $creatureUser->getName();
        $serializedData['type'] = $creatureUser->getCreature()->getType();
        $serializedData['tier'] = $creatureUser->getCreature()->getTier();
        $serializedData['cohort'] = $creatureUser->getCreature()->getCohort();

        $serializedData['acceleration'] = [
            'value' => $creatureUser->getAcceleration(),
            'max' => $creatureUser->getCreature()->getAccelerationMax(),
            'min' => $creatureUser->getCreature()->getAccelerationMin(),
        ];
        $serializedData['boostAcceleration'] = [
            'value' => $creatureUser->getBoostAcceleration(),
            'max' => $creatureUser->getCreature()->getBoostAccelerationMax(),
            'min' => $creatureUser->getCreature()->getBoostAccelerationMin(),
        ];
        $serializedData['boostTime'] = [
            'value' => $creatureUser->getBoostTime(),
            'max' => $creatureUser->getCreature()->getBoostTimeMax(),
            'min' => $creatureUser->getCreature()->getBoostTimeMin(),
        ];
        $serializedData['speed'] = [
            'value' => $creatureUser->getSpeed(),
            'max' => $creatureUser->getCreature()->getSpeedMax(),
            'min' => $creatureUser->getCreature()->getSpeedMin(),
        ];

        $serializedData['fuel'] = $creatureUser->getBelly();
        $serializedData['boost'] = $creatureUser->getButtocks();
        $serializedData['heart'] = $creatureUser->getHeart();
        $serializedData['lungs'] = $creatureUser->getLungs();
        $serializedData['muscles'] = $creatureUser->getMuscles();
        $serializedData['createdAt'] = $creatureUser->getCreatedAt();

        $serializedData['contract'] = $creatureUser->getContract();
        $serializedData['isForGame'] = $creatureUser->isForGame();
        $serializedData['isStaked'] = $creatureUser->isStaked();
        $serializedData['nftExpiryDate'] = $creatureUser->getNftExpiryDateFormat('Y-m-d H:i:s');
        $serializedData['rewardPool'] = $creatureUser->getRewardPool();
        $serializedData['bonus'] = $creatureUser->hasBonus();
        $serializedData['skinColor'] = $creatureUser->getSkinColor();
        $serializedData['hash'] = $creatureUser->getHash();
        $serializedData['nftName'] = $creatureUser->getNftName();
        $serializedData['royalties'] = $creatureUser->getRoyalties();

        return $serializedData;
    }

    /**
     * @param CreatureUser $creatureUser
     * @return array
     */
    public function serializeDetails(CreatureUser $creatureUser): array
    {
        /** @var CreatureLevel $levelEntity */
        $levelEntity = $this->creatureLevelRepository->findOneBy(
            [
                'creature' => $creatureUser->getCreature(),
                'level' => CreatureLevels::BASE,
                'upgradeType' => CreatureUpgradeTypes::BASE,
            ]
        );

        $serializedData['id'] = $creatureUser->getUuid();
        $serializedData['creatureId'] = $creatureUser->getCreature()->getId();
        $serializedData['name'] = $creatureUser->getName();
        $serializedData['type'] = $creatureUser->getCreature()->getType();
        $serializedData['tier'] = $creatureUser->getCreature()->getTier();
        $serializedData['cohort'] = $creatureUser->getCreature()->getCohort();
        $serializedData['priceGold'] = $levelEntity->getPriceGold();
        $serializedData['priceStacks'] = $levelEntity->getPriceStacks();
        $serializedData['priceUSD'] = $levelEntity->getPriceUSD();

        $serializedData['fuel'] = [
            'level' => $creatureUser->getBelly(),
            'next' => $this->creatureLevel->getSerializedLevelData($creatureUser->getCreature()->getType(), $creatureUser->getBelly() + 1, CreatureUpgradeTypes::BELLY),
            'upgradeDateEnd' => $creatureUser->getUpgradeBellyEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['boost'] = [
            'level' => $creatureUser->getButtocks(),
            'next' => $this->creatureLevel->getSerializedLevelData($creatureUser->getCreature()->getType(), $creatureUser->getButtocks() + 1, CreatureUpgradeTypes::BUTTOCKS),
            'upgradeDateEnd' => $creatureUser->getUpgradeButtocksEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['heart'] = [
            'level' => $creatureUser->getHeart(),
            'next' => $this->creatureLevel->getSerializedLevelData($creatureUser->getCreature()->getType(), $creatureUser->getHeart() + 1, CreatureUpgradeTypes::HEART),
            'upgradeDateEnd' => $creatureUser->getUpgradeHeartEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['lungs'] = [
            'level' => $creatureUser->getLungs(),
            'next' => $this->creatureLevel->getSerializedLevelData($creatureUser->getCreature()->getType(), $creatureUser->getLungs() + 1, CreatureUpgradeTypes::LUNGS),
            'upgradeDateEnd' => $creatureUser->getUpgradeLungsEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['muscles'] = [
            'level' => $creatureUser->getMuscles(),
            'next' => $this->creatureLevel->getSerializedLevelData($creatureUser->getCreature()->getType(), $creatureUser->getMuscles() + 1, CreatureUpgradeTypes::MUSCLES),
            'upgradeDateEnd' => $creatureUser->getUpgradeMusclesEndFormat('Y-m-d H:i:s'),
        ];

        $serializedData['acceleration'] = [
            'value' => $creatureUser->getAcceleration(),
            'max' => $creatureUser->getCreature()->getAccelerationMax(),
            'min' => $creatureUser->getCreature()->getAccelerationMin(),
        ];
        $serializedData['boostAcceleration'] = [
            'value' => $creatureUser->getBoostAcceleration(),
            'max' => $creatureUser->getCreature()->getBoostAccelerationMax(),
            'min' => $creatureUser->getCreature()->getBoostAccelerationMin(),
        ];
        $serializedData['boostTime'] = [
            'value' => $creatureUser->getBoostTime(),
            'max' => $creatureUser->getCreature()->getBoostTimeMax(),
            'min' => $creatureUser->getCreature()->getBoostTimeMin(),
        ];
        $serializedData['speed'] = [
            'value' => $creatureUser->getSpeed(),
            'max' => $creatureUser->getCreature()->getSpeedMax(),
            'min' => $creatureUser->getCreature()->getSpeedMin(),
        ];

        $serializedData['createdAt'] = $creatureUser->getCreatedAt();
        $serializedData['contract'] = $creatureUser->getContract();
        $serializedData['isForGame'] = $creatureUser->isForGame();
        $serializedData['bonus'] = $creatureUser->hasBonus();
        $serializedData['isStaked'] = $creatureUser->isStaked();
        $serializedData['nftExpiryDate'] = $creatureUser->getNftExpiryDateFormat('Y-m-d H:i:s');
        $serializedData['rewardPool'] = $creatureUser->getRewardPool();
        $serializedData['skinColor'] = $creatureUser->getSkinColor();
        $serializedData['hash'] = $creatureUser->getHash();
        $serializedData['nftName'] = $creatureUser->getNftName();
        $serializedData['royalties'] = $creatureUser->getRoyalties();

        return $serializedData;
    }
}
