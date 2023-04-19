<?php

namespace App\Document;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;

/**
 * Class UserReferralPool
 *
 * @ODM\Document(
 *     collection="referral_pool_user",
 *     repositoryClass="App\Common\Repository\Document\UserReferralPoolRepository",
 *     indexes={
 *         @ODM\Index(keys={
 *              "user"="desc",
 *              "isReceived"="desc",
 *              "timestamp"="desc"
 *         })
 *     }
 * )
 */
class UserReferralPool
{
    /**
     * @ODM\Id
     */
    protected ?string $id = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $myReward = null;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $user = null;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    private bool $received = false;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $withdrawId = null;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected DateTimeInterface $timestamp;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected DateTimeInterface $changeStatusDate;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $status = null;

    /**
     * @var ArrayCollection
     *
     * @ODM\ReferenceMany(targetDocument=PaymentLog::class)
     */
    private $paymentLogs;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->paymentLogs = new ArrayCollection();
        $this->timestamp = new DateTimeImmutable();
        $this->changeStatusDate = new DateTimeImmutable();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
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
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    /**
     * @return bool
     */
    public function isReceived(): bool
    {
        return $this->received;
    }

    /**
     * @param bool $received
     */
    public function setReceived(bool $received): void
    {
        $this->received = $received;
    }

    /**
     * @return int
     */
    public function getWithdrawId(): ?int
    {
        return $this->withdrawId;
    }

    /**
     * @param int $withdrawId
     */
    public function setWithdrawId(int $withdrawId): void
    {
        $this->withdrawId = $withdrawId;
    }

    /**
     * @return string|null
     */
    public function getMyReward(): ?string
    {
        return $this->myReward;
    }

    /**
     * @param string|null $myReward
     */
    public function setMyReward(?string $myReward): void
    {
        $this->myReward = $myReward;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return Collection
     */
    public function getPaymentLogs(): Collection
    {
        return $this->paymentLogs;
    }

    /**
     * @param ArrayCollection $paymentLogs
     */
    public function setPaymentLogs(ArrayCollection $paymentLogs): void
    {
        $this->paymentLogs = $paymentLogs;
    }

    /**
     * @param ContractLog $paymentLog
     */
    public function addPaymentLog(ContractLog $paymentLog): void
    {
        if (!$this->paymentLogs->contains($paymentLog)) {
            $this->paymentLogs->add($paymentLog);
        }
    }

    /**
     * @param ContractLog $paymentLog
     */
    public function removePaymentLog(ContractLog $paymentLog): void
    {
        if ($this->paymentLogs->contains($paymentLog)) {
            $this->paymentLogs->removeElement($paymentLog);
        }
    }

    /**
     * @return DateTimeInterface
     */
    public function getChangeStatusDate(): DateTimeInterface
    {
        return $this->changeStatusDate;
    }

    /**
     * @param DateTimeInterface $changeStatusDate
     */
    public function setChangeStatusDate(DateTimeInterface $changeStatusDate): void
    {
        $this->changeStatusDate = $changeStatusDate;
    }
}
