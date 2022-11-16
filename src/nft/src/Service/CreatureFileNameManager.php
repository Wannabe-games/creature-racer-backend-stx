<?php
namespace App\Service;

use App\Entity\Creature\CreatureUser;

/**
 * Class CreatureFileNameManager
 * @package App\Service
 */
class CreatureFileNameManager
{
    /**
     * @param CreatureUser $creatureUser
     *
     * @return string
     */
    public function getFileName(CreatureUser $creatureUser): string
    {
        $suffix = match ($creatureUser->getSkinColor()) {
            1, 2, 3 => '_'.$creatureUser->getSkinColor(),
            default => ''
        };

        if ($creatureUser->hasBonus()) {
            $suffix = '_premium';
        }

        return $creatureUser->getCreature()->getType().$suffix;
    }
}
