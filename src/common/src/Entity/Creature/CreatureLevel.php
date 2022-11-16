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
    private mixed $id;

    /**
     * @var string
     *
     * @ORM\Column(length=15)
     *
     * @Assert\NotNull()
     */
    private string $creatureType;

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
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $level;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $priceSoftCurrency;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $priceHardCurrency;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $waitingTime;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false)
     *
     * @Assert\NotNull()
     */
    private int $deliveryDiamonds;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Creature\CreatureUpgrade", mappedBy="creatureLevel")
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatureType(): string
    {
        return $this->creatureType;
    }

    /**
     * @param string $creatureType
     */
    public function setCreatureType(string $creatureType): void
    {
        $this->creatureType = $creatureType;
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
    public function getPriceSoftCurrency(): int
    {
        return $this->priceSoftCurrency;
    }

    /**
     * @param int $priceSoftCurrency
     */
    public function setPriceSoftCurrency(int $priceSoftCurrency): void
    {
        $this->priceSoftCurrency = $priceSoftCurrency;
    }

    /**
     * @return int
     */
    public function getPriceHardCurrency(): int
    {
        return $this->priceHardCurrency;
    }

    /**
     * @param int $priceHardCurrency
     */
    public function setPriceHardCurrency(int $priceHardCurrency): void
    {
        $this->priceHardCurrency = $priceHardCurrency;
    }

    /**
     * @return int
     */
    public function getWaitingTime(): int
    {
        return $this->waitingTime;
    }

    /**
     * @param int $waitingTime
     */
    public function setWaitingTime(int $waitingTime): void
    {
        $this->waitingTime = $waitingTime;
    }

    /**
     * @return int
     */
    public function getDeliveryDiamonds(): int
    {
        return $this->deliveryDiamonds;
    }

    /**
     * @param int $deliveryDiamonds
     */
    public function setDeliveryDiamonds(int $deliveryDiamonds): void
    {
        $this->deliveryDiamonds = $deliveryDiamonds;
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
