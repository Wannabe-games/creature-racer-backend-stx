<?php

namespace App\Common\Repository;

use App\Entity\ReferralNft;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class ReferralNftRepository.
 */
class ReferralNftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReferralNft::class);
    }

    public function getNextRnftToMint(DateTime $time): ?ReferralNft
    {
        $qb = $this->createQueryBuilder('r');
        $qb
            ->where('r.mintHash IS NULL')
            ->andWhere('r.transferHash IS NULL')
            ->andWhere('r.updatedAt IS NULL OR r.updatedAt < :time')
            ->setParameter('time', $time);

        return $qb
            ->orderBy('r.updatedAt', 'asc')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getNextRnftToTransfer(DateTime $time): ?ReferralNft
    {
        $qb = $this->createQueryBuilder('r');
        $qb
            ->where('r.mintHash IS NOT NULL')
            ->andWhere('r.transferHash IS NULL')
            ->andWhere('r.updatedAt IS NULL OR r.updatedAt < :time')
            ->setParameter('time', $time);

        return $qb
            ->orderBy('r.updatedAt', 'asc')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param ReferralNft $referralNft
     */
    public function save(ReferralNft $referralNft): void
    {
        $this->getEntityManager()->persist($referralNft);
        $this->getEntityManager()->flush();
    }

    /**
     * @param ReferralNft $referralNft
     * @return void
     */
    public function remove(ReferralNft $referralNft): void
    {
        $this->getEntityManager()->remove($referralNft);
        $this->getEntityManager()->flush();
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        $this->getEntityManager()->flush();
    }
}
