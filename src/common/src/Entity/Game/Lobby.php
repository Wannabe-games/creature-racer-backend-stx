<?php

namespace App\Entity\Game;

use App\Entity\User;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    public const STATUS_CREATED = 'created';     // bet utworzony
    public const STATUS_APPROVAL = 'approval';   // host wplacil kase
    public const STATUS_REJECTED = 'rejected';   // host nie wplacil kasy
    public const STATUS_ACTIVE = 'active';       // host rozegral
    public const STATUS_WAITING = 'waiting';     // oponent wplacil i oczekuje na rozgrywke
    public const STATUS_EXPIRED = 'expired';     // czas minal a opponent nie dolaczyl lub nie rozegral
    public const STATUS_COMPLETED = 'completed'; // opponent rozegral
    public const STATUS_DECIDED = 'decided';     // rozstrzygnieto wynik
    public const STATUS_FINISH = 'finish';       // wyplacono nagrode

    /**
     * @var UuidV6
     *
     * @ORM\Id
     * @ORM\Column(type="uuid")
     */
    private UuidV6 $id;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="hostLobbies")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotNull()
     */
    private User $host;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private ?string $hostPaymentId = null;

    /**
     * User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="opponentLobbies")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?User $opponent = null;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=32, nullable=true))
     */
    private ?string $opponentPaymentId = null;

    /**
     * @var User|null
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="winnerLobbies")
     * @ORM\JoinColumn(nullable=true)
     */
    private ?User $winner = null;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=32, nullable=true))
     */
    private ?string $winnerWithdrawId = null;

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
    private ?DateTime $createdAt;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Race", mappedBy="lobby")
     */
    private Collection $races;

    /**
     * CreatureLevel constructor.
     */
    public function __construct()
    {
        $this->id = uuid::v6();
        $this->races = new ArrayCollection();
        $this->createdAt = new DateTime();
        $this->timeleft = new DateTime('+1 days');
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
        $this->setTimeleft(new DateTime('+1 days'));
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
     * @return Collection|Race[]
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    /**
     * @return Race|null
     */
    public function getHostRace(): ?Race
    {
        foreach ($this->getRaces() as $race) {
            if ($race->getCreatureUser()->getUser() === $this->getHost()) {
                return $race;
            }
        }

        return null;
    }

    /**
     * @return Race|null
     */
    public function getOpponentRace(): ?Race
    {
        foreach ($this->getRaces() as $race) {
            if ($race->getCreatureUser()->getUser() === $this->getOpponent()) {
                return $race;
            }
        }

        return null;
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

        if (null !== $this->getOpponentRace()) {
            return self::STATUS_COMPLETED;
        }

        if (null !== $this->getOpponentPaymentId()) {
            return self::STATUS_WAITING;
        }

        if ($this->getTimeleft() < new DateTime()) {
            return self::STATUS_EXPIRED;
        }

        if (null !== $this->getHostRace()) {
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
