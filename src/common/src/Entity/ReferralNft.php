<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Common\Repository\ReferralNftRepository")
 * @ORM\Table(name="user_referral_nft")
 */
class ReferralNft
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
     * @ORM\Column(length=150, unique=true, nullable=false)
     */
    private string $refCode;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $hash = null;

    /**
     * @var string|null
     *
     * @ORM\Column(nullable=true)
     */
    private ?string $rNftId = null;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", options={"default": false})
     */
    private bool $special = false;

    /**
     * @var string|null
     *
     * @ORM\Column(length=70, nullable=true)
     */
    private ?string $orderId = null;

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="myReferralNft", fetch="EXTRA_LAZY")
     */
    private $owner;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="fromReferralNft", fetch="EXTRA_LAZY")
     */
    private $users;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected ?DateTime $nftExpiryDate;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getRefCode(): ?string
    {
        return $this->refCode;
    }

    /**
     * @param string $refCode
     */
    public function setRefCode(string $refCode): void
    {
        $this->refCode = $refCode;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }

    /**
     * @return int|null
     */
    public function getRNftId(): ?int
    {
        return $this->rNftId;
    }

    /**
     * @param int $rNftId
     */
    public function setRNftId(int $rNftId): void
    {
        $this->rNftId = $rNftId;
    }

    /**
     * @return bool
     */
    public function isSpecial(): bool
    {
        return $this->special;
    }

    /**
     * @param bool $special
     */
    public function setSpecial(bool $special): void
    {
        $this->special = $special;
    }

    /**
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param string|null $orderId
     * @return void
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return User
     */
    public function getOwner(): User
    {
        return $this->owner;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * @param $users
     */
    public function setUsers($users): void
    {
        $this->users = $users;
    }

    /**
     * @return DateTime|null
     */
    public function getNftExpiryDate(): ?DateTime
    {
        return $this->nftExpiryDate;
    }

    /**
     * @param DateTime|null $nftExpiryDate
     */
    public function setNftExpiryDate(?DateTime $nftExpiryDate): void
    {
        $this->nftExpiryDate = $nftExpiryDate;
    }
}
