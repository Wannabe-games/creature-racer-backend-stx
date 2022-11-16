<?php

namespace App\Common\Enum;

use ReflectionClass;

/**
 * Class CreatureUpgradeTypes.
 */
class CreatureUpgradeTypes
{
    public const BASE_UPGRADE_TYPE = 'base';
    public const MUSCLES_UPGRADE_TYPE = 'muscles';
    public const LUNG_UPGRADE_TYPE = 'lung';
    public const REFLEX_UPGRADE_TYPE = 'reflex';
    public const BOOST_UPGRADE_TYPE = 'boost';
    public const BOOST2_UPGRADE_TYPE = 'boost2';

    /**
     * @return array
     */
    public static function getUpgradeTypes(): array
    {
        try {
            $reflector = new ReflectionClass(new self());
        } catch (\ReflectionException $e) {
            return [];
        }

        return $reflector->getConstants();
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    public static function validate(string $type) : bool
    {
        return in_array($type, self::getUpgradeTypes());
    }
}
