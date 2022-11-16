<?php
namespace App\Common\Service\User;

use App\Common\Enum\PlayerDefault;
use App\Common\Service\Game\CreatureManager;
use App\Entity\Game\Player;
use App\Entity\User;
use App\Common\Repository\UserRepository;
use App\Common\Service\User\Utils\CanonicalFieldsUpdater;
use App\Common\Service\User\Utils\PasswordUpdaterInterface;
use App\Common\Enum\CreatureTypes;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\Form\Exception\InvalidArgumentException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\Cache\TagAwareCacheInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class UserManager
 * @package App\Service\User
 */
class UserManager
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * @var CanonicalFieldsUpdater
     */
    private CanonicalFieldsUpdater $canonicalFieldsUpdater;

    /**
     * @var PasswordUpdaterInterface
     */
    private PasswordUpdaterInterface $passwordUpdater;

    /**
     * @var EventDispatcherInterface
     */
    private EventDispatcherInterface $dispatcher;

    /**
     * @var CreatureManager
     */
    private CreatureManager $creatureManager;

    /**
     * @var int
     */
    private int $activeSessionTtl;

    /**
     * UserManager constructor.
     * @param EntityManagerInterface $entityManager
     * @param UserRepository $userRepository
     * @param CanonicalFieldsUpdater $canonicalFieldsUpdater
     * @param PasswordUpdaterInterface $passwordUpdater
     * @param EventDispatcherInterface $dispatcher
     * @param TranslatorInterface $translator
     * @param TagAwareCacheInterface $userActivityCachePool
     * @param int $activeSessionTtl
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        UserRepository $userRepository,
        CanonicalFieldsUpdater $canonicalFieldsUpdater,
        PasswordUpdaterInterface $passwordUpdater,
        EventDispatcherInterface $dispatcher,
        TranslatorInterface $translator,
        TagAwareCacheInterface $userActivityCachePool,
        CreatureManager $creatureManager,
        int $activeSessionTtl = 0
    ) {
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
        $this->canonicalFieldsUpdater = $canonicalFieldsUpdater;
        $this->passwordUpdater = $passwordUpdater;
        $this->dispatcher = $dispatcher;
        $this->activeSessionTtl = $activeSessionTtl;
        $this->translator = $translator;
        $this->userActivityCachePool = $userActivityCachePool;
        $this->creatureManager = $creatureManager;
    }


    /**
     * @param User|array $user
     *
     * @return int|null
     */
    public function createUser($user): ?int
    {
        if (is_array($user)) {
            if (
                (
                    key_exists('username', $user) ||
                    key_exists('email', $user)
                ) &&
                key_exists('password', $user)
            ) {
                $username = key_exists('username', $user) ? $user['username'] : $user['email'];
                $existingUser = $this->userRepository->findOneBy(['username' => $username]);

                if (empty($existingUser)) {
                    $newUser = new User();
                    $newUser->setUsername($username);
                    $newUser->setEmail(key_exists('email', $user) ? $user['email'] : $user['username']);
                    $newUser->setPlainPassword($user['password']);
                    $newUser->setEnabled(true);
                    $newUser->setCreatedAt(new \DateTime());

                    if (key_exists('nick', $user)) {
                        $newUser->setNick($user['nick']);
                    }

                    $player = new Player();
                    $player->setAdditionalData(PlayerDefault::$defaultAdditionalData);
                    $this->entityManager->persist($player);

                    $newUser->setPlayer($player);
                    $player->setUser($newUser);

                    $this->updatePassword($newUser);
                    $this->updateUser($newUser);

//                    $this->creatureManager->buyCreature($newUser, CreatureTypes::CREATURE_TYPE_BOAR, true);

                    return $newUser->getId();
                }
            }
        } elseif ($user instanceof User) {
            $existingUser = $this->userRepository->findOneBy(['username' => $user->getUsername()]);

            if (empty($existingUser)) {
                $user->setEnabled(true);

                $this->updateUser($user);

                return $user->getId();
            }
        }

        return null;
    }

    /**
     * @param User $user
     * @param bool $andFlush
     *
     * @return int
     */
    public function updateUser(User $user, bool $andFlush = true): int
    {
        $this->updateCanonicalFields($user);

        $this->entityManager->persist($user);
        if ($andFlush) {
            $this->entityManager->flush();
        }

        return $user->getId();
    }

    /**
     * @param User $user
     *
     * @return int
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function disableUser(User $user): int
    {
        $user->setEnabled(false);
        $this->userRepository->save($user);

        return $user->getId();
    }

    /**
     * @param User $user
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function deleteUser(User $user)
    {
        $this->userRepository->remove($user);
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function restoreUser(User $user): bool
    {
        $this->updateUser($user);

        return true;
    }

    /**
     * @param int $id
     *
     * @return User|null
     */
    public function getUser(int $id): ?User
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        return $user;
    }

    /**
     * @param mixed $id
     *
     * @return string|null
     */
    public function getUserInformation($id = null): string
    {
        if (is_null($id) && intval($id) <= 0) {
            return '';
        }

        $user = $this->getUser((int) $id);

        if (is_null($user)) {
            return '';
        }

        return ($user->getFirstName() ?: '') . ' ' . ($user->getLastName() ?: '');
    }

    /**
     * @param User $user
     */
    public function updateCanonicalFields(User $user)
    {
        $this->canonicalFieldsUpdater->updateCanonicalFields($user);
    }

    /**
     * @param User $user
     */
    public function updatePassword(User $user)
    {
        $this->passwordUpdater->hashPassword($user);
    }

    /**
     * @param string $firstName
     * @param string $lastName
     *
     * @return string
     */
    public function createAutoGeneratedUsername(string $firstName, string $lastName)
    {
        $firstNameNormalized = iconv('UTF-8','ASCII//TRANSLIT', strtolower($firstName));
        $lastNameNormalized = iconv('UTF-8','ASCII//TRANSLIT', strtolower($lastName));

        $newTempUsername = sprintf('%s.%s', $firstNameNormalized, $lastNameNormalized);
        $countUsersWithUsername = $this->userRepository->findUsersWithGeneratedUsername($newTempUsername);

        if ($countUsersWithUsername > 0) {
            $newTempUsername = sprintf('%s_%d', $newTempUsername, $countUsersWithUsername);
        }

        return $newTempUsername;
    }

    /**
     * @param Request $request
     *
     * @return User
     */
    public function generateUserDataFromNewUserRequest(Request $request): User
    {
        $newUserEmail = base64_decode($request->query->get('newUserEmail'));
        $newUserFirstName = base64_decode($request->query->get('newUserFirstName'));
        $newUserLastName = base64_decode($request->query->get('newUserLastName'));
        $newUserUsername = base64_decode($request->query->get('newUserUsername'));

        if (null !== $this->userRepository->findOneBy(['email' => $newUserEmail])) {
            throw new InvalidArgumentException();
        }

        $newUser = new User;

        $newUser->setFirstName($newUserFirstName);
        $newUser->setLastName($newUserLastName);
        $newUser->setEmail($newUserEmail);
        $newUser->setEmailCanonical($newUserEmail);
        $newUser->setUsernameCanonical($newUserUsername);
        $newUser->setUsername($newUserUsername);

        return $newUser;
    }
}
