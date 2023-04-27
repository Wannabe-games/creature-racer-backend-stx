<?php

namespace App\Common\Repository\Document;

use App\Document\ContractLog;
use DateTime;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;
use Iterator;

/**
 * Class PaymentLogRepository
 *
 * @package App\Repository\Document
 * @author Michał Wadas <michal@mklit.pl>
 */
class ContractLogRepository extends DocumentRepository
{
    /**
     * @param DocumentManager $dm
     */
    public function __construct(DocumentManager $dm)
    {
        $uow = $dm->getUnitOfWork();
        $classMetaData = $dm->getClassMetadata(ContractLog::class);

        parent::__construct($dm, $uow, $classMetaData);
    }

    /**
     * @param DateTime|null $dateFrom
     * @param DateTime|null $dateTo
     *
     * @return object|null
     *
     * @throws MongoDBException
     */
    public function findCycleSettlement(?DateTime $dateFrom = null, ?DateTime $dateTo = null): ?object
    {
        $dq = $this->createQueryBuilder()
            ->field('timestamp');
        if (!empty($dateFrom)) {
            $dq->gt($dateFrom);
        }
        if (!empty($dateTo)) {
            $dq->lt($dateTo);
        }

        return $dq->getQuery()
            ->execute();
    }

    public function getRewardTransactionForWallet(string $userReferralWallet): array
    {
        $result = $this->createQueryBuilder()
            ->field('userWallet')->equals($userReferralWallet)
            ->field('contractName')->equals('creature-racer-payment')
            ->field('contractFunctionName')->equals('receive-funds')
            ->getQuery()
            ->execute();

        if (is_iterable($result)) {
            $result = ($result instanceof Iterator) ? $result->toArray() : $result;

            return (count($result) > 0) ? $result : [];
        }

        return [];
    }
}
