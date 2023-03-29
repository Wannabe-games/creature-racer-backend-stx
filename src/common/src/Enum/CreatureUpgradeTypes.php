<?php

namespace App\Common\Enum;

use ReflectionClass;
use ReflectionException;

/**
 * Class CreatureUpgradeTypes.
 */
class CreatureUpgradeTypes
{
    public const BASE = 'base';
    public const BELLY = 'boost';
    public const BUTTOCKS = 'boost2';
    public const HEART = 'reflex';
    public const LUNGS = 'lung';
    public const MUSCLES = 'muscles';

    /**
     * @return array
     */
    public static function getUpgradeTypes(): array
    {
        try {
            $reflector = new ReflectionClass(new self());
        } catch (ReflectionException $e) {
            return [];
        }

        return $reflector->getConstants();
    }

    /**
     * @param string $type
     * @return bool
     */
    public static function validate(string $type): bool
    {
        return in_array($type, self::getUpgradeTypes(), true);
    }
}
