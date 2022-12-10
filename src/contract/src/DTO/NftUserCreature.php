<?php

namespace App\DTO;

use App\Entity\Creature\CreatureUser;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class NftUserCreature
 * @package App\DTO\NftUserCreature
 */
class NftUserCreature
{
    public function __construct(
        private readonly ContainerInterface $container
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
        $serializedData['nftId'] = $creatureUser->getContract();
        $serializedData['typeId'] = $creatureUser->getCreature()->getId();
        $serializedData['part1'] = $creatureUser->getMuscles() + 1;
        $serializedData['part2'] = $creatureUser->getLungs() + 1;
        $serializedData['part3'] = $creatureUser->getHeart() + 1;
        $serializedData['part4'] = $creatureUser->getBelly() + 1;
        $serializedData['part5'] = $creatureUser->getButtocks() + 1;
        $serializedData['expiryTimestamp'] = $creatureUser->getNftExpiryDateFormat('U');
        $serializedData['price'] = $this->container->getParameter('mint_price');
        $serializedData['ownerKey'] = $creatureUser->getUser()->getPublicKey();
        $serializedData['ownerPubKey'] = $creatureUser->getUser()->getPublicKey();
        $serializedData['ownerAddr'] = $creatureUser->getUser()->getWallet();

        return $serializedData;
    }
}
