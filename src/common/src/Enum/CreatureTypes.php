<?php

namespace App\Common\Enum;

use ReflectionClass;

/**
 * Class CreatureTypes.
 */
class CreatureTypes
{   
   public const CREATURE_TYPE_BOAR = 'boar';
   public const CREATURE_TYPE_BIRD = 'bird';
   public const CREATURE_TYPE_COW = 'cow';
   public const CREATURE_TYPE_FROG = 'lizard';
   public const CREATURE_TYPE_DOG = 'dog';
   public const CREATURE_TYPE_SQUIRREL = 'squirrel';
   public const CREATURE_TYPE_RHINO = 'rhino';
   public const CREATURE_TYPE_HIPPO = 'hippo';
   public const CREATURE_TYPE_ELEPHANT = 'elephant';
   public const CREATURE_TYPE_GORILLA = 'gorilla';
   public const CREATURE_TYPE_CROCODILE = 'croko';
   public const CREATURE_TYPE_GIRAFFE = 'giraffe';
   public const CREATURE_TYPE_TURTLE = 'turtle';
   public const CREATURE_TYPE_UNICORN = 'unicorn';
   public const CREATURE_TYPE_WOLF = 'wolf';
   public const CREATURE_TYPE_PANDA = 'panda';
   public const CREATURE_TYPE_RACCOON = 'raccoon';
   public const CREATURE_TYPE_REINDEER = 'reindeer';
   public const CREATURE_TYPE_BUNNY = 'bunny';
   public const CREATURE_TYPE_DRAGON = 'dragon';
   public const CREATURE_TYPE_TIGER = 'tiger';

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
