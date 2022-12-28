<?php

namespace App\Entity\Creature;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Creature\CreatureRepository")
 * @ORM\Table(name="game_crature_definitions")
 */
class Creature
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private mixed $id;

    /**
     * @var string
     *
     * @ORM\Column(length=180, unique=true)
     *
     * @Assert\NotNull()
     */
    private string $name;

    /**
     * @var string
     *
     * @ORM\Column(length=15, unique=true)
     *
     * @Assert\NotNull()
     */
    private string $type;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $tier;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default"=0})
     *
     * @Assert\NotNull()
     */
    private int $cohort;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $musclesMax;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $lungsMax;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $heartMax;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $bellyMax;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $buttocksMax;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $speedMax;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $accelerationMax;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $boostTimeMax;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $boostVelocityMax;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $boostAccelerationMax;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $speedMin;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $accelerationMin;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $boostTimeMin;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $boostVelocityMin;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private float $boostAccelerationMin;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Creature\CreatureLevel", mappedBy="creature")
     */
    private $changeLevels;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", options={"default"="CURRENT_TIMESTAMP"})
     */
    protected $createdAt;

    /**
     * CreatureLevel constructor.
     */
    public function __construct()
    {
        $this->changeLevels = new ArrayCollection();
        $this->createdAt = new DateTime();
    }

    public function __toString(): string
    {
        return $this->getType();
    }

    /**
     * @return mixed
     */
    public function getId()
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getTier(): int
    {
        return $this->tier;
    }

    /**
     * @param int $tier
     */
    public function setTier(int $tier): void
    {
        $this->tier = $tier;
    }

    /**
     * @return int
     */
    public function getMusclesMax(): int
    {
        return $this->musclesMax;
    }

    /**
     * @param int $musclesMax
     */
    public function setMusclesMax(int $musclesMax): void
    {
        $this->musclesMax = $musclesMax;
    }

    /**
     * @return int
     */
    public function getLungsMax(): int
    {
        return $this->lungsMax;
    }

    /**
     * @param int $lungsMax
     */
    public function setLungsMax(int $lungsMax): void
    {
        $this->lungsMax = $lungsMax;
    }

    /**
     * @return int
     */
    public function getHeartMax(): int
    {
        return $this->heartMax;
    }

    /**
     * @param int $heartMax
     */
    public function setHeartMax(int $heartMax): void
    {
        $this->heartMax = $heartMax;
    }

    /**
     * @return int
     */
    public function getBellyMax(): int
    {
        return $this->bellyMax;
    }

    /**
     * @param int $bellyMax
     */
    public function setBellyMax(int $bellyMax): void
    {
        $this->bellyMax = $bellyMax;
    }

    /**
     * @return int
     */
    public function getButtocksMax(): int
    {
        return $this->buttocksMax;
    }

    /**
     * @param int $buttocksMax
     */
    public function setButtocksMax(int $buttocksMax): void
    {
        $this->buttocksMax = $buttocksMax;
    }

    /**
     * @return float
     */
    public function getSpeedMax(): float
    {
        return $this->speedMax;
    }

    /**
     * @param float $speedMax
     */
    public function setSpeedMax(float $speedMax): void
    {
        $this->speedMax = $speedMax;
    }

    /**
     * @return float
     */
    public function getAccelerationMax(): float
    {
        return $this->accelerationMax;
    }

    /**
     * @param float $accelerationMax
     */
    public function setAccelerationMax(float $accelerationMax): void
    {
        $this->accelerationMax = $accelerationMax;
    }

    /**
     * @return float
     */
    public function getBoostTimeMax(): float
    {
        return $this->boostTimeMax;
    }

    /**
     * @param float $boostTimeMax
     */
    public function setBoostTimeMax(float $boostTimeMax): void
    {
        $this->boostTimeMax = $boostTimeMax;
    }

    /**
     * @return float
     */
    public function getBoostVelocityMax(): float
    {
        return $this->boostVelocityMax;
    }

    /**
     * @param float $boostVelocityMax
     */
    public function setBoostVelocityMax(float $boostVelocityMax): void
    {
        $this->boostVelocityMax = $boostVelocityMax;
    }

    /**
     * @return float
     */
    public function getBoostAccelerationMax(): float
    {
        return $this->boostAccelerationMax;
    }

    /**
     * @param float $boostAccelerationMax
     */
    public function setBoostAccelerationMax(float $boostAccelerationMax): void
    {
        $this->boostAccelerationMax = $boostAccelerationMax;
    }

    /**
     * @return ArrayCollection
     */
    public function getChangeLevels()
    {
        return $this->changeLevels;
    }

    /**
     * @param $changeLevels
     */
    public function setChangeLevels($changeLevels): void
    {
        $this->changeLevels = $changeLevels;
    }

    /**
     * @param CreatureLevel $changeLevel
     */
    public function addChangeLevel(CreatureLevel $changeLevel): void
    {
        if (!$this->changeLevels->contains($changeLevel)) {
            $this->changeLevels->add($changeLevel);
        }
    }

    /**
     * @param CreatureLevel $changeLevel
     */
    public function removeChangeLevel(CreatureLevel $changeLevel): void
    {
        if ($this->changeLevels->contains($changeLevel)) {
            $this->changeLevels->removeElement($changeLevel);
        }
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return int|null
     */
    public function getCohort(): ?int
    {
        return $this->cohort;
    }

    /**
     * @param int $cohort
     */
    public function setCohort(int $cohort): void
    {
        $this->cohort = $cohort;
    }

    /**
     * @return float
     */
    public function getSpeedMin(): float
    {
        return $this->speedMin;
    }

    /**
     * @param float $speedMin
     */
    public function setSpeedMin(float $speedMin): void
    {
        $this->speedMin = $speedMin;
    }

    /**
     * @return float
     */
    public function getAccelerationMin(): float
    {
        return $this->accelerationMin;
    }

    /**
     * @param float $accelerationMin
     */
    public function setAccelerationMin(float $accelerationMin): void
    {
        $this->accelerationMin = $accelerationMin;
    }

    /**
     * @return float
     */
    public function getBoostTimeMin(): float
    {
        return $this->boostTimeMin;
    }

    /**
     * @param float $boostTimeMin
     */
    public function setBoostTimeMin(float $boostTimeMin): void
    {
        $this->boostTimeMin = $boostTimeMin;
    }

    /**
     * @return float
     */
    public function getBoostVelocityMin(): float
    {
        return $this->boostVelocityMin;
    }

    /**
     * @param float $boostVelocityMin
     */
    public function setBoostVelocityMin(float $boostVelocityMin): void
    {
        $this->boostVelocityMin = $boostVelocityMin;
    }

    /**
     * @return float
     */
    public function getBoostAccelerationMin(): float
    {
        return $this->boostAccelerationMin;
    }

    /**
     * @param float $boostAccelerationMin
     */
    public function setBoostAccelerationMin(float $boostAccelerationMin): void
    {
        $this->boostAccelerationMin = $boostAccelerationMin;
    }
}
