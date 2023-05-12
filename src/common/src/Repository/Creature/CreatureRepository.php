<?php

namespace App\Common\Repository\Creature;

use App\Common\Repository\RepositoryTrait;
use App\Entity\Creature\Creature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CreatureRepository.
 */
class CreatureRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Creature::class);
    }
}
