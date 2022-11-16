<?php
namespace App\Common\Repository\Creature;

use App\Entity\Creature\CreatureUpgrade;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CreatureUpgradeRepository.
 */
class CreatureUpgradeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreatureUpgrade::class);
    }

    /**
     * @param CreatureUpgrade $creatureUpdate
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(CreatureUpgrade $creatureUpdate): void
    {
        $this->getEntityManager()->persist($creatureUpdate);
        $this->getEntityManager()->flush();
    }

    /**
     * @param CreatureUpgrade $creatureUpdate
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(CreatureUpgrade $creatureUpdate): void
    {
        $this->getEntityManager()->remove($creatureUpdate);
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
