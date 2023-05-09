<?php
namespace App\Common\Repository;

use App\Entity\ContractLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class ContractLogRepository.
 */
class ContractLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContractLog::class);
    }

    /**
     * @param ContractLog $contractLog
     * @return void
     */
    public function save(ContractLog $contractLog): void
    {
        $this->getEntityManager()->persist($contractLog);
        $this->getEntityManager()->flush();
    }

    /**
     * @param ContractLog $contractLog
     * @return void
     */
    public function remove(ContractLog $contractLog): void
    {
        $this->getEntityManager()->remove($contractLog);
        $this->getEntityManager()->flush();
    }

    /**
     * @param $contractLog
     * @return void
     */
    public function persist($contractLog): void
    {
        $this->getEntityManager()->persist($contractLog);
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
