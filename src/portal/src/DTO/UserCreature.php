<?php

namespace App\DTO;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Service\Game\CreatureManager;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Entity\Creature\CreatureUser;

/**
 * Class UserCreature
 * @package App\DTO\UserCreature
 */
class UserCreature
{
    public const UPGRADE_TYPE_BELLY = 'boost';
    public const UPGRADE_TYPE_BUTTOCKS = 'boost2';
    public const UPGRADE_TYPE_HEART = 'reflex';
    public const UPGRADE_TYPE_LUNGS = 'lung';
    public const UPGRADE_TYPE_MUSCLES = 'muscles';

    public function __construct(
        private CreatureLevelRepository $creatureLevelRepository,
        private CreatureManager $creatureManager
    ) {
    }

    /**
     * @param CreatureUser $creatureUser
     *
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
     *
     * @return array
     */
    public function serializeDetails(CreatureUser $creatureUser): array
    {
        /** @var CreatureLevel $levelEntity */
        $levelEntity = $this->creatureLevelRepository->findOneBy(
            [
                'level' => 0,
                'creatureType' => $creatureUser->getCreature()->getType(),
                'upgradeType' => 'base',
            ]
        );

        $serializedData['id'] = $creatureUser->getUuid();
        $serializedData['creatureId'] = $creatureUser->getCreature()->getId();
        $serializedData['name'] = $creatureUser->getName();
        $serializedData['type'] = $creatureUser->getCreature()->getType();
        $serializedData['tier'] = $creatureUser->getCreature()->getTier();
        $serializedData['cohort'] = $creatureUser->getCreature()->getCohort();
        $serializedData['priceStacks'] = $levelEntity->getPriceStacks();
        $serializedData['priceGold'] = $levelEntity->getPriceGold();

        $serializedData['fuel'] = [
            'level' => $creatureUser->getBelly(),
            'next' => $this->getSerializedNextLevelData($creatureUser->getBelly(), $creatureUser->getCreature()->getType(), self::UPGRADE_TYPE_BELLY),
            'upgradeDateEnd' => $creatureUser->getUpgradeBellyEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['boost'] = [
            'level' => $creatureUser->getButtocks(),
            'next' => $this->getSerializedNextLevelData($creatureUser->getButtocks(), $creatureUser->getCreature()->getType(), self::UPGRADE_TYPE_BUTTOCKS),
            'upgradeDateEnd' => $creatureUser->getUpgradeButtocksEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['heart'] = [
            'level' => $creatureUser->getHeart(),
            'next' => $this->getSerializedNextLevelData($creatureUser->getHeart(), $creatureUser->getCreature()->getType(), self::UPGRADE_TYPE_HEART),
            'upgradeDateEnd' => $creatureUser->getUpgradeHeartEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['lungs'] = [
            'level' => $creatureUser->getLungs(),
            'next' => $this->getSerializedNextLevelData($creatureUser->getLungs(), $creatureUser->getCreature()->getType(), self::UPGRADE_TYPE_LUNGS),
            'upgradeDateEnd' => $creatureUser->getUpgradeLungsEndFormat('Y-m-d H:i:s'),
        ];
        $serializedData['muscles'] = [
            'level' => $creatureUser->getMuscles(),
            'next' => $this->getSerializedNextLevelData($creatureUser->getMuscles(), $creatureUser->getCreature()->getType(), self::UPGRADE_TYPE_MUSCLES),
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

    /**
     * @param int $level
     * @param string $creatureType
     * @param string $upgradeType
     *
     * @return array
     */
    private function getSerializedNextLevelData(int $level, string $creatureType, string $upgradeType): array
    {
        /** @var CreatureLevel|null $nextLevel */
        $nextLevel = $this->creatureLevelRepository->findOneBy(
            [
                'level' => ++$level,
                'creatureType' => $creatureType,
                'upgradeType' => $upgradeType,
            ]
        );

        $nestLevelResult = [];
        if ($nextLevel instanceof CreatureLevel) {
            $nestLevelResult = [
                'level' => $nextLevel->getLevel(),
                'priceStacks' => $nextLevel->getPriceStacks(),
                'priceGold' => $nextLevel->getPriceGold(),
                'deliveryPriceStacks' => $nextLevel->getDeliveryPriceStacks(),
                'deliveryWaitingTime' => $nextLevel->getDeliveryWaitingTime(),
            ];

            /** @var CreatureUpgrade $upgradeChange */
            foreach ($nextLevel->getUpgradeChanges() as $upgradeChange) {
                $nestLevelResult['upgradeChanges'][$this->creatureManager->mapUpgradeName($upgradeChange->getName())] = $upgradeChange->getValue();
            }
        }

        return $nestLevelResult;
    }
}
