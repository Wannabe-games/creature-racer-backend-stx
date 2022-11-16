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
    protected $id;

    /**
     * @var null|string
     * @ODM\Field(type="string")
     */
    private $share = null;

    /**
     * @var null|string
     * @ODM\Field(type="string")
     */
    private $hash = null;

    /**
     * @var integer
     *
     * @ODM\Field(type="int")
     */
    private $user;

    /**
     * @var DateTimeInterface
     * @ODM\Field(type="date")
     */
    protected $timestamp;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->timestamp = new DateTimeImmutable();
    }

    /**
     * @return mixed
     */
    public function getId()
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
    public function getTimestamp(): DateTimeImmutable|DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface $timestamp
     */
    public function setTimestamp(DateTimeImmutable|DateTimeInterface $timestamp): void
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
