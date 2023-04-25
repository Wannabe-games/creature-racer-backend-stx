<?php

namespace App\Document;

use DateTimeImmutable;
use DateTimeInterface;
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
     * @var int
     * @ODM\Field(type="int")
     */
    private int $myReward = 0;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $userId = null;

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
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $status = null;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected DateTimeInterface $createdAt;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getMyReward(): int
    {
        return $this->myReward;
    }

    /**
     * @param int $myReward
     */
    public function setMyReward(int $myReward): void
    {
        $this->myReward = $myReward;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     */
    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
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
     * @return int|null
     */
    public function getWithdrawId(): ?int
    {
        return $this->withdrawId;
    }

    /**
     * @param int|null $withdrawId
     */
    public function setWithdrawId(?int $withdrawId): void
    {
        $this->withdrawId = $withdrawId;
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @param int|null $status
     */
    public function setStatus(?int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface $createdAt
     */
    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
