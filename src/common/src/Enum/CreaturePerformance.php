<?php

namespace App\Common\Enum;

use ReflectionClass;

/**
 * Class CreaturePerformance.
 */
class CreaturePerformance
{
    const UPGRADE_SPEED = 'speed';
    const UPGRADE_ACCELERATION = 'acceleration';
    const UPGRADE_BOOST_POWER = 'boostAcceleration';
    const UPGRADE_FUEL = 'boostTime';

    /**
     * @return array
     */
    public static function getPerformance(): array
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
        return in_array($type, self::getPerformance());
    }
}
