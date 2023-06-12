<?php

namespace App\Entity\Game;

use App\Entity\Creature\CreatureUser;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Uid\UuidV6;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Game\RaceRepository")
 * @ORM\Table(
 *      name="game_race",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(columns={"lobby_id", "creature_user_id"}),
 *      }
 * )
 * @UniqueEntity(fields={"lobby", "creatureUser"}, message="The race associated with such a lobby already exists")
 */
class Race
{
    /**
     * @var UuidV6
     *
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private UuidV6 $id;

    /**
     * @var CreatureUser
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Creature\CreatureUser", inversedBy="races")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotNull()
     */
    private CreatureUser $creatureUser;

    /**
     * @var Lobby|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Game\Lobby", inversedBy="races")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?Lobby $lobby;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private ?int $score = null;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private ?DateTime $createdAt;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $finishedAt = null;

    /**
     * CreatureLevel constructor.
     */
    public function __construct()
    {
        $this->id = uuid::v6();
        $this->createdAt = new DateTime();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getId();
    }

    /**
     * @return UuidV6
     */
    public function getId(): UuidV6
    {
        return $this->id;
    }

    /**
     * @return CreatureUser
     */
    public function getCreatureUser(): CreatureUser
    {
        return $this->creatureUser;
    }

    /**
     * @param CreatureUser $creatureUser
     * @return void
     */
    public function setCreatureUser(CreatureUser $creatureUser): void
    {
        $this->creatureUser = $creatureUser;
    }

    /**
     * @return Lobby|null
     */
    public function getLobby(): ?Lobby
    {
        return $this->lobby;
    }

    /**
     * @param Lobby|null $lobby
     * @return void
     */
    public function setLobby(?Lobby $lobby): void
    {
        $this->lobby = $lobby;
    }

    /**
     * @return int|null
     */
    public function getScore(): ?int
    {
        return $this->score;
    }

    /**
     * @param int|null $score
     * @return void
     */
    public function setScore(?int $score): void
    {
        $this->score = $score;
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
     * @return void
     */
    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return DateTime|null
     */
    public function getFinishedAt(): ?DateTime
    {
        return $this->finishedAt;
    }

    /**
     * @param DateTime|null $finishedAt
     * @return void
     */
    public function setFinishedAt(?DateTime $finishedAt): void
    {
        $this->finishedAt = $finishedAt;
    }
}
