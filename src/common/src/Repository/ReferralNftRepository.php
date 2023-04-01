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
