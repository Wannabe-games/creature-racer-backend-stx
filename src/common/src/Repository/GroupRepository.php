<?php
namespace App\Common\Repository;

use App\Entity\Group;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class GroupRepository.
 */
class GroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Group::class);
    }

    /**
     * @param Group $group
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Group $group): void
    {
        $this->getEntityManager()->persist($group);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Group $group
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Group $group): void
    {
        $this->getEntityManager()->remove($group);
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
