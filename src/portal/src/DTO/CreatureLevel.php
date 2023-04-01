<?php

namespace App\DTO;

use App\Common\Enum\CreatureLevels;
use App\Common\Enum\CreatureUpgradeTypes;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Service\Game\CreatureManager;
use App\Entity\Creature\CreatureLevel as CreatureLevelEntity;
use App\Entity\Creature\CreatureUpgrade;

/**
 * Class Creature
 * @package App\DTO\UserCreature
 */
class CreatureLevel
{
    public function __construct(
        private CreatureRepository $creatureRepository,
        private CreatureLevelRepository $creatureLevelRepository,
        private CreatureManager $creatureManager
    ) {
    }

    /**
     * @param string $creatureType
     * @param int|null $level
     * @param string|null $upgradeType
     * @return array
     */
    public function getSerializedLevelData(
        string $creatureType,
        ?int $level = CreatureLevels::BASE,
        ?string $upgradeType = CreatureUpgradeTypes::BASE
    ): array {
        /** @var Creature $creature */
        $creature = $this->creatureRepository->findOneBy(
            [
                'type' => $creatureType
            ]
        );

        /** @var CreatureLevelEntity $creatureLevel */
        $creatureLevel = $this->creatureLevelRepository->findOneBy(
            [
                'creature' => $creature,
                'level' => $level,
                'upgradeType' => $upgradeType,
            ]
        );

        if (null === $creatureLevel) {
            return [];
        }

        $levelResult = [
            'level' => $creatureLevel->getLevel(),
            'priceStacks' => $creatureLevel->getPriceStacks(),
            'priceGold' => $creatureLevel->getPriceGold(),
            'priceUSD' => $creatureLevel->getPriceUSD(),
            'deliveryPriceStacks' => $creatureLevel->getDeliveryPriceStacks(),
            'deliveryWaitingTime' => $creatureLevel->getDeliveryWaitingTime(),
        ];

        /** @var CreatureUpgrade $upgradeChange */
        foreach ($creatureLevel->getUpgradeChanges() as $upgradeChange) {
            $levelResult['upgradeChanges'][$this->creatureManager->mapUpgradeName($upgradeChange->getName())] = $upgradeChange->getValue();
        }

        return $levelResult;
    }
}
