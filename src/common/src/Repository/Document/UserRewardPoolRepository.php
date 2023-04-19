<?php

namespace App\Common\Repository\Document;

use App\Document\UserRewardPool;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Iterator\Iterator;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Doctrine\ODM\MongoDB\Iterator\CachingIterator;

/**
 * Class UserRewardPoolRepository
 *
 * @package App\Repository\Document
 * @author Michał Wadas <michal@mklit.pl>
 */
class UserRewardPoolRepository extends DocumentRepository
{
    public function __construct(DocumentManager $dm)
    {
        $uow = $dm->getUnitOfWork();
        $classMetaData = $dm->getClassMetadata(UserRewardPool::class);

        parent::__construct($dm, $uow, $classMetaData);
    }

    /**
     * @param int $userId
     * @param int $startCycle
     * @param int $endCycle
     * @return array|UserRewardPool[]
     * @throws MongoDBException
     */
    public function findUserRewardPoolCycles(int $userId, int $startCycle = 1, int $endCycle = 1): array
    {
        $result = $this->createQueryBuilder()
            ->field('userId')->equals($userId)
            ->field('cycle')->lte($startCycle)
            ->field('cycle')->gte($endCycle)
            ->sort('cycle', 'desc')
            ->getQuery()
            ->execute();

        if (is_iterable($result)) {
            $result = ($result instanceof Iterator) ? $result->toArray() : $result;

            return (count($result) > 0) ? $result : [];
        }

        return [];
    }

    /**
     * @param int $userId
     * @return int
     * @throws MongoDBException
     */
    public function findNextCountForWithdraw(int $userId): int
    {
        $result = $this->createQueryBuilder()
            ->field('userId')->equals($userId)
            ->field('withdrawId')->exists(true)
            ->field('withdrawId')->notEqual(null)
            ->getQuery()
            ->execute();

        if (is_iterable($result)) {
            return $result instanceof CachingIterator ? count($result->toArray()) : count($result);
        }

        return 1;
    }

    /**
     * @param int $user
     * @param int $cycle
     * @return object|null
     * @throws MongoDBException
     */
    public function findCycleByUser(int $user, int $cycle): ?object
    {
        $result = $this->createQueryBuilder()
            ->field('userId')->equals($user)
            ->field('cycle')->equals($cycle)
            ->getQuery()
            ->execute()
            ->toArray();

        foreach ($result as $key => $value) {
            if ($key !== 0) {
                $this->getDocumentManager()->remove($value);
            }
        }

        return $result[0] ?? null;
    }

    /**
     * @param string $date
     * @return object|null
     * @throws MongoDBException
     */
    public function getCycleFromLastDay(string $date): ?object
    {
        $dateToday = new DateTime($date);

        $result = $this->createQueryBuilder()
            ->field('timestamp')->equals($dateToday)
            ->getQuery()
            ->execute()
            ->toArray();

        if (empty($result)) {
            return null;
        } else {
            return $result[0];
        }
    }
}
