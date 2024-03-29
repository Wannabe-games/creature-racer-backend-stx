<?php

namespace App\Document;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;

/**
 * Class InviteeReferralPool
 *
 * @ODM\Document()
 */
class InviteeReferralPool
{
    /**
     * @ODM\Id
     */
    protected ?string $id = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $userWallet = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $sumPool = null;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected DateTimeInterface $timestamp;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable();
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getUserWallet(): ?string
    {
        return $this->userWallet;
    }

    /**
     * @param string|null $userWallet
     */
    public function setUserWallet(?string $userWallet): void
    {
        $this->userWallet = $userWallet;
    }

    /**
     * @return string|null
     */
    public function getSumPool(): ?string
    {
        return $this->sumPool;
    }

    /**
     * @param string|null $sumPool
     */
    public function setSumPool(?string $sumPool): void
    {
        $this->sumPool = $sumPool;
    }

    /**
     * @return DateTimeInterface
     */
    public function getTimestamp(): DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface $timestamp
     */
    public function setTimestamp(DateTimeInterface $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}
