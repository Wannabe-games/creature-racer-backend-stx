<?php

namespace App\Document;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;

/**
 * Class UserRewardPool
 *
 * @ODM\Document(
 *     collection="reward_pool_user",
 *     repositoryClass="App\Common\Repository\Document\UserRewardPoolRepository",
 *     indexes={
 *         @ODM\Index(keys={
 *              "user"="desc",
 *              "cycle"="desc",
 *              "isReceived"="desc",
 *         })
 *     }
 * )
 */
class UserRewardPool
{
    /**
     * @ODM\Id
     */
    protected ?string $id = null;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $userId = null;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $cycle = null;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    private string $myStakingPower = '0';

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    private int $myReward = 0;

    /**
     * @var int
     * @ODM\Field(type="int")
     */
    private int $totalRewardPool = 0;

    /**
     * @var bool
     * @ODM\Field(type="bool")
     */
    private bool $received = false;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $status = null;

    /**
     * @var integer|null
     * @ODM\Field(type="int")
     */
    private ?int $withdrawId = null;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int|null
     */
    public function getCycle(): ?int
    {
        return $this->cycle;
    }

    /**
     * @param int $cycle
     */
    public function setCycle(int $cycle): void
    {
        $this->cycle = $cycle;
    }

    /**
     * @return string
     */
    public function getMyStakingPower(): string
    {
        return $this->myStakingPower;
    }

    /**
     * @param string $myStakingPower
     */
    public function setMyStakingPower(string $myStakingPower): void
    {
        $this->myStakingPower = $myStakingPower;
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
     * @return int
     */
    public function getTotalRewardPool(): int
    {
        return $this->totalRewardPool;
    }

    /**
     * @param int $totalRewardPool
     */
    public function setTotalRewardPool(int $totalRewardPool): void
    {
        $this->totalRewardPool = $totalRewardPool;
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
     * @param int $withdrawId
     */
    public function setWithdrawId(int $withdrawId): void
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
     * @param int $status
     */
    public function setStatus(int $status): void
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
