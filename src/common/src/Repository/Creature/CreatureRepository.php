<?php
namespace App\Common\Repository\Creature;

use App\Entity\Creature\Creature;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CreatureRepository.
 */
class CreatureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Creature::class);
    }

    /**
     * @param Creature $creature
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Creature $creature): void
    {
        $this->getEntityManager()->persist($creature);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Creature $creature
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Creature $creature): void
    {
        $this->getEntityManager()->remove($creature);
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
