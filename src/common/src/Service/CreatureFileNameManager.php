<?php
namespace App\Common\Service;

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
    public function getFileNameFromCreatureUser(CreatureUser $creatureUser): string
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

    /**
     * @param string $type
     * @param int    $skinColor
     * @param bool   $bonus
     *
     * @return string
     */
    public function getFileName(string $type, int $skinColor = 1, bool $bonus = false): string
    {
        $suffix = match ($skinColor) {
            1, 2, 3 => '_'.$skinColor,
            default => ''
        };

        if ($bonus) {
            $suffix = '_premium';
        }

        return $type.$suffix;
    }
}
