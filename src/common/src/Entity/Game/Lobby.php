<?php

namespace App\Entity\Game;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Uid\UuidV6;
use Symfony\Component\Uid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Game\LobbyRepository")
 * @ORM\Table(name="game_lobby")
 */
class Lobby
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id;

    /**
     * @var UuidV6
     *
     * @ORM\Column(type="uuid", unique=true)
     */
    protected UuidV6 $uuid;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="hostLobbies")
     * @ORM\JoinColumn(name="host_id", nullable=false)
     *
     * @Assert\NotNull()
     */
    private User $host;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="opponentLobbies")
     * @ORM\JoinColumn(name="opponent_id", nullable=true)
     */
    private ?User $opponent = null;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="winnerLobbies")
     * @ORM\JoinColumn(name="winner_id", nullable=true)
     */
    private ?User $winner = null;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $betAmount = 1000000;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private DateTime $timeleft;

    /**
     * @var string
     *
     * @ORM\Column(length=15)
     *
     * @Assert\NotNull()
     */
    private string $status = 'created';

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    protected ?DateTime $createdAt;

    /**
     * CreatureLevel constructor.
     */
    public function __construct()
    {
        $this->uuid = uuid::v6();
        $this->createdAt = new DateTime();
        $this->timeleft = new DateTime('+7 days');
    }

    public function __toString(): string
    {
        return $this->getStatus();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return User
     */
    public function getHost(): User
    {
        return $this->host;
    }

    /**
     * @param User $host
     */
    public function setHost(User $host): void
    {
        $this->host = $host;
    }

    /**
     * @return User|null
     */
    public function getOpponent(): ?User
    {
        return $this->opponent;
    }

    /**
     * @param User|null $opponent
     */
    public function setOpponent(?User $opponent): void
    {
        $this->opponent = $opponent;
    }

    /**
     * @return User|null
     */
    public function getWinner(): ?User
    {
        return $this->winner;
    }

    /**
     * @param User|null $winner
     */
    public function setWinner(?User $winner): void
    {
        $this->winner = $winner;
    }

    /**
     * @return int
     */
    public function getBetAmount(): int
    {
        return $this->betAmount;
    }

    /**
     * @param int $betAmount
     */
    public function setBetAmount(int $betAmount): void
    {
        $this->betAmount = $betAmount;
    }

    /**
     * @return DateTime
     */
    public function getTimeleft(): DateTime
    {
        return $this->timeleft;
    }

    /**
     * @param DateTime $timeleft
     */
    public function setTimeleft(DateTime $timeleft): void
    {
        $this->timeleft = $timeleft;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
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
}
