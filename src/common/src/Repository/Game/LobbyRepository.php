<?php

namespace App\Common\Repository\Game;

use App\Entity\Game\Lobby;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class LobbyRepository.
 */
class LobbyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lobby::class);
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

        return $qb->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('l.id', 'asc')
            ->getQuery()
            ->getResult();
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
        $qb->where('l.host = :user')->setParameter('user', $user);

        return $qb->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('l.id', 'asc')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param Lobby $lobby
     * @return void
     */
    public function save(Lobby $lobby): void
    {
        $this->getEntityManager()->persist($lobby);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Lobby $lobby
     * @return void
     */
    public function remove(Lobby $lobby): void
    {
        $this->getEntityManager()->remove($lobby);
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
