<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Common\Repository\ContractLogRepository;

/**
 * @ORM\Entity(repositoryClass=ContractLogRepository::class)
 */
class ContractLog
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=70)
     */
    private ?string $id = null;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=42)
     */
    private ?string $wallet = null;

    /**
     * @var int|null
     * @ORM\Column(type="integer")
     */
    private ?int $fee = null;

    /**
     * @var array
     * @ORM\Column(type="json", options={"default": "[]"}))
     */
    private array $postConditions = [];

    /**
     * @var array
     * @ORM\Column(type="json", options={"default": "[]"}))
     */
    private array $events = [];

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $contractName = null;

    /**
     * @var int|null
     * @ORM\Column(type="integer")
     */
    private ?int $contractVersion = null;

    /**
     * @var string|null
     * @ORM\Column(type="string")
     */
    private ?string $contractFunctionName = null;

    /**
     * @var array
     * @ORM\Column(type="json", options={"default": "[]"})
     */
    private array $contractFunctionArgs = [];

    /**
     * @var DateTimeInterface|null
     *
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private ?DateTimeInterface $createdAt;

    public function __construct()
    {
        $this->createdAt = new DateTime();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
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
     */
    public function setWallet(?string $wallet): void
    {
        $this->wallet = $wallet;
    }

    /**
     * @return int|null
     */
    public function getFee(): ?int
    {
        return $this->fee;
    }

    /**
     * @param int|null $fee
     */
    public function setFee(?int $fee): void
    {
        $this->fee = $fee;
    }

    /**
     * @return array|null
     */
    public function getPostConditions(): ?array
    {
        return $this->postConditions;
    }

    /**
     * @param array|null $postConditions
     */
    public function setPostConditions(?array $postConditions): void
    {
        $this->postConditions = $postConditions;
    }

    /**
     * @return array|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * @param array|null $events
     */
    public function setEvents(?array $events): void
    {
        $this->events = $events;
    }

    /**
     * @return string|null
     */
    public function getContractName(): ?string
    {
        return $this->contractName;
    }

    /**
     * @param string|null $contractName
     */
    public function setContractName(?string $contractName): void
    {
        $this->contractName = $contractName;
    }

    /**
     * @return int|null
     */
    public function getContractVersion(): ?int
    {
        return $this->contractVersion;
    }

    /**
     * @param int|null $contractVersion
     */
    public function setContractVersion(?int $contractVersion): void
    {
        $this->contractVersion = $contractVersion;
    }

    /**
     * @return string|null
     */
    public function getContractFunctionName(): ?string
    {
        return $this->contractFunctionName;
    }

    /**
     * @param string|null $contractFunctionName
     */
    public function setContractFunctionName(?string $contractFunctionName): void
    {
        $this->contractFunctionName = $contractFunctionName;
    }

    /**
     * @return array|null
     */
    public function getContractFunctionArgs(): ?array
    {
        return $this->contractFunctionArgs;
    }

    /**
     * @param array|null $contractFunctionArgs
     */
    public function setContractFunctionArgs(?array $contractFunctionArgs): void
    {
        $this->contractFunctionArgs = $contractFunctionArgs;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     */
    public function setCreatedAt(?DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
