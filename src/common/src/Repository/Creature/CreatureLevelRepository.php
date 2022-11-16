<?php
namespace App\Common\Repository\Creature;

use App\Entity\Creature\CreatureLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CreatureLevelRepository.
 */
class CreatureLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreatureLevel::class);
    }

    /**
     * @param CreatureLevel $creatureLevel
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(CreatureLevel $creatureLevel): void
    {
        $this->getEntityManager()->persist($creatureLevel);
        $this->getEntityManager()->flush();
    }

    /**
     * @param CreatureLevel $creatureLevel
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(CreatureLevel $creatureLevel): void
    {
        $this->getEntityManager()->remove($creatureLevel);
        $this->getEntityManager()->flush();
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
