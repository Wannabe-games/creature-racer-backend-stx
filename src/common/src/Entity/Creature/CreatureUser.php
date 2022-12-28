<?php

namespace App\Entity\Creature;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV6;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Creature\CreatureUserRepository")
 * @ORM\Table(name="game_creature_user")
 */
class CreatureUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var UuidV6
     *
     * @ORM\Column(type="uuid", unique=true)
     */
    protected $uuid;

    /**
     * @var string
     *
     * @ORM\Column(length=180)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(length=150, nullable=true)
     */
    private $hash;

    /**
     * @var integer
     *
     * @ORM\Column(name="contract_id", type="integer", nullable=true)
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="contract_id_seq", initialValue=1, allocationSize=100)
     */
    protected $contract;

    /**
     * Creature definition.
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Creature\Creature")
     * @ORM\JoinColumn(name="creature_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private $creature;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="creatures")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $muscles;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $lungs;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $heart;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $belly;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $buttocks;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $speed;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $acceleration;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $boostTime;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $boostVelocity;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $boostAcceleration;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $upgradeMusclesEnd;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $upgradeLungsEnd;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $upgradeHeartEnd;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $upgradeBellyEnd;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTime $upgradeButtocksEnd;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private bool $isForGame;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private bool $isStacked;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private bool $bonus;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $skinColor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected ?\DateTime $nftExpiryDate;

    /**
     * @var float|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private ?float $rewardPool;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $royalties;

    /**
     * @var string|null
     *
     * @ORM\Column(length=180, nullable=true)
     */
    private ?string $nftName;

    /**
     * CreatureUser constructor
     */
    public function __construct()
    {
        $this->uuid = uuid::v6();
        $this->isForGame = false;
        $this->isStacked = false;
        $this->bonus = false;
        $this->skinColor = 0;
        $this->createdAt = new \DateTime();
        // levels
        $this->muscles = 0;
        $this->lungs = 0;
        $this->heart = 0;
        $this->belly = 0;
        $this->buttocks = 0;
        // abilities
        $this->speed = 0;
        $this->acceleration = 0;
        $this->boostAcceleration = 0;
        $this->boostVelocity = 0;
        $this->boostTime = 0;
    }

    public function __toString(): string
    {
        return $this->getCreature()->getType();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int|null
     */
    public function getContract(): ?int
    {
        return $this->contract;
    }

    /**
     * @param int $contract
     */
    public function setContract(int $contract): void
    {
        $this->contract = $contract;
    }

    /**
     * @return Creature
     */
    public function getCreature()
    {
        return $this->creature;
    }

    /**
     * @param mixed $creature
     */
    public function setCreature($creature): void
    {
        $this->creature = $creature;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getMuscles(): int
    {
        return $this->muscles;
    }

    /**
     * @param int $muscles
     */
    public function setMuscles(int $muscles): void
    {
        $this->muscles = $muscles;
    }

    /**
     * @return int
     */
    public function getLungs(): int
    {
        return $this->lungs;
    }

    /**
     * @param int $lungs
     */
    public function setLungs(int $lungs): void
    {
        $this->lungs = $lungs;
    }

    /**
     * @return int
     */
    public function getHeart(): int
    {
        return $this->heart;
    }

    /**
     * @param int $heart
     */
    public function setHeart(int $heart): void
    {
        $this->heart = $heart;
    }

    /**
     * @return int
     */
    public function getBelly(): int
    {
        return $this->belly;
    }

    /**
     * @param int $belly
     */
    public function setBelly(int $belly): void
    {
        $this->belly = $belly;
    }

    /**
     * @return int
     */
    public function getButtocks(): int
    {
        return $this->buttocks;
    }

    /**
     * @param int $buttocks
     */
    public function setButtocks(int $buttocks): void
    {
        $this->buttocks = $buttocks;
    }

    /**
     * @return float|null
     */
    public function getSpeed(): ?float
    {
        return $this->speed;
    }

    /**
     * @param float $speed
     */
    public function setSpeed(float $speed): void
    {
        $this->speed = $speed;
    }

    /**
     * @return float|null
     */
    public function getAcceleration(): ?float
    {
        return $this->acceleration;
    }

    /**
     * @param float $acceleration
     */
    public function setAcceleration(float $acceleration): void
    {
        $this->acceleration = $acceleration;
    }

    /**
     * @return float|null
     */
    public function getBoostTime(): ?float
    {
        return $this->boostTime;
    }

    /**
     * @param float $boostTime
     */
    public function setBoostTime(float $boostTime): void
    {
        $this->boostTime = $boostTime;
    }

    /**
     * @return float|null
     */
    public function getBoostVelocity(): ?float
    {
        return $this->boostVelocity;
    }

    /**
     * @param float $boostVelocity
     */
    public function setBoostVelocity(float $boostVelocity): void
    {
        $this->boostVelocity = $boostVelocity;
    }

    /**
     * @return float|null
     */
    public function getBoostAcceleration(): ?float
    {
        return $this->boostAcceleration;
    }

    /**
     * @param float $boostAcceleration
     */
    public function setBoostAcceleration(float $boostAcceleration): void
    {
        $this->boostAcceleration = $boostAcceleration;
    }

    /**
     * @return bool
     */
    public function isForGame(): bool
    {
        return $this->isForGame;
    }

    /**
     * @param bool $isForGame
     */
    public function setIsForGame(bool $isForGame): void
    {
        $this->isForGame = $isForGame;
    }

    /**
     * @return bool
     */
    public function hasBonus(): bool
    {
        return $this->bonus;
    }

    /**
     * @param bool $bonus
     */
    public function setBonus(bool $bonus): void
    {
        $this->hasBonus = $bonus;
    }

    /**
     * @return UuidV6
     */
    public function getUuid(): UuidV6
    {
        return $this->uuid;
    }

    /**
     * @param UuidV6 $uuid
     */
    public function setUuid(UuidV6 $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpgradeMusclesEnd(): ?\DateTime
    {
        return $this->upgradeMusclesEnd;
    }

    /**
     * @param $format
     *
     * @return string|null
     */
    public function getUpgradeMusclesEndFormat($format): ?string
    {
        if (!empty($this->upgradeMusclesEnd)) {
            return $this->upgradeMusclesEnd->format($format);
        }

        return null;
    }

    /**
     * @param \DateTime|null $upgradeMusclesEnd
     */
    public function setUpgradeMusclesEnd(?\DateTime $upgradeMusclesEnd): void
    {
        $this->upgradeMusclesEnd = $upgradeMusclesEnd;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpgradeLungsEnd(): ?\DateTime
    {
        return $this->upgradeLungsEnd;
    }

    /**
     * @param $format
     *
     * @return string|null
     */
    public function getUpgradeLungsEndFormat($format): ?string
    {
        if (!empty($this->upgradeLungsEnd)) {
            return $this->upgradeLungsEnd->format($format);
        }

        return null;
    }

    /**
     * @param \DateTime|null $upgradeLungsEnd
     */
    public function setUpgradeLungsEnd(?\DateTime $upgradeLungsEnd): void
    {
        $this->upgradeLungsEnd = $upgradeLungsEnd;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpgradeHeartEnd(): ?\DateTime
    {
        return $this->upgradeHeartEnd;
    }

    /**
     * @param $format
     *
     * @return string|null
     */
    public function getUpgradeHeartEndFormat($format): ?string
    {
        if (!empty($this->upgradeHeartEnd)) {
            return $this->upgradeHeartEnd->format($format);
        }

        return null;
    }

    /**
     * @param \DateTime|null $upgradeHeartEnd
     */
    public function setUpgradeHeartEnd(?\DateTime $upgradeHeartEnd): void
    {
        $this->upgradeHeartEnd = $upgradeHeartEnd;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpgradeBellyEnd(): ?\DateTime
    {
        return $this->upgradeBellyEnd;
    }

    /**
     * @param $format
     *
     * @return string|null
     */
    public function getUpgradeBellyEndFormat($format): ?string
    {
        if (!empty($this->upgradeBellyEnd)) {
            return $this->upgradeBellyEnd->format($format);
        }

        return null;
    }

    /**
     * @param \DateTime|null $upgradeBellyEnd
     */
    public function setUpgradeBellyEnd(?\DateTime $upgradeBellyEnd): void
    {
        $this->upgradeBellyEnd = $upgradeBellyEnd;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpgradeButtocksEnd(): ?\DateTime
    {
        return $this->upgradeButtocksEnd;
    }

    /**
     * @param $format
     *
     * @return string|null
     */
    public function getUpgradeButtocksEndFormat($format): ?string
    {
        if (!empty($this->upgradeButtocksEnd)) {
            return $this->upgradeButtocksEnd->format($format);
        }

        return null;
    }

    /**
     * @param \DateTime|null $upgradeButtocksEnd
     */
    public function setUpgradeButtocksEnd(?\DateTime $upgradeButtocksEnd): void
    {
        $this->upgradeButtocksEnd = $upgradeButtocksEnd;
    }

    /**
     * @return int
     */
    public function getSkinColor(): int
    {
        return $this->skinColor;
    }

    /**
     * @param int $skinColor
     */
    public function setSkinColor(int $skinColor): void
    {
        $this->skinColor = $skinColor;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return bool
     */
    public function isStacked(): bool
    {
        return $this->isStacked;
    }

    /**
     * @param bool $isStacked
     */
    public function setIsStacked(bool $isStacked): void
    {
        $this->isStacked = $isStacked;
    }

    /**
     * @return \DateTime|null
     */
    public function getNftExpiryDate(): ?\DateTime
    {
        return $this->nftExpiryDate;
    }

    /**
     * @param \DateTime|null $nftExpiryDate
     */
    public function setNftExpiryDate(?\DateTime $nftExpiryDate): void
    {
        $this->nftExpiryDate = $nftExpiryDate;
    }

    /**
     * @param $format
     *
     * @return string|null
     */
    public function getNftExpiryDateFormat($format): ?string
    {
        if (!empty($this->nftExpiryDate)) {
            return $this->nftExpiryDate->format($format);
        }

        return null;
    }

    /**
     * @return float|null
     */
    public function getRewardPool(): ?float
    {
        return $this->rewardPool;
    }

    /**
     * @param float $rewardPool
     */
    public function setRewardPool(float $rewardPool): void
    {
        $this->rewardPool = $rewardPool;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return int|null
     */
    public function getRoyalties(): ?int
    {
        return $this->royalties;
    }

    /**
     * @param int $royalties
     */
    public function setRoyalties(int $royalties): void
    {
        $this->royalties = $royalties;
    }

    /**
     * @return string|null
     */
    public function getNftName(): ?string
    {
        return $this->nftName;
    }

    /**
     * @param string $nftName
     */
    public function setNftName(string $nftName): void
    {
        $this->nftName = $nftName;
    }
}
