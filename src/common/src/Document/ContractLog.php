<?php

namespace App\Document;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;

/**
 * Class PaymentLog
 *
 * @ODM\Document(
 *     collection="contract_log",
 *     repositoryClass="App\Common\Repository\Document\ContractLogRepository",
 *     indexes={
 *         @ODM\Index(keys={
 *              "userWallet"="desc",
 *              "timestamp"="desc"
 *         })
 *     }
 * )
 */
class ContractLog
{
    /**
     * @ODM\Id
     */
    protected ?string $id = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     * @ODM\Index(unique=true)
     */
    private ?string $transactionId = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $transactionFee = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $contractName = null;

    /**
     * @var int|null
     * @ODM\Field(type="int")
     */
    private ?int $contractVersion = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $contractFunctionName = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $contractFunctionArgs = null;

    /**
     * @var string|null
     * @ODM\Field(type="string")
     */
    private ?string $userWallet = null;

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
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @param string|null $transactionId
     */
    public function setTransactionId(?string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string|null
     */
    public function getTransactionFee(): ?string
    {
        return $this->transactionFee;
    }

    /**
     * @param string|null $transactionFee
     */
    public function setTransactionFee(?string $transactionFee): void
    {
        $this->transactionFee = $transactionFee;
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
     * @return string|null
     */
    public function getContractFunctionArgs(): ?string
    {
        return $this->contractFunctionArgs;
    }

    /**
     * @param string|null $contractFunctionArgs
     */
    public function setContractFunctionArgs(?string $contractFunctionArgs): void
    {
        $this->contractFunctionArgs = $contractFunctionArgs;
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
