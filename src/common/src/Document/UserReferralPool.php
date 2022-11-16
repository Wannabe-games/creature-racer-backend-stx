<?php
namespace App\Document;

use App\Document\Log\PaymentLog;
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
    protected $id;

    /**
     * @var null|string
     * @ODM\Field(type="string")
     */
    private $myReward = null;

    /**
     * @var integer
     * @ODM\Field(type="int")
     */
    private $user;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    private $isReceived;

    /**
     * @var integer
     * @ODM\Field(type="int")
     */
    private $withdrawId;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected $timestamp;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected $changeStatusDate;

    /**
     * @var integer
     * @ODM\Field(type="int")
     */
    private $status;

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
        $this->isReceived = false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return DateTimeInterface
     */
    public function getTimestamp(): DateTimeImmutable|DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface $timestamp
     */
    public function setTimestamp(DateTimeImmutable|DateTimeInterface $timestamp): void
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
        return $this->isReceived;
    }

    /**
     * @param bool $isReceived
     */
    public function setIsReceived(bool $isReceived): void
    {
        $this->isReceived = $isReceived;
    }

    /**
     * @return int
     */
    public function getWithdrawId(): int
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
     * @param PaymentLog $paymentLog
     */
    public function addPaymentLog(PaymentLog $paymentLog): void
    {
        if (!$this->paymentLogs->contains($paymentLog)) {
            $this->paymentLogs->add($paymentLog);
        }
    }

    /**
     * @param PaymentLog $paymentLog
     */
    public function removePaymentLog(PaymentLog $paymentLog): void
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
