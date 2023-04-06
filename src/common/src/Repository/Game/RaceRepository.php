<?php

namespace App\Common\Repository\Game;

use App\Entity\Game\Race;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class RaceRepository.
 */
class RaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Race::class);
    }

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return array
     */
    public function getLobbies(
        int $offset = 0,
        int $limit = 20
    ): array {
        $qb = $this->createQueryBuilder('l');
        $qb
            ->where('l.timeleft IS NOT NULL AND l.timeleft >= :expirationTime')
            ->andWhere('l.hostRaceId IS NOT NULL')
            ->setParameter('expirationTime', new DateTime());

        return $qb
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('l.id', 'asc')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return int
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function countLobbies(): int
    {
        $qb = $this->createQueryBuilder('l');
        $qb
            ->where('l.timeleft IS NOT NULL AND l.timeleft >= :expirationTime')
            ->andWhere('l.hostRaceId IS NOT NULL')
            ->setParameter('expirationTime', new DateTime());

        return $qb
            ->select('COUNT(DISTINCT l.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param User $user
     * @param int $offset
     * @param int $limit
     *
     * @return array
     */
    public function getLobbiesForUser(
        User $user,
        int $offset = 0,
        int $limit = 20
    ): array {
        $qb = $this->createQueryBuilder('l');
        $qb
            ->where('l.timeleft IS NOT NULL AND l.timeleft >= :expirationTime')
            ->andWhere('l.host = :user')
            ->setParameter('expirationTime', new DateTime())
            ->setParameter('user', $user);

        return $qb
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('l.id', 'asc')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param User $user
     *
     * @return int
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function countLobbiesForUser(User $user): int
    {
        $qb = $this->createQueryBuilder('l');
        $qb
            ->where('l.timeleft IS NOT NULL AND l.timeleft >= :expirationTime')
            ->andWhere('l.host = :user')
            ->setParameter('expirationTime', new DateTime())
            ->setParameter('user', $user);

        return $qb
            ->select('COUNT(DISTINCT l.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param Race $race
     * @return void
     */
    public function save(Race $race): void
    {
        $this->getEntityManager()->persist($race);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Race $race
     * @return void
     */
    public function remove(Race $race): void
    {
        $this->getEntityManager()->remove($race);
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