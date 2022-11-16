<?php
namespace App\DTO;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Utils\TimeTickerConverter;
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
        private ContainerInterface $container
    ) {}

    /**
     * @param CreatureUser $creatureUser
     *
     * @return string
     */
    public function toStringMessage(CreatureUser $creatureUser): string
    {
        $data = $this->serialize($creatureUser);

        return $data['address'].' '.
            $data['nftId'].' '.
            $data['typeId'].' '.
            $data['part1'].' '.
            $data['part2'].' '.
            $data['part3'].' '.
            $data['part4'].' '.
            $data['part5'].' '.
            $data['expiryTime'].' '.
            $data['price'];
    }

    /**
     * @param CreatureUser $creatureUser
     *
     * @return array
     */
    public function serialize(CreatureUser $creatureUser): array
    {
        $serializedData['address'] = $creatureUser->getUser()->getWallet();
        $serializedData['nftId'] = $creatureUser->getContract();
        $serializedData['typeId'] = $creatureUser->getCreature()->getId();
        $serializedData['part1'] = $creatureUser->getMuscles()+1;
        $serializedData['part2'] = $creatureUser->getLungs()+1;
        $serializedData['part3'] = $creatureUser->getHeart()+1;
        $serializedData['part4'] = $creatureUser->getBelly()+1;
        $serializedData['part5'] = $creatureUser->getButtocks()+1;
        $serializedData['expiryTime'] = $creatureUser->getNftExpiryDateFormat('U');
        $serializedData['price'] = $this->container->getParameter('mint_matic_price');

        return $serializedData;
    }
}
