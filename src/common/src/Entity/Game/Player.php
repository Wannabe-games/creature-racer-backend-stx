<?php
namespace App\Entity\Game;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Game\PlayerRepository")
 * @ORM\Table(name="game_player")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $softCurrency;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $hardCurrency;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $energy;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $restoreStartTime;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private $additionalData;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="palyer")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(length=20, nullable=true)
     */
    private $activeAnimalCreatureType;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->softCurrency = 0;
        $this->hardCurrency = 0;
        $this->energy = 10;
        $this->experience = 0;
        $this->additionalData = [];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getSoftCurrency(): int
    {
        return $this->softCurrency;
    }

    /**
     * @param int $softCurrency
     */
    public function setSoftCurrency(int $softCurrency): void
    {
        $this->softCurrency = $softCurrency;
    }

    /**
     * @param int $softCurrency
     */
    public function addSoftCurrency(int $softCurrency): void
    {
        $this->softCurrency += $softCurrency;
    }

    /**
     * @return int
     */
    public function getHardCurrency(): int
    {
        return $this->hardCurrency;
    }

    /**
     * @param int $hardCurrency
     */
    public function setHardCurrency(int $hardCurrency): void
    {
        $this->hardCurrency = $hardCurrency;
    }

    /**
     * @return int
     */
    public function getEnergy(): int
    {
        return $this->energy;
    }

    /**
     * @param int $energy
     */
    public function setEnergy(int $energy): void
    {
        $this->energy = $energy;
    }

    /**
     * @return DateTime|null
     */
    public function getRestoreStartTime(): ?DateTime
    {
        return $this->restoreStartTime;
    }

    /**
     * @param DateTime|null $restoreStartTime
     */
    public function setRestoreStartTime(?DateTime $restoreStartTime): void
    {
        $this->restoreStartTime = $restoreStartTime;
    }

    /**
     * @return array
     */
    public function getAdditionalData(): array
    {
        return $this->additionalData;
    }

    /**
     * @param array $additionalData
     */
    public function setAdditionalData(array $additionalData): void
    {
        $this->additionalData = $additionalData;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int|null
     */
    public function getExperience(): ?int
    {
        return $this->experience;
    }

    /**
     * @param int $experience
     */
    public function setExperience(int $experience): void
    {
        $this->experience = $experience;
    }

    /**
     * @return string|null
     */
    public function getActiveAnimalCreatureType(): ?string
    {
        return $this->activeAnimalCreatureType;
    }

    /**
     * @param string $activeAnimalCreatureType
     */
    public function setActiveAnimalCreatureType(string $activeAnimalCreatureType): void
    {
        $this->activeAnimalCreatureType = $activeAnimalCreatureType;
    }
}
