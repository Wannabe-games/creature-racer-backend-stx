<?php

namespace App\DTO;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUser;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class NftUserCreature
 * @package App\DTO\NftUserCreature
 */
class NftUserCreature
{
    public function __construct(
        private ContainerInterface $container,
        private CreatureLevelRepository $creatureLevelRepository
    ) {
    }

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
        /** @var CreatureLevel $creatureBuy */
        $creatureBuy = $this->creatureLevelRepository->findOneBy(
            [
                'upgradeType' => 'base',
                'creatureType' => $creatureUser->getCreature()->getType(),
            ]
        );

        $serializedData['nftId'] = $creatureUser->getContract();
        $serializedData['typeId'] = $creatureUser->getCreature()->getId();
        $serializedData['part1'] = $creatureUser->getMuscles() + 1;
        $serializedData['part2'] = $creatureUser->getLungs() + 1;
        $serializedData['part3'] = $creatureUser->getHeart() + 1;
        $serializedData['part4'] = $creatureUser->getBelly() + 1;
        $serializedData['part5'] = $creatureUser->getButtocks() + 1;
        $serializedData['expiryTimestamp'] = (int)$creatureUser->getNftExpiryDateFormat('U');
        $serializedData['price'] = $creatureBuy->getPriceStacks();
        $serializedData['key'] = $creatureUser->getUser()->getPublicKey();
        $serializedData['address'] = $creatureUser->getUser()->getWallet();

        return $serializedData;
    }
}
