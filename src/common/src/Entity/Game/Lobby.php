<?php

namespace App\Entity\Game;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV6;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\Game\LobbyRepository")
 * @ORM\Table(name="game_lobby")
 */
class Lobby
{
    public const STATUS_CREATED = 'created'; // bet utworzony
    public const STATUS_APPROVAL = 'approval'; // host wplacil kase
    public const STATUS_REJECTED = 'rejected'; // host nie wplacil kasy
    public const STATUS_ACTIVE = 'active'; // host rozegral
    public const STATUS_WAITING = 'waiting'; // oponent wplacil i oczekuje na rozgrywke
    public const STATUS_EXPIRED = 'expired'; // czas minal a opponent nie dolaczyl lub nie rozegral
    public const STATUS_COMPLETED = 'completed'; // opponent rozegral
    public const STATUS_DECIDED = 'decided'; // rozstrzygnieto wynik
    public const STATUS_FINISH = 'finish'; // wyplacono nagrode

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
     * @var string|null
     *
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    protected ?string $hostPaymentId = null;

    /**
     * @var UuidV6|null
     *
     * @ORM\Column(type="uuid", nullable=true)
     */
    protected ?UuidV6 $hostRaceId = null;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="opponentLobbies")
     * @ORM\JoinColumn(name="opponent_id", nullable=true)
     */
    private ?User $opponent = null;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=32, nullable=true))
     */
    protected ?string $opponentPaymentId = null;

    /**
     * @var UuidV6|null
     *
     * @ORM\Column(type="uuid", nullable=true)
     */
    protected ?UuidV6 $opponentRaceId = null;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="winnerLobbies")
     * @ORM\JoinColumn(name="winner_id", nullable=true)
     */
    private ?User $winner = null;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=32, nullable=true))
     */
    protected ?string $winnerWithdrawId = null;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", nullable=false, options={"default": 0})
     *
     * @Assert\NotNull()
     */
    private int $betAmount = 1000000;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $timeleft = null;

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
        $this->timeleft = new DateTime('+1 days');
        $this->createdAt = new DateTime();
    }

    public function __toString(): string
    {
        return $this->getUuid();
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
     * @return string|null
     */
    public function getHostPaymentId(): ?string
    {
        return $this->hostPaymentId;
    }

    /**
     * @param string|null $hostPaymentId
     */
    public function setHostPaymentId(?string $hostPaymentId): void
    {
        $this->hostPaymentId = $hostPaymentId;
        $this->setTimeleft(new DateTime('+7 days'));
    }

    /**
     * @return UuidV6|null
     */
    public function getHostRaceId(): ?UuidV6
    {
        return $this->hostRaceId;
    }

    /**
     * @param UuidV6|null $hostRaceId
     */
    public function setHostRaceId(?UuidV6 $hostRaceId): void
    {
        $this->hostRaceId = $hostRaceId;
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
     * @return string|null
     */
    public function getOpponentPaymentId(): ?string
    {
        return $this->opponentPaymentId;
    }

    /**
     * @param string|null $opponentPaymentId
     */
    public function setOpponentPaymentId(?string $opponentPaymentId): void
    {
        $this->opponentPaymentId = $opponentPaymentId;
    }

    /**
     * @return UuidV6|null
     */
    public function getOpponentRaceId(): ?UuidV6
    {
        return $this->opponentRaceId;
    }

    /**
     * @param UuidV6|null $opponentRaceId
     */
    public function setOpponentRaceId(?UuidV6 $opponentRaceId): void
    {
        $this->opponentRaceId = $opponentRaceId;
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
        $this->setTimeleft(null);
    }

    /**
     * @return string|null
     */
    public function getWinnerWithdrawId(): ?string
    {
        return $this->winnerWithdrawId;
    }

    /**
     * @param string|null $winnerWithdrawId
     */
    public function setWinnerWithdrawId(?string $winnerWithdrawId): void
    {
        $this->winnerWithdrawId = $winnerWithdrawId;
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
     * @return DateTime|null
     */
    public function getTimeleft(): ?DateTime
    {
        return $this->timeleft;
    }

    /**
     * @param DateTime|null $timeleft
     * @return void
     */
    public function setTimeleft(?DateTime $timeleft): void
    {
        $this->timeleft = $timeleft;
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
     * @return string
     */
    public function getStatus(): string
    {
        if (null !== $this->getWinnerWithdrawId()) {
            return self::STATUS_FINISH;
        }

        if (null !== $this->getWinner()) {
            return self::STATUS_DECIDED;
        }

        if (null !== $this->getOpponentRaceId()) {
            return self::STATUS_COMPLETED;
        }

        if (null !== $this->getOpponentPaymentId()) {
            return self::STATUS_WAITING;
        }

        if ($this->getTimeleft() < new DateTime()) {
            return self::STATUS_EXPIRED;
        }

        if (null !== $this->getHostRaceId()) {
            return self::STATUS_ACTIVE;
        }

        if ($this->getTimeleft() < new DateTime()) {
            return self::STATUS_REJECTED;
        }

        if (null !== $this->getHostPaymentId()) {
            return self::STATUS_APPROVAL;
        }

        return self::STATUS_CREATED;
    }
}
