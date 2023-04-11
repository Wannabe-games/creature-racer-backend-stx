<?php

namespace App\DTO;

use App\Common\Enum\CreatureUpgradeTypes;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Utils\TimeTickerConverter;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUser;
use DateTime;

/**
 * Class UserCreature
 * @package App\DTO\UserCreature
 */
class UserCreatureSerializer
{
    /**
     * @var CreatureLevelRepository
     */
    private CreatureLevelRepository $creatureLevelRepository;

    public function __construct(CreatureLevelRepository $creatureLevelRepository)
    {
        $this->creatureLevelRepository = $creatureLevelRepository;
    }

    /**
     * @param CreatureUser $creatureUser
     *
     * @return array
     */
    public function serialize(CreatureUser $creatureUser): array
    {
        $serializedData['Id'] = $creatureUser->getUuid();
        $serializedData['AnimalType'] = $creatureUser->getCreature()?->getType();
        $serializedData['ColorOption'] = $creatureUser->getSkinColor() ?? 0;
        $serializedData['ActiveAttachment'] = "v1";
        $serializedData['AvailableAttachments'] = [
            [
                'Name' => 'v1',
            ]
        ];
        $serializedData['Upgrades'][] = [
            'UpgradeType' => CreatureUpgradeTypes::MUSCLES,
            'Level' => $creatureUser->getMuscles(),
            'NextLevelTime' => $this->isActiveUpgrade($creatureUser->getUpgradeMusclesEnd()) ? TimeTickerConverter::TimeToTicks((int)$creatureUser->getUpgradeMusclesEndFormat('U')) : 0
        ];
        $serializedData['Upgrades'][] = [
            'UpgradeType' => CreatureUpgradeTypes::LUNGS,
            'Level' => $creatureUser->getLungs(),
            'NextLevelTime' => $this->isActiveUpgrade($creatureUser->getUpgradeLungsEnd()) ? TimeTickerConverter::TimeToTicks((int)$creatureUser->getUpgradeLungsEndFormat('U')) : 0
        ];
        $serializedData['Upgrades'][] = [
            'UpgradeType' => CreatureUpgradeTypes::HEART,
            'Level' => $creatureUser->getHeart(),
            'NextLevelTime' => $this->isActiveUpgrade($creatureUser->getUpgradeHeartEnd()) ? TimeTickerConverter::TimeToTicks((int)$creatureUser->getUpgradeHeartEndFormat('U')) : 0
        ];
        $serializedData['Upgrades'][] = [
            'UpgradeType' => CreatureUpgradeTypes::BELLY,
            'Level' => $creatureUser->getBelly(),
            'NextLevelTime' => $this->isActiveUpgrade($creatureUser->getUpgradeBellyEnd()) ? TimeTickerConverter::TimeToTicks((int)$creatureUser->getUpgradeBellyEndFormat('U')) : 0
        ];
        $serializedData['Upgrades'][] = [
            'UpgradeType' => CreatureUpgradeTypes::BUTTOCKS,
            'Level' => $creatureUser->getButtocks(),
            'NextLevelTime' => $this->isActiveUpgrade($creatureUser->getUpgradeButtocksEnd()) ? TimeTickerConverter::TimeToTicks((int)$creatureUser->getUpgradeButtocksEndFormat('U')) : 0
        ];

        /** @var CreatureLevelSerializer $creatureBuy */
        $creatureBuy = $this->creatureLevelRepository->findOneBy(
            [
                'creature' => $creatureUser->getCreature(),
                'upgradeType' => CreatureUpgradeTypes::BASE,
            ]
        );

        if (isset($creatureBuy)) {
            $serializedData['DeliveryWaitingTime'] = TimeTickerConverter::TimeToTicks((int)$creatureUser->getCreature()->getCreatedAt()->format('U') + $creatureBuy->getDeliveryWaitingTime());
        }
        $serializedData['TimeStamp'] = TimeTickerConverter::TimeToTicks((int)$creatureUser->getCreature()->getCreatedAt()->format('U'));

        return $serializedData;
    }

    /**
     * @param DateTime|null $date
     *
     * @return bool
     */
    private function isActiveUpgrade(?DateTime $date): bool
    {
        $currentDate = new DateTime();

        return $date >= $currentDate;
    }
}
