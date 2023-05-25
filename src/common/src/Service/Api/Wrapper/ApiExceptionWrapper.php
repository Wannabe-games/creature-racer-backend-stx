<?php

namespace App\Common\Service\Api\Wrapper;

use \InvalidArgumentException;

/**
 * A wrapper for holding data to be used for a application/problem+json response
 *
 * @author Michał Wadas <michal@mklit.pl>
 */
class ApiExceptionWrapper
{
    public const ACCESS_DENY = 'access_deny';
    public const ACCOUNT_EXIST = 'account_exist';
    public const BAD_CONFIRMATION_TOKEN = "bad_confirmation_token";
    public const BAD_REQUEST = 'bad_request';
    public const CREATURE_NOT_EXIST = 'creature_not_exist';
    public const INCORRECT_OBJECT_ID_FORMAT = 'incorrect_object_id_format';
    public const INTEGRAL_ERROR = 'integral_error';
    public const INVALID_LEVEL_VALUE = 'invalid_level_value';
    public const LEVEL_NOT_EXIST = 'level_not_exist';
    public const LOBBY_NOT_EXIST = 'lobby_not_exist';
    public const NFT_EXIST = 'nft_exist';
    public const NOT_ENOUGH_GOLD = 'not_enough_gold';
    public const NOT_FOUND = 'not_found';
    public const REF_CODE_EXIST = 'ref_code_exist';
    public const RNFT_NOT_EXIST = 'rnft_not_exist';
    public const TOO_LOW_RATE = 'too_low_rate';
    public const TYPE_INVALID_REQUEST_BODY_FORMAT = 'invalid_body_format';
    public const TYPE_VALIDATION_ERROR = 'validation_error';
    public const UPGRADE_IN_PROGRESS = 'upgrade_in_progress';
    public const WALLET_EXIST = 'wallet_exist';
    public const WALLET_NOT_EXIST = 'wallet_not_exist';
    public const WITHDRAW_EXECUTED = 'withdraw_executed';

    /**
     * @var array
     */
    private static array $titles = [
        self::ACCESS_DENY => 'Access deny.',
        self::ACCOUNT_EXIST => 'Account exist.',
        self::BAD_CONFIRMATION_TOKEN => 'Bad configuration token.',
        self::BAD_REQUEST => 'The current request has bad schema.',
        self::CREATURE_NOT_EXIST => 'The Creature in User resource is not exist.',
        self::INCORRECT_OBJECT_ID_FORMAT => 'Incorrect format of object ids.',
        self::INTEGRAL_ERROR => 'Internal error.',
        self::INVALID_LEVEL_VALUE => 'Can not upgrade creature. This is not a valid next level.',
        self::LEVEL_NOT_EXIST => 'The level not exist.',
        self::LOBBY_NOT_EXIST => 'The lobby not exist.',
        self::NFT_EXIST => 'There NFT for this creature is already exist.',
        self::NOT_ENOUGH_GOLD => 'There is not enough gold in your account.',
        self::NOT_FOUND => 'Message not found',
        self::REF_CODE_EXIST => 'The referral code is taken.',
        self::RNFT_NOT_EXIST => 'This rNFT not exist.',
        self::TOO_LOW_RATE => 'Too low rate.',
        self::TYPE_INVALID_REQUEST_BODY_FORMAT => 'Invalid JSON format sent',
        self::TYPE_VALIDATION_ERROR => 'There was a validation error',
        self::UPGRADE_IN_PROGRESS => 'Upgrade in progress.',
        self::WALLET_EXIST => 'The wallet is already attached.',
        self::WALLET_NOT_EXIST => 'The wallet is not exist',
        self::WITHDRAW_EXECUTED => 'The claim is not possible.',
    ];

    /**
     * @var int
     */
    private int $statusCode;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $title;

    /**
     * @var array
     */
    private array $extraData = [];

    /**
     * ApiProblem constructor.
     *
     * @param $statusCode
     * @param $type
     */
    public function __construct($statusCode, $type)
    {
        $this->statusCode = $statusCode;
        $this->type = $type;
        if (!isset(self::$titles[$type])) {
            throw new InvalidArgumentException('No title for type ' . $type);
        }
        $this->title = self::$titles[$type];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_merge(
            $this->extraData,
            array(
                'status' => $this->statusCode,
                'type' => $this->type,
                'title' => $this->title,
            )
        );
    }

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value)
    {
        $this->extraData[$name] = $value;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public static function getTitles(): array
    {
        return self::$titles;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}
