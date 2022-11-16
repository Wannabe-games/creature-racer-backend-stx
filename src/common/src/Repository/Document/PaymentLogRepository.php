<?php

namespace App\Common\Repository\Document;

use App\Document\Log\PaymentLog;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\MongoDBException;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

/**
 * Class PaymentLogRepository
 *
 * @package App\Repository\Document
 * @author Michał Wadas <michal@mklit.pl>
 */
class PaymentLogRepository extends DocumentRepository
{
    /**
     * @param DocumentManager $dm
     */
    public function __construct(DocumentManager $dm)
    {
        $uow = $dm->getUnitOfWork();
        $classMetaData = $dm->getClassMetadata(PaymentLog::class);

        parent::__construct($dm, $uow, $classMetaData);
    }

    /**
     * @param \DateTime|null $dateFrom
     * @param \DateTime|null $dateTo
     *
     * @return object|null
     *
     * @throws MongoDBException
     */
    public function findCycleSettlement(?\DateTime $dateFrom = null, ?\DateTime $dateTo = null): ?object
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
}
