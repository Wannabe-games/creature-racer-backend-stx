<?php

namespace App\Common\Repository\Creature;

use App\Common\Repository\RepositoryTrait;
use App\Entity\Creature\CreatureUpgrade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CreatureUpgradeRepository.
 */
class CreatureUpgradeRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreatureUpgrade::class);
    }
}
