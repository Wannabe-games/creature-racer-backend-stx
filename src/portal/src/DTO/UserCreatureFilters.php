<?php
namespace App\DTO;

/**
 * Class UserCreatureFilters
 * @package App\DTO\UserCreatureFilters
 */
class UserCreatureFilters
{

    /**
     * @param array $data
     *
     * @return bool
     */
    public function validate(array $data): bool
    {
        if (
            !key_exists('isForUser', $data) ||
            !key_exists('tier', $data) ||
            !key_exists('cohort', $data) ||
            !key_exists('type', $data) ||
            !key_exists('muscles', $data) ||
            !key_exists('lungs', $data) ||
            !key_exists('heart', $data) ||
            !key_exists('belly', $data) ||
            !key_exists('buttocks', $data) ||
            !key_exists('isExpiredSoon', $data)
        ) {
            return false;
        }

        return true;
    }
}
