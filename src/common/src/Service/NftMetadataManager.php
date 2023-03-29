<?php

namespace App\Common\Service;

use App\Common\Enum\CreatureUpgradeTypes;
use App\Common\Service\Stacks\RewardPoolContractManager;
use App\Common\Service\Game\CreatureManager;
use App\Entity\Creature\CreatureUser;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class NftMetadataManager
 */
class NftMetadataManager
{
    public function __construct(
        private CreatureFileNameManager $creatureFileNameManager,
        private RewardPoolContractManager $rewardPoolContractManager,
        private MintCapManager $capManager,
        private ContainerInterface $container
    ) {
    }

    /**
     * @param CreatureUser $creatureUser
     *
     * @return array
     */
    public function getNFTMetadata(CreatureUser $creatureUser): array
    {
        return [
            'name' => $creatureUser->getNftName(),
            'description' => "Creature Racer is a mobile game where you earn MATIC simply by playing it. All you need to do is upgrade your pet and race to the top.
<br>
Mint your favorite creature into a unique NFT. Stake it. Done!
<br>
Now, you will be receiving a percentage share from each MATIC spent in the game.
<br>
When you stake your Creature NFT you will get a share of all rewards from Reward Pool. Each NFT is unique and depending on Tier, upgrades, mint cap and Creature type it gives you a different percentage of rewards. Remember that your NFT has an expiry date so come back and play as often as possible, so you don’t miss your mint cap spot.
<br>
Learn more: [www.creatureracer.com](https://www.creatureracer.com)",
            'image' => 'https://' . $this->container->getParameter('base_url') . '/creatures/' . $this->creatureFileNameManager->getFileNameFromCreatureUser($creatureUser) . '.png',
            'attributes' => [
                [
                    'display_type' => 'boost_number',
                    'trait_type' => CreatureManager::getBodyPartsName(CreatureUpgradeTypes::MUSCLES),
                    'value' => $creatureUser->getMuscles() + 1,
                    'max_value' => 5
                ],
                [
                    'display_type' => 'boost_number',
                    'trait_type' => CreatureManager::getBodyPartsName(CreatureUpgradeTypes::LUNGS),
                    'value' => $creatureUser->getLungs() + 1,
                    'max_value' => 5
                ],
                [
                    'display_type' => 'boost_number',
                    'trait_type' => CreatureManager::getBodyPartsName(CreatureUpgradeTypes::HEART),
                    'value' => $creatureUser->getHeart() + 1,
                    'max_value' => 5
                ],
                [
                    'display_type' => 'boost_number',
                    'trait_type' => CreatureManager::getBodyPartsName(CreatureUpgradeTypes::BELLY),
                    'value' => $creatureUser->getBelly() + 1,
                    'max_value' => 5
                ],
                [
                    'display_type' => 'boost_number',
                    'trait_type' => CreatureManager::getBodyPartsName(CreatureUpgradeTypes::BUTTOCKS),
                    'value' => $creatureUser->getButtocks() + 1,
                    'max_value' => 5
                ],
                [
                    'trait_type' => 'Speed',
                    'value' => (int)((CreatureManager::getReducedPerformanceValue($creatureUser->getSpeed(), $creatureUser->getCreature()->getSpeedMin()) / CreatureManager::getReducedPerformanceValue($creatureUser->getCreature()->getSpeedMax(), $creatureUser->getCreature()->getSpeedMin())) * 100) ?: 1,
                    'max_value' => 100
                ],
                [
                    'trait_type' => 'Acceleration',
                    'value' => (int)((CreatureManager::getReducedPerformanceValue($creatureUser->getAcceleration(), $creatureUser->getCreature()->getAccelerationMin(), 0.001) / CreatureManager::getReducedPerformanceValue($creatureUser->getCreature()->getAccelerationMax(), $creatureUser->getCreature()->getAccelerationMin())) * 100) ?: 1,
                    'max_value' => 100
                ],
                [
                    'trait_type' => 'Boost power',
                    'value' => (int)((CreatureManager::getReducedPerformanceValue($creatureUser->getBoostAcceleration(), $creatureUser->getCreature()->getBoostAccelerationMin()) / CreatureManager::getReducedPerformanceValue($creatureUser->getCreature()->getBoostAccelerationMax(), $creatureUser->getCreature()->getBoostAccelerationMin())) * 100) ?: 1,
                    'max_value' => 100
                ],
                [
                    'trait_type' => 'Fuel volume',
                    'value' => (int)((CreatureManager::getReducedPerformanceValue($creatureUser->getBoostTime(), $creatureUser->getCreature()->getBoostTimeMin()) / CreatureManager::getReducedPerformanceValue($creatureUser->getCreature()->getBoostTimeMax(), $creatureUser->getCreature()->getBoostTimeMin())) * 100) ?: 1,
                    'max_value' => 100
                ],
                [
                    'display_type' => 'number',
                    'trait_type' => 'Reward Pool (MATIC)',
                    'value' => $this->rewardPoolContractManager->getCollectedCycleBalance(),
                ],
                [
                    'display_type' => 'number',
                    'trait_type' => 'Tier',
                    'value' => $creatureUser->getCreature()->getTier(),
                ],
//                    [
//                        'display_type' => 'number',
//                        'trait_type' => 'Mint Cap',
//                        'value' => $this->capManager->buyCreature($creatureUser),
//                    ],
                [
                    'display_type' => 'date',
                    'trait_type' => 'Expiry date',
                    'value' => (int)$creatureUser->getNftExpiryDateFormat('U'),
                ],
            ]
        ];
    }
}
