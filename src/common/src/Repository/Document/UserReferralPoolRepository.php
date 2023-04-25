<?php

namespace App\Common\Repository\Document;

use App\Document\UserReferralPool;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Iterator;

/**
 * Class UserReferralPoolRepository
 *
 * @package App\Repository\Document
 * @author Michał Wadas <michal@mklit.pl>
 */
class UserReferralPoolRepository extends DocumentRepository
{
    /**
     * @param DocumentManager $dm
     */
    public function __construct(DocumentManager $dm)
    {
        $uow = $dm->getUnitOfWork();
        $classMetaData = $dm->getClassMetadata(UserReferralPool::class);

        parent::__construct($dm, $uow, $classMetaData);
    }

    /**
     * @param int $userId
     * @return int
     * @throws MongoDBException
     */
    public function findNextCountForWithdraw(int $userId): int
    {
        $result = $this->createQueryBuilder()
            ->field('user')->equals($userId)
            ->field('withdrawId')->exists(true)
            ->field('withdrawId')->notEqual(null)
            ->limit(1)
            ->getQuery()
            ->execute();

        if (is_iterable($result)) {
            $result = ($result instanceof Iterator) ? $result->toArray() : $result;

            return isset($result[0]) ? $result[0]->getWithdrawId() : 0;
        }

        return 0;
    }

    /**
     * @param int $userId
     * @return object|null
     * @throws MongoDBException
     */
    public function findForWithdraw(int $userId): ?object
    {
        $result = $this->createQueryBuilder()
            ->field('user')->equals($userId)
            ->limit(1)
            ->getQuery()
            ->execute();

        if (is_iterable($result)) {
            $result = ($result instanceof Iterator) ? $result->toArray() : $result;

            return (count($result) > 0) ? $result[0] : null;
        }

        return null;
    }

    /**
     * @param int $userId
     * @return object|null
     * @throws MongoDBException
     */
    public function findForUser(int $userId): ?object
    {
        $result = $this->createQueryBuilder()
            ->field('userId')->equals($userId)
            ->field('received')->exists(true)
            ->field('received')->equals(false)
            ->limit(1)
            ->getQuery()
            ->execute();

        if (is_iterable($result)) {
            $result = ($result instanceof Iterator) ? $result->toArray() : $result;

            return (count($result) > 0) ? $result[0] : null;
        }

        return null;
    }
}
