<?php
namespace App\DTO;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Service\Game\CreatureManager;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\Creature as CreatureEntity;
use App\Entity\Creature\CreatureUpgrade;

/**
 * Class Creature
 * @package App\DTO\UserCreature
 */
class Creature
{
    public function __construct(
        private CreatureLevelRepository $creatureLevelRepository,
        private CreatureManager $creatureManager
    ) {}

    /**
     * @param CreatureEntity $creature
     *
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

        return array_merge($serializedData, $this->getSerializedFirstLevelData($creature->getType()));
    }

    /**
     * @param string $creatureType
     *
     * @return array
     */
    private function getSerializedFirstLevelData(string $creatureType): array
    {
        /** @var CreatureLevel|null $nextLevel */
        $nextLevel = $this->creatureLevelRepository->findOneBy([
            'creatureType' => $creatureType,
            'upgradeType' => 'base',
        ]);

        $nestLevelResult = [];
        if ($nextLevel instanceof CreatureLevel) {
            $nestLevelResult = [
                'priceStacks' => $nextLevel->getPriceStacks(),
                'priceGold' => $nextLevel->getPriceGold(),
                'deliveryPriceStacks' => $nextLevel->getDeliveryPriceStacks(),
                'deliveryWaitingTime' => $nextLevel->getDeliveryWaitingTime(),
            ];

            /** @var CreatureUpgrade $upgradeChange */
            foreach ($nextLevel->getUpgradeChanges() as $upgradeChange) {
                $nestLevelResult['upgradeChanges'][] = [
                    'name' => $this->creatureManager->mapUpgradeName($upgradeChange->getName()),
                    'value' => $upgradeChange->getValue()
                ];
            }
        }

        return $nestLevelResult;
    }
}
