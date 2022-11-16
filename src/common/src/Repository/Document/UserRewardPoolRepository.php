<?php

namespace App\Common\Repository\Document;

use App\Document\UserRewardPool;
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
     * @param int $limit
     * @param int $from
     *
     * @return array
     *
     * @throws MongoDBException
     */
    public function findUserRewardPoolCycles(int $userId, int $limit = 7, int $from = 0): array
    {
        $data = new \DateTime();
        $data->sub(new \DateInterval("P7D"));

        $result = $this->createQueryBuilder()
            ->field('user')->equals($userId)
            ->field('timestamp')->gte($data)
            ->sort('timestamp', 'desc')
            ->limit($limit)
            ->skip($from)
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
     *
     * @return int
     *
     * @throws MongoDBException
     */
    public function findNextCountForWithdraw(int $userId): int
    {
        $result = $this->createQueryBuilder()
            ->field('user')->equals($userId)
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
     * @param \DateTime $date
     * @param int       $user
     *
     * @return object|null
     *
     * @throws MongoDBException
     */
    public function findCycleByDate(\DateTime $date, int $user): ?object
    {
        $dateToday = new \DateTime($date->format('Y-m-d'));

        $result = $this->createQueryBuilder()
            ->field('timestamp')->equals($dateToday)
            ->field('user')->equals($user)
            ->getQuery()
            ->execute()
            ->toArray();

        foreach ($result as $key => $value) {
            if ($key != 0) {
                $this->getDocumentManager()->remove($value);
            }
        }

        if (empty($result)) {
            return null;
        } else {
            return $result[0];
        }
    }

    /**
     * @param string $date
     *
     * @return object|null
     *
     * @throws MongoDBException
     */
    public function getCycleFromLastDay(string $date): ?object
    {
        $dateToday = new \DateTime($date);

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
