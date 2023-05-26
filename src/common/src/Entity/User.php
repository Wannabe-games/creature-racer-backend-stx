<?php

namespace App\Entity;

use App\Entity\Creature\CreatureUser;
use App\Entity\Game\Player;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\UserRepository")
 * @ORM\Table(name="user_accounts")
 *
 * @UniqueEntity(fields="email", message="user.email.already_exist")
 * @UniqueEntity(fields="username", message="user.username.already_exist")
 */
class User implements UserInterface
{
    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private ?int $id;

    /**
     * @var string
     *
     * @ORM\Column(length=180)
     * @Assert\Length(
     *      min = 2,
     *      max = 180,
     * )
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(length=180, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 180,
     * )
     */
    private ?string $nick;

    /**
     * @var string
     *
     * @ORM\Column(length=180, unique=true)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(length=180, unique=true)
     */
    private $emailCanonical;

    /**
     * @ORM\ManyToMany(targetEntity="Group")
     * @ORM\JoinTable(name="user_users_groups",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    private $groups;

    /**
     * Encrypted password. Must be persisted.
     *
     * @var string
     *
     * @ORM\Column()
     */
    private $password;

    /**
     * @var string|null
     */
    private ?string $plainPassword;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private ?DateTime $createdAt;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $updatedAt;

    /**
     * @var null|string
     * @Assert\Length(
     *      min = 2,
     *      max = 99,
     * )
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $firstName;

    /**
     * @var null|string
     * @Assert\Length(
     *      min = 2,
     *      max = 99,
     * )
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $lastName;

    /**
     * @var string
     *
     * @ORM\Column(length=180)
     *
     * @Assert\Email(
     *     message="user.email"
     * )
     * @Assert\NotBlank()
     * @Assert\Length(
     *      max = 180,
     * )
     */
    private $email;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private bool $enabled = false;

    /**
     * The salt to use for hashing.
     *
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $salt;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTime $lastLogin;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    private array $roles = [];

    /**
     * @var string|null
     *
     * @ORM\Column(length=50, nullable=true)
     */
    private ?string $wallet;

    /**
     * @var string|null
     *
     * @ORM\Column(length=130, nullable=true)
     */
    private ?string $publicKey;

    /**
     * @var string|null
     *
     * @ORM\Column(length=150, nullable=true)
     */
    private ?string $signature;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Creature\CreatureUser", mappedBy="user", fetch="EXTRA_LAZY", cascade={"remove"})
     */
    private Collection $creatures;

    /**
     * @var Player
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Game\Player", mappedBy="user", fetch="EXTRA_LAZY", cascade={"remove"})
     */
    private $player;

    /**
     * @var ReferralNft|null
     *
     * @ORM\OneToOne(targetEntity="App\Entity\ReferralNft", mappedBy="owner", fetch="EXTRA_LAZY", cascade={"remove"})
     */
    private $myReferralNft;

    /**
     * @var ReferralNft
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\ReferralNft", inversedBy="users")
     * @ORM\JoinColumn(name="referral_nft_id")
     */
    private $fromReferralNft;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $incrementInvitationHash = null;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Lobby", mappedBy="host", fetch="EXTRA_LAZY", cascade={"remove"})
     */
    private $hostLobbies;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Lobby", mappedBy="opponent", fetch="EXTRA_LAZY", cascade={"remove"})
     */
    private $opponentLobbies;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Game\Lobby", mappedBy="winner", fetch="EXTRA_LAZY", cascade={"remove"})
     */
    private $winnerLobbies;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
        $this->creatures = new ArrayCollection();
        $this->hostLobbies = new ArrayCollection();
        $this->opponentLobbies = new ArrayCollection();
        $this->winnerLobbies = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getFullName() ?: 'anonymous user';
    }

    /**
     * @return string[]
     */
    public static function getRolesChoices(): array
    {
        return [
            'Super Admin' => self::ROLE_SUPER_ADMIN,
            'User' => self::ROLE_USER,
        ];
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
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsernameCanonical(): string
    {
        return $this->usernameCanonical;
    }

    /**
     * @param string $usernameCanonical
     */
    public function setUsernameCanonical(string $usernameCanonical): void
    {
        $this->usernameCanonical = $usernameCanonical;
    }

    /**
     * @return string
     */
    public function getEmailCanonical(): string
    {
        return $this->emailCanonical;
    }

    /**
     * @param string $emailCanonical
     */
    public function setEmailCanonical(string $emailCanonical): void
    {
        $this->emailCanonical = $emailCanonical;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param mixed $groups
     */
    public function setGroups($groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
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
    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime|null $updatedAt
     */
    public function setUpdatedAt(?DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFullName(): ?string
    {
        return trim($this->firstName . ' ' . $this->lastName) ?: $this->getUsername();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }

    /**
     * @return DateTime|null
     */
    public function getLastLogin(): ?DateTime
    {
        return $this->lastLogin;
    }

    /**
     * @param DateTime|null $lastLogin
     */
    public function setLastLogin(?DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        foreach ($this->getGroups() as $group) {
            $roles = array_merge($roles, $group->getRoles());
        }

        // we need to make sure to have at least one role
        $roles[] = static::ROLE_USER;

        return array_unique($roles);
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @return string|null
     */
    public function getWallet(): ?string
    {
        return $this->wallet;
    }

    /**
     * @param string|null $wallet
     * @return void
     */
    public function setWallet(?string $wallet): void
    {
        $this->wallet = $wallet;
    }

    /**
     * @return mixed
     */
    public function getCreatures(): Collection
    {
        return $this->creatures;
    }

    /**
     * @param CreatureUser $creatureUser
     * @return void
     */
    public function addCreature(CreatureUser $creatureUser): void
    {
        if (!$this->creatures->contains($creatureUser)) {
            $this->creatures->add($creatureUser);
            $creatureUser->setUser($this);
        }
    }

    /**
     * @param CreatureUser $creatureUser
     * @return void
     */
    public function removeCreature(CreatureUser $creatureUser): void
    {
        if ($this->creatures->contains($creatureUser)) {
            $this->creatures->removeElement($creatureUser);
            $creatureUser->setUser(null);
        }
    }

    /**
     * @return null|string
     */
    public function getNick(): ?string
    {
        return $this->nick;
    }

    /**
     * @param string $nick
     */
    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }

    /**
     * @return Player|null
     */
    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    /**
     * @param Player $player
     */
    public function setPlayer(Player $player): void
    {
        $this->player = $player;
    }

    /**
     * @return string|null
     */
    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    /**
     * @param string|null $publicKey
     * @return void
     */
    public function setPublicKey(?string $publicKey): void
    {
        $this->publicKey = $publicKey;
    }

    /**
     * @return string|null
     */
    public function getSignature(): ?string
    {
        return $this->signature;
    }

    /**
     * @param string|null $signature
     * @return void
     */
    public function setSignature(?string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return ReferralNft|null
     */
    public function getMyReferralNft(): ?ReferralNft
    {
        return $this->myReferralNft;
    }

    /**
     * @param ReferralNft $myReferralNft
     */
    public function setMyReferralNft(ReferralNft $myReferralNft): void
    {
        $this->myReferralNft = $myReferralNft;
    }

    /**
     * @return ReferralNft|null
     */
    public function getFromReferralNft(): ?ReferralNft
    {
        return $this->fromReferralNft;
    }

    /**
     * @param ReferralNft $fromReferralNft
     */
    public function setFromReferralNft(ReferralNft $fromReferralNft): void
    {
        $this->fromReferralNft = $fromReferralNft;
    }

    /**
     * @return string|null
     */
    public function getIncrementInvitationHash(): ?string
    {
        return $this->incrementInvitationHash;
    }

    /**
     * @param string|null $incrementInvitationHash
     */
    public function setIncrementInvitationHash(?string $incrementInvitationHash): void
    {
        $this->incrementInvitationHash = $incrementInvitationHash;
    }

    /**
     * @return Collection
     */
    public function getHostLobbies(): Collection
    {
        return $this->hostLobbies;
    }

    /**
     * @param Collection $hostLobbies
     */
    public function setHostLobbies(Collection $hostLobbies): void
    {
        $this->hostLobbies = $hostLobbies;
    }

    /**
     * @return Collection
     */
    public function getOpponentLobbies(): Collection
    {
        return $this->opponentLobbies;
    }

    /**
     * @param Collection $opponentLobbies
     */
    public function setOpponentLobbies(Collection $opponentLobbies): void
    {
        $this->opponentLobbies = $opponentLobbies;
    }

    /**
     * @return Collection
     */
    public function getWinnerLobbies(): Collection
    {
        return $this->winnerLobbies;
    }

    /**
     * @param Collection $winnerLobbies
     */
    public function setWinnerLobbies(Collection $winnerLobbies): void
    {
        $this->winnerLobbies = $winnerLobbies;
    }
}
