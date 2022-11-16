<?php
namespace App\Common\Service;

use App\Entity\Creature\CreatureUser;

/**
 * Class MintCapManager
 */
class MintCapManager
{
    public function buyCreature(CreatureUser $creatureUser): int
    {
        $cap = 1;

        $cap *= (5 - $creatureUser->getMuscles() + 1) * 2;
        $cap *= (5 - $creatureUser->getLungs() + 1) * 2;
        $cap *= (5 - $creatureUser->getHeart() + 1) * 2;
        $cap *= (5 - $creatureUser->getBelly() + 1) * 2;
        $cap *= (5 - $creatureUser->getButtocks() + 1) * 2;

        return $cap;
    }

}
