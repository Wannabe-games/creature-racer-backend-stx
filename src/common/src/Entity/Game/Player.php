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
    private ?int $id;

    /**
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private int $gold = 0;

    /**
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private int $stacks = 0;

    /**
     * @ORM\Column(type="integer", options={"default": 10})
     */
    private int $energy = 10;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $restoreStartTime;

    /**
     * @ORM\Column(type="array")
     */
    private array $additionalData = [];

    /**
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private int $experience = 0;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="player")
     * @ORM\JoinColumn(name="user_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private User $user;

    /**
     * @ORM\Column(length=20, nullable=true)
     */
    private ?string $activeAnimalCreatureType;

    /**
     * @ORM\Column(type="integer", options={"default": 0})
     */
    private int $maxScore = 0;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getGold(): int
    {
        return $this->gold;
    }

    /**
     * @param int $gold
     */
    public function setGold(int $gold): void
    {
        $this->gold = $gold;
    }

    /**
     * @param int $gold
     */
    public function addGold(int $gold): void
    {
        $this->gold += $gold;
        $this->setMaxScore($gold);
    }

    /**
     * @return int
     */
    public function getStacks(): int
    {
        return $this->stacks;
    }

    /**
     * @param int $stacks
     */
    public function setStacks(int $stacks): void
    {
        $this->stacks = $stacks;
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

    /**
     * @return int|null
     */
    public function getMaxScore(): ?int
    {
        return $this->maxScore;
    }

    /**
     * @param int $maxScore
     */
    public function setMaxScore(int $maxScore): void
    {
        if ($this->maxScore < $maxScore) {
            $this->maxScore = $maxScore;
        }
    }
}
