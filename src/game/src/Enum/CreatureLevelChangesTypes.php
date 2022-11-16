<?php

namespace App\Enum;

use ReflectionClass;

/**
 * Class CreatureLevelChangesTypes.
 */
class CreatureLevelChangesTypes
{
    /**
     * Acc = 0,
     * Speed,
     * StartSpeed,
     * Gearbox,
     * BoostTime,
     * BoostAccBonus,
     * BoostSpeedBonus,
     * NerfFactor
     * From game engin:
     *
     * Speed -> speed -> power -> speed
     * Acc -> acceleration -> acceleration -> acceleration
     * BoostAccBonus -> boostAcceleration -> grip -> gas_pressure
     * BoostTime -> boostTime -> gearbox -> gas_volume
     * BoostSpeedBonus -> gas_volume_bonus
     */
    public static array $types = [
        'acceleration' => 0,
        'speed' => 1,
        'StartSpeed' => 2, // not used
        'Gearbox' => 3, // not used
        'gas_volume' => 4,
        'gas_pressure' => 5,
        'gas_volume_bonus' => 6, // sum in migrations
        'NerfFactor' => 7 // not used
    ];


    /**
     * @return array
     */
    public static function getTypes(): array
    {
        try {
            $reflector = new ReflectionClass(new self());
        } catch (\ReflectionException $e) {
            return [];
        }

        return $reflector->getConstants();
    }

    /**
     * @param $value
     *
     * @return string
     */
    public static function getName($value): string
    {
        return in_array($value, self::$types) ? array_search($value, self::$types) : 'unknown';
    }
}
