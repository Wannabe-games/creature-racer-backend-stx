<?php

namespace App\Common\Enum;

use ReflectionClass;

/**
 * Class SystemTypes.
 */
class SystemTypes
{
    // Contract
    public const PAYMENT_LAST_BLOCK_NUMBER = 1;
    public const STAKING_CYCLE = 2;
    public const REWARD_POOL_CYCLE = 3;

    // Game
    public const GAME_SETTINGS = 100;

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
     * @param string $type
     *
     * @return bool
     */
    public static function validate(string $type) : bool
    {
        return in_array($type, self::getTypes());
    }
}
