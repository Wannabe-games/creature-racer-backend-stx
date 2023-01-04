<?php

namespace App\Document\Log;

use App\Document\UserReferralPool;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;

/**
 * Class PaymentLog
 *
 * @ODM\Document(
 *     collection="payment_log",
 *     repositoryClass="App\Common\Repository\Document\PaymentLogRepository",
 *     indexes={
 *         @ODM\Index(keys={
 *              "userWallet"="desc",
 *              "timestamp"="desc"
 *         })
 *     }
 * )
 */
class PaymentLog
{
    /**
     * @ODM\Id
     */
    protected ?string $id = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $userWallet = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $amountRewardPool = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $amountReferralPool = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $gasFee = null;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected DateTimeInterface $timestamp;

    /**
     * @var UserReferralPool
     *
     * @ODM\ReferenceOne(targetDocument=UserReferralPool::class, nullable=true)
     */
    private UserReferralPool $userReferralPool;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getUserWallet(): ?string
    {
        return $this->userWallet;
    }

    /**
     * @param string|null $userWallet
     */
    public function setUserWallet(?string $userWallet): void
    {
        $this->userWallet = $userWallet;
    }

    /**
     * @return string|null
     */
    public function getAmountRewardPool(): ?string
    {
        return $this->amountRewardPool;
    }

    /**
     * @param string|null $amountRewardPool
     */
    public function setAmountRewardPool(?string $amountRewardPool): void
    {
        $this->amountRewardPool = $amountRewardPool;
    }

    /**
     * @return string|null
     */
    public function getAmountReferralPool(): ?string
    {
        return $this->amountReferralPool;
    }

    /**
     * @param string|null $amountReferralPool
     */
    public function setAmountReferralPool(?string $amountReferralPool): void
    {
        $this->amountReferralPool = $amountReferralPool;
    }

    /**
     * @return string|null
     */
    public function getGasFee(): ?string
    {
        return $this->gasFee;
    }

    /**
     * @param string|null $gasFee
     */
    public function setGasFee(?string $gasFee): void
    {
        $this->gasFee = $gasFee;
    }

    /**
     * @return DateTimeInterface
     */
    public function getTimestamp(): DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface $timestamp
     */
    public function setTimestamp(DateTimeInterface $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return UserReferralPool|null
     */
    public function getUserReferralPool(): ?UserReferralPool
    {
        return $this->userReferralPool;
    }

    /**
     * @param UserReferralPool $userReferralPool
     */
    public function setUserReferralPool(UserReferralPool $userReferralPool): void
    {
        $this->userReferralPool = $userReferralPool;
    }
}
