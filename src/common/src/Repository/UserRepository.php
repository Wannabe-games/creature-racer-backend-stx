<?php

namespace App\Common\Repository;

use App\Entity\User;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class UserRepository.
 */
class UserRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getNextRnftToIncrementInvitation(DateTime $time): ?User
    {
        $qb = $this->createQueryBuilder('u');
        $qb
            ->where('u.fromReferralNft IS NOT NULL')
            ->andWhere('u.incrementInvitationHash IS NULL')
            ->andWhere('u.updatedAt IS NULL OR u.updatedAt < :time')
            ->setParameter('time', $time);

        return $qb
            ->orderBy('u.updatedAt', 'asc')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
