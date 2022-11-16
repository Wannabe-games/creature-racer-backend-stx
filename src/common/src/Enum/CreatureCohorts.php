<?php

namespace App\Common\Enum;

use ReflectionClass;

/**
 * Class CreatureCohorts.
 */
class CreatureCohorts
{
    public const FIRST_COHORT = 1;
    public const SECOND_COHORT = 2;
    public const THIRD_COHORT = 3;
    public const FORTH_COHORT = 4;
    public const FIFTH_COHORT = 5;
    public const SIXTH_COHORT = 6;
    public const SEVENTH_COHORT = 7;
    public const EIGHTH_COHORT = 8;
    public const NINTH_COHORT = 9;

    /**
     * @var int[]
     */
    public static $creatureCohorts = [
        CreatureTypes::CREATURE_TYPE_BOAR => self::FIRST_COHORT,
        CreatureTypes::CREATURE_TYPE_BIRD => self::FIRST_COHORT,
        CreatureTypes::CREATURE_TYPE_COW => self::FIRST_COHORT,
        CreatureTypes::CREATURE_TYPE_FROG => self::SECOND_COHORT,
        CreatureTypes::CREATURE_TYPE_DOG => self::SECOND_COHORT,
        CreatureTypes::CREATURE_TYPE_SQUIRREL => self::SECOND_COHORT,
        CreatureTypes::CREATURE_TYPE_RHINO => self::THIRD_COHORT,
        CreatureTypes::CREATURE_TYPE_HIPPO => self::FORTH_COHORT,
        CreatureTypes::CREATURE_TYPE_ELEPHANT => self::FORTH_COHORT,
        CreatureTypes::CREATURE_TYPE_GORILLA => self::FORTH_COHORT,
        CreatureTypes::CREATURE_TYPE_CROCODILE => self::FIFTH_COHORT,
        CreatureTypes::CREATURE_TYPE_GIRAFFE => self::FIFTH_COHORT,
        CreatureTypes::CREATURE_TYPE_TURTLE => self::FIFTH_COHORT,
        CreatureTypes::CREATURE_TYPE_UNICORN => self::SIXTH_COHORT,
        CreatureTypes::CREATURE_TYPE_WOLF => self::SEVENTH_COHORT,
        CreatureTypes::CREATURE_TYPE_PANDA => self::SEVENTH_COHORT,
        CreatureTypes::CREATURE_TYPE_RACCOON => self::SEVENTH_COHORT,
        CreatureTypes::CREATURE_TYPE_REINDEER => self::EIGHTH_COHORT,
        CreatureTypes::CREATURE_TYPE_BUNNY => self::EIGHTH_COHORT,
        CreatureTypes::CREATURE_TYPE_DRAGON => self::EIGHTH_COHORT,
        CreatureTypes::CREATURE_TYPE_TIGER => self::NINTH_COHORT,
   ];

    /**
     * @return array
     */
    public static function getCohorts(): array
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
        return in_array($type, self::getCohorts());
    }
}
