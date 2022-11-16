<?php
namespace App\Common\Repository;

use App\Entity\ReferralNft;
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

    /**
     * @param ReferralNft $referralNft
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(ReferralNft $referralNft): void
    {
        $this->getEntityManager()->persist($referralNft);
        $this->getEntityManager()->flush();
    }

    /**
     * @param ReferralNft $referralNft
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ReferralNft $referralNft): void
    {
        $this->getEntityManager()->remove($referralNft);
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
