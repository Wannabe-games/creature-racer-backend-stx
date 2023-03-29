<?php

namespace App\Common\Enum;

use ReflectionClass;
use ReflectionException;

/**
 * Class CreatureUpgradeLevels.
 */
class CreatureLevels
{
    public const BASE = 0;
    public const LEVEL_1 = 1;
    public const LEVEL_2 = 2;
    public const LEVEL_3 = 3;
    public const LEVEL_4 = 4;

    /**
     * @return array
     */
    public static function getUpgradeLevels(): array
    {
        try {
            $reflector = new ReflectionClass(new self());
        } catch (ReflectionException $e) {
            return [];
        }

        return $reflector->getConstants();
    }

    /**
     * @param int $level
     * @return bool
     */
    public static function validate(int $level): bool
    {
        return in_array($level, self::getUpgradeLevels(), true);
    }
}
