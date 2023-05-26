<?php

namespace App\Entity\Creature;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Creature\CreatureLevelRepository")
 * @ORM\Table(name="game_crature_level_definitions")
 */
class CreatureLevel
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(length=15)
     *
     * @Assert\NotNull()
     */
    private string $upgradeType;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $level = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $priceGold = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $priceStacks = 0;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private float $priceUSD = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $deliveryWaitingTime = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $deliveryPriceStacks = 0;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Creature\CreatureUpgrade", mappedBy="creatureLevel", cascade={"remove"})
     */
    private $upgradeChanges;

    /**
     * @var Creature
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Creature\Creature", inversedBy="changeLevels")
     * @ORM\JoinColumn(name="creature_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private $creature;

    /**
     * CreatureLevel constructor.
     */
    public function __construct()
    {
        $this->upgradeChanges = new ArrayCollection();
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
    public function getUpgradeType(): string
    {
        return $this->upgradeType;
    }

    /**
     * @param string $upgradeType
     */
    public function setUpgradeType(string $upgradeType): void
    {
        $this->upgradeType = $upgradeType;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getPriceGold(): int
    {
        return $this->priceGold;
    }

    /**
     * @param int $priceGold
     */
    public function setPriceGold(int $priceGold): void
    {
        $this->priceGold = $priceGold;
    }

    /**
     * @return int
     */
    public function getPriceStacks(): int
    {
        return $this->priceStacks;
    }

    /**
     * @param int $priceStacks
     */
    public function setPriceStacks(int $priceStacks): void
    {
        $this->priceStacks = $priceStacks;
    }

    /**
     * @return float
     */
    public function getPriceUSD(): float
    {
        return $this->priceUSD;
    }

    /**
     * @param float $priceUSD
     */
    public function setPriceUSD(float $priceUSD): void
    {
        $this->priceUSD = $priceUSD;
    }

    /**
     * @return int
     */
    public function getDeliveryWaitingTime(): int
    {
        return $this->deliveryWaitingTime;
    }

    /**
     * @param int $deliveryWaitingTime
     */
    public function setDeliveryWaitingTime(int $deliveryWaitingTime): void
    {
        $this->deliveryWaitingTime = $deliveryWaitingTime;
    }

    /**
     * @return int
     */
    public function getDeliveryPriceStacks(): int
    {
        return $this->deliveryPriceStacks;
    }

    /**
     * @param int $deliveryPriceStacks
     */
    public function setDeliveryPriceStacks(int $deliveryPriceStacks): void
    {
        $this->deliveryPriceStacks = $deliveryPriceStacks;
    }

    /**
     * @return ArrayCollection
     */
    public function getUpgradeChanges()
    {
        return $this->upgradeChanges;
    }

    /**
     * @param $upgradeChanges
     */
    public function setUpgradeChanges($upgradeChanges): void
    {
        $this->upgradeChanges = $upgradeChanges;
    }

    /**
     * @param $upgradeChange
     */
    public function addUpgradeChange($upgradeChange): void
    {
        if (!$this->upgradeChanges->contains($upgradeChange)) {
            $this->upgradeChanges->add($upgradeChange);
        }
    }

    /**
     * @return Creature|null
     */
    public function getCreature(): ?Creature
    {
        return $this->creature;
    }

    /**
     * @param Creature $creature
     */
    public function setCreature(Creature $creature): void
    {
        $this->creature = $creature;
    }
}
