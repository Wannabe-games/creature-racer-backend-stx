<?php

namespace App\Common\Repository\Creature;

use App\Common\Repository\RepositoryTrait;
use App\Entity\Creature\CreatureLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CreatureLevelRepository.
 */
class CreatureLevelRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreatureLevel::class);
    }
}
