<?php

namespace App\Document;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;

/**
 * Class UserPool
 *
 * @ODM\Document()
 */
class UserShare
{
    /**
     * @ODM\Id
     */
    protected ?string $id = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $share = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $hash = null;

    /**
     * @var integer|null
     *
     * @ODM\Field(type="int")
     */
    private ?int $user = null;

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
    public function getShare(): ?string
    {
        return $this->share;
    }

    /**
     * @param string|null $share
     */
    public function setShare(?string $share): void
    {
        $this->share = $share;
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

    /**
     * @return int
     */
    public function getUser(): int
    {
        return $this->user;
    }

    /**
     * @param int $user
     */
    public function setUser(int $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string|null $hash
     */
    public function setHash(?string $hash): void
    {
        $this->hash = $hash;
    }
}
