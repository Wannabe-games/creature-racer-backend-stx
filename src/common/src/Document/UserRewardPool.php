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
 *              "isReceived"="desc",
 *              "timestamp"="desc"
 *         })
 *     }
 * )
 */
class UserRewardPool
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
     * @var null|string
     * @ODM\Field(type="string")
     */
    private $myStakingPower = null;

    /**
     * @var null|string
     * @ODM\Field(type="string")
     */
    private $totalRewardPool = null;

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
    private $status;

    /**
     * @var integer
     * @ODM\Field(type="int")
     */
    private $withdrawId;

    /**
     * @var integer
     * @ODM\Field(type="int")
     */
    private $cycle;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected $timestamp;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
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
     * @return string|null
     */
    public function getMyStakingPower(): ?string
    {
        return $this->myStakingPower;
    }

    /**
     * @param string|null $myStakingPower
     */
    public function setMyStakingPower(?string $myStakingPower): void
    {
        $this->myStakingPower = $myStakingPower;
    }

    /**
     * @return string|null
     */
    public function getTotalRewardPool(): ?string
    {
        return $this->totalRewardPool;
    }

    /**
     * @param string|null $totalRewardPool
     */
    public function setTotalRewardPool(?string $totalRewardPool): void
    {
        $this->totalRewardPool = $totalRewardPool;
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
}
