<?php

namespace App\Common\Enum;

use ReflectionClass;

/**
 * Class UserRewardPoolStatus.
 */
class UserRewardPoolStatus
{
    public const CRON_VERIFICATION = 1;
    public const PENDING = 2;
    public const PAID = 3;

    /**
     * @return array
     */
    public static function getStatuses(): array
    {
        try {
            $reflector = new ReflectionClass(new self());
        } catch (\ReflectionException $e) {
            return [];
        }

        return $reflector->getConstants();
    }

    /**
     * @param int $status
     *
     * @return bool
     */
    public static function validate(int $status) : bool
    {
        return in_array($status, self::getStatuses());
    }
}
