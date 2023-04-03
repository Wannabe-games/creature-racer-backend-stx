<?php
namespace App\DTO;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Service\User\UserManager;

/**
 * Class User
 * @package App\DTO\User
 */
class UserSerializer
{
    /**
     * @var UserManager
     */
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function validateCurrent(array $data): array
    {
        if (
            !key_exists('nick', $data) ||
            !key_exists('firstName', $data) ||
            !key_exists('lastName', $data) ||
            !key_exists('email', $data)
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        return $data;
    }

    /**
     * @param array            $data
     * @param \App\Entity\User $user
     *
     * @return \App\Entity\User
     */
    public function unserialize(array $data, \App\Entity\User $user): \App\Entity\User
    {
        $this->validateCurrent($data);

        if (!empty($data['password'])) {
            $user->setPlainPassword($data['password']);

            $this->userManager->updatePassword($user);
        }
        if (!empty($data['firstName'])) {
            $user->setFirstName($data['firstName']);
        }
        if (!empty($data['lastName'])) {
            $user->setLastName($data['lastName']);
        }
        if (!empty($data['email'])) {
            $user->setEmail($data['email']);
            $user->setUsername($data['email']);
        }
        if (!empty($data['nick'])) {
            $user->setNick($data['nick']);
        }

        $this->userManager->updateUser($user);

        return $user;
    }
}
