<?php

namespace App\Common\Repository\Creature;

use App\Common\Repository\RepositoryTrait;
use App\Entity\Creature\CreatureUser;
use App\Entity\User;
use DateInterval;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\Persistence\ManagerRegistry;

use function Doctrine\ORM\QueryBuilder;

/**
 * Class CreatureUserRepository.
 */
class CreatureUserRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreatureUser::class);
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function findForGame(User $user): array
    {
        $qb = $this->createQueryBuilder('cu');

        return $qb
            ->where($qb->expr()->eq('cu.user', ':user'))
            ->andWhere($qb->expr()->eq('cu.forGame', ':forGame'))
            ->setParameters(
                [
                    'user' => $user->getId(),
                    'forGame' => true
                ]
            )
            ->getQuery()
            ->getResult();
    }

    /**
     * @param User $user
     * @return CreatureUser|null
     * @throws NonUniqueResultException
     */
    public function findActiveCreatureUser(User $user)
    {
        $qb = $this->createQueryBuilder('cu');

        return $qb
            ->leftJoin('cu.creature', 'c')
            ->where('cu.user = :user')
            ->andWhere('c.type = :type')
            ->andWhere('cu.forGame = :forGame')
            ->setParameters(
                [
                    'user' => $user->getId(),
                    'type' => $user->getPlayer()?->getActiveAnimalCreatureType(),
                    'forGame' => true,
                ]
            )
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    /**
     * @param string $type
     * @param User $user
     *
     * @return array
     */
    public function findByCreatureType(string $type, User $user): array
    {
        $qb = $this->createQueryBuilder('cu');

        $qb->leftJoin('cu.creature', 'cr')
            ->leftJoin('cu.user', 'u')
            ->where($qb->expr()->like('cr.type', ':type'))
            ->andWhere($qb->expr()->eq('u.id', ':userId'))
            ->setParameters(
                [
                    'type' => $type,
                    'userId' => $user->getId()
                ]
            );

        return $qb->getQuery()->getResult();
    }

    /**
     * @param User|null $user
     * @param int|null $tier
     * @param int|null $cohort
     * @param string|null $type
     * @param int|null $muscles
     * @param int|null $lungs
     * @param int|null $heart
     * @param int|null $belly
     * @param int|null $buttocks
     * @param bool|null $expiredDate
     * @param int $offset
     * @param int $limit
     *
     * @return array
     */
    public function nftFilter(
        User $user = null,
        int $tier = null,
        int $cohort = null,
        string $type = null,
        int $muscles = null,
        int $lungs = null,
        int $heart = null,
        int $belly = null,
        int $buttocks = null,
        bool $expiredDate = null,
        int $offset = 0,
        int $limit = 20
    ): array {
        $qb = $this->createQueryBuilder('cu');

        $qb
            ->leftJoin('cu.user', 'u')
            ->leftJoin('cu.creature', 'c');

        if (!empty($user)) {
            $qb->andWhere($qb->expr()->eq('u.id', ':userId'))
                ->setParameter('userId', $user->getId());
        }
        if (!empty($tier)) {
            $qb->andWhere($qb->expr()->eq('c.tier', ':tier'))
                ->setParameter('tier', $tier);
        }
        if (!empty($cohort)) {
            $qb->andWhere($qb->expr()->eq('c.cohort', ':cohort'))
                ->setParameter('cohort', $cohort);
        }
        if (!empty($type)) {
            $qb->andWhere($qb->expr()->eq('c.type', ':type'))
                ->setParameter('type', $type);
        }
        if (!empty($muscles)) {
            $qb->andWhere($qb->expr()->eq('cu.muscles', ':muscles'))
                ->setParameter('muscles', $muscles);
        }
        if (!empty($lungs)) {
            $qb->andWhere($qb->expr()->eq('cu.lungs', ':lungs'))
                ->setParameter('lungs', $lungs);
        }
        if (!empty($heart)) {
            $qb->andWhere($qb->expr()->eq('cu.heart', ':heart'))
                ->setParameter('heart', $heart);
        }
        if (!empty($belly)) {
            $qb->andWhere($qb->expr()->eq('cu.belly', ':belly'))
                ->setParameter('belly', $belly);
        }
        if (!empty($buttocks)) {
            $qb->andWhere($qb->expr()->eq('cu.buttocks', ':buttocks'))
                ->setParameter('buttocks', $buttocks);
        }
        if (!empty($expiredDate) && $expiredDate) {
            $date = new DateTime();
            $date->add(new DateInterval("P7D"));
            $qb->andWhere($qb->expr()->lte('cu.nftExpiryDate', ':expiredDate'))
                ->setParameter('expiredDate', $date->format('Y-m-d H:i:s'));
        }

        return $qb->setFirstResult($offset)
            ->setMaxResults($limit)
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
    public function getCreatureUserForUser(
        User $user,
        int $offset = 0,
        int $limit = 20
    ): array {
        $qb = $this->createQueryBuilder('cu');

        $qb
            ->where($qb->expr()->eq('cu.user', ':userId'))
            ->setParameter('userId', $user->getId());

        return $qb->setFirstResult($offset)
            ->setMaxResults($limit)
            ->orderBy('cu.createdAt', 'asc')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param User $user
     *
     * @return int
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function readyToUpgradeCount(User $user): int
    {
        $qb = $this->createQueryBuilder('cu');

        $qb->select('count(cu.id)')
            ->leftJoin('cu.user', 'u')
            ->where($qb->expr()->eq('u.id', ':userId'))
            ->andWhere($qb->expr()->eq('cu.staked', 'true'))
            ->setParameter('userId', $user->getId());

        return $qb->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param User $user
     *
     * @return int
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function stakedCount(User $user): int
    {
        $qb = $this->createQueryBuilder('cu');

        $qb->select('count(cu.id)')
            ->leftJoin('cu.user', 'u')
            ->where($qb->expr()->eq('cu.staked', 'true'))
            ->andWhere($qb->expr()->eq('u.id', ':userId'))
            ->setParameter('userId', $user->getId());

        return $qb->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param User $user
     *
     * @return int
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function mintedCount(User $user): int
    {
        $qb = $this->createQueryBuilder('cu');

        $qb->select('count(cu.id)')
            ->leftJoin('cu.user', 'u')
            ->andWhere($qb->expr()->eq('u.id', ':userId'))
            ->setParameter('userId', $user->getId());

        return $qb->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param User $user
     *
     * @return int
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function expiredSoonCount(User $user): int
    {
        $qb = $this->createQueryBuilder('cu');

        $date = new DateTime();
        $date->add(new DateInterval("P7D"));

        $qb->select('count(cu.id)')
            ->leftJoin('cu.user', 'u')
            ->where($qb->expr()->lte('cu.nftExpiryDate', ':expiredDate'))
            ->setParameter('expiredDate', $date->format('Y-m-d H:i:s'))
            ->andWhere($qb->expr()->eq('u.id', ':userId'))
            ->setParameter('userId', $user->getId());

        return $qb->getQuery()
            ->getSingleScalarResult();
    }
}
