<?php

namespace App\Common\Service\Game;

use App\Common\Enum\CreatureLevels;
use App\Common\Enum\CreatureTypes;
use App\Common\Enum\CreatureUpgradeTypes;
use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Entity\Creature\CreatureUser;
use App\Entity\User;
use DateInterval;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

/**
 * Class CreatureManager
 */
class CreatureManager
{
    /**
     * @param EntityManagerInterface $entityManager
     * @param CreatureRepository $creatureRepository
     * @param CreatureUserRepository $creatureUserRepository
     * @param CreatureLevelRepository $creatureLevelRepository
     */
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CreatureRepository $creatureRepository,
        private CreatureUserRepository $creatureUserRepository,
        private CreatureLevelRepository $creatureLevelRepository
    ) {
    }

    /**
     * @param User $user
     * @param string $creatureType
     * @param string|null $receipt
     * @return string|null
     * @throws Exception
     */
    public function buyCreature(User $user, string $creatureType, ?string $receipt = null): ?string
    {
        if (!CreatureTypes::validate($creatureType)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::TYPE_VALIDATION_ERROR));
        }

        /** @var Creature $creature */
        $creature = $this->creatureRepository->findOneBy(['type' => $creatureType]);

        /** @var CreatureLevel $creatureLevel */
        $creatureLevel = $this->creatureLevelRepository->findOneBy(
            [
                'creature' => $creature,
                'level' => CreatureLevels::BASE,
                'upgradeType' => CreatureUpgradeTypes::BASE
            ]
        );

        if (!($creatureLevel instanceof CreatureLevel)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::CREATURE_NOT_EXIST));
        }

        if (!$user->getCreatures()->isEmpty()) {
            /** @GAMELOGIC User can have a negative account balance,
             *  but can not buy creature when account balance is negative.
             */
            $this->paymentForLevel($user, $creatureLevel);
        } else {
            $user->getPlayer()->setActiveAnimalCreatureType($creature->getType());
        }
        $creatureUser = $this->createCreatureOnLevel($user, $creatureLevel);

        $date = new DateTime();
        $date->add(new DateInterval('PT' . $creatureLevel->getDeliveryWaitingTime() . 'S'));
        $creatureUser->setCreatedAt($date);

        return $creatureUser->getUuid();
    }

    /**
     * @param User $user
     * @param string $uuid
     * @param string $upgradeType
     * @param string|null $receipt
     * @return string|null
     * @throws Exception
     */
    public function upgradeCreature(User $user, string $uuid, string $upgradeType, ?string $receipt = null): ?string
    {
        // Convert
        $upgradeType = $this->convertUpgradeType($upgradeType);

        if (!CreatureUpgradeTypes::validate($upgradeType)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::TYPE_VALIDATION_ERROR));
        }

        /** @var CreatureUser $currentUser */
        $currentUser = $this->creatureUserRepository->findOneBy(['uuid' => $uuid]);

        $this->verifyCooldown($upgradeType, $currentUser);

        if ($currentUser->isStaked()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        // Verification
        $this->isUserCreatureBelongToUser($currentUser, $user);

        $getter = match ($upgradeType) {
            CreatureUpgradeTypes::MUSCLES => 'getMuscles',
            CreatureUpgradeTypes::LUNGS => 'getLungs',
            CreatureUpgradeTypes::HEART => 'getHeart',
            CreatureUpgradeTypes::BELLY => 'getBelly',
            CreatureUpgradeTypes::BUTTOCKS => 'getButtocks'
        };

        $level = (int)$currentUser->$getter() + 1;

        if (!CreatureLevels::validate($level)) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::INVALID_LEVEL_VALUE));
        }

        /** @var CreatureLevel $creatureLevel */
        $creatureLevel = $this->creatureLevelRepository->findOneBy(
            [
                'creature' => $currentUser->getCreature(),
                'upgradeType' => $upgradeType,
                'level' => $level
            ]
        );

        if (!($creatureLevel instanceof CreatureLevel)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::INVALID_LEVEL_VALUE));
        }

        //$this->paymentForLevel($user, $creatureLevel);
        $creatureUserUpgraded = $this->createCreatureOnLevel($user, $creatureLevel, $currentUser);

        $this->setUpgradeTime($upgradeType, $creatureUserUpgraded, $creatureLevel);
        $this->entityManager->flush();

        return $creatureUserUpgraded->getUuid();
    }

    /**
     * @param string $upgradeType
     * @return string
     */
    protected function convertUpgradeType(string $upgradeType): string
    {
        return match ($upgradeType) {
            'lungs' => CreatureUpgradeTypes::LUNGS,
            'heart' => CreatureUpgradeTypes::HEART,
            'fuel' => CreatureUpgradeTypes::BELLY,
            'boost' => CreatureUpgradeTypes::BUTTOCKS,
            default => $upgradeType
        };
    }

    /**
     * @param User $user
     * @param CreatureLevel $creatureLevel
     * @param CreatureUser|null $creatureCurrentUser
     * @return CreatureUser
     */
    protected function createCreatureOnLevel(
        User $user,
        CreatureLevel $creatureLevel,
        ?CreatureUser $creatureCurrentUser = null
    ): CreatureUser {
        if (is_null($creatureCurrentUser) || !empty($creatureCurrentUser->getHash())) {
            $creatureUser = new CreatureUser();
            $creatureUser->setUser($user);
            $creatureUser->setCreature($creatureLevel->getCreature());
            $creatureUser->setName($creatureLevel->getCreature()->getName());
        } else {
            $creatureUser = $creatureCurrentUser;
        }

        // Rewrite and update levels
        $this->updateLevels($creatureCurrentUser, $creatureUser, $creatureLevel);

        /** @var CreatureUpgrade $upgradeChange */
        foreach ($creatureLevel->getUpgradeChanges() as $upgradeChange) {
            if ($upgradeChange->getName() == 'acceleration') {
                $creatureUser->setAcceleration($creatureUser->getAcceleration() + $upgradeChange->getValue());
            } elseif ($upgradeChange->getName() == 'gas_pressure') {
                $creatureUser->setBoostAcceleration($creatureUser->getBoostAcceleration() + $upgradeChange->getValue());
            } elseif ($upgradeChange->getName() == 'gas_volume') {
                $creatureUser->setBoostTime($creatureUser->getBoostTime() + $upgradeChange->getValue());
            } elseif ($upgradeChange->getName() == 'speed') {
                $creatureUser->setSpeed($creatureUser->getSpeed() + $upgradeChange->getValue());
            }
        }

        if (null !== $creatureCurrentUser && !empty($creatureCurrentUser->getHash())) {
            $creatureUser->setAcceleration($creatureCurrentUser->getAcceleration() + $creatureUser->getAcceleration());
            $creatureUser->setBoostAcceleration($creatureCurrentUser->getBoostAcceleration() + $creatureUser->getBoostAcceleration());
            $creatureUser->setBoostTime($creatureCurrentUser->getBoostTime() + $creatureUser->getBoostTime());
            $creatureUser->setSpeed($creatureCurrentUser->getSpeed() + $creatureUser->getSpeed());
            $creatureCurrentUser->setForGame(false);
        }
        $this->deactivateCreatureOfType($creatureUser);

        $this->entityManager->persist($creatureUser);
        $this->entityManager->flush();

        return $creatureUser;
    }

    /**
     * @param User $user
     * @param CreatureLevel $creatureLevel
     * @return void
     */
    protected function paymentForLevel(User $user, CreatureLevel $creatureLevel): void
    {
        $goldAfterPurchase = $user->getPlayer()->getGold() - $creatureLevel->getPriceGold();

        if (0 > $goldAfterPurchase) {
            throw new ApiException(new ApiExceptionWrapper(400, ApiExceptionWrapper::NOT_ENOUGH_GOLD));
        }

        $user->getPlayer()->setGold($goldAfterPurchase);
    }

    /**
     * @param CreatureUser $creatureUser
     * @return void
     */
    protected function deactivateCreatureOfType(CreatureUser $creatureUser): void
    {
        $ActiveUserCreatures = $this->creatureUserRepository->findByCreatureType($creatureUser->getCreature()->getType(), $creatureUser->getUser());

        if (!empty($ActiveUserCreatures)) {
            /** @var CreatureUser $ActiveUserCreature */
            foreach ($ActiveUserCreatures as $ActiveUserCreature) {
                $ActiveUserCreature->setForGame(false);
            }
        }

        $creatureUser->setForGame(true);
    }

    /**
     * @param string $upgradeName
     * @return string
     */
    public function mapUpgradeName(string $upgradeName): string
    {
        return match ($upgradeName) {
            'gas_pressure' => 'boostPower',
            'gas_volume' => 'fuelVolume',
            default => $upgradeName,
        };
    }

    /**
     * @param CreatureUser $creatureUser
     * @param User $user
     * @return void
     */
    protected function isUserCreatureBelongToUser(CreatureUser $creatureUser, User $user): void
    {
        if ($creatureUser->getUser()->getId() !== $user->getId()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }
    }

    /**
     * @param User $user
     * @param string $uuid
     * @param bool $isActive
     * @return string|null
     */
    public function activeCreatureInGame(User $user, string $uuid, bool $isActive): ?string
    {
        /** @var CreatureUser $creature */
        $creature = $this->creatureUserRepository->findOneBy(['uuid' => $uuid]);

        /** @var CreatureUser $creatureUser */
        if ($creature->isStaked()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        // Verification
        $this->isUserCreatureBelongToUser($creature, $user);

        $this->deactivateCreatureOfType($creature);
        $creature->setForGame($isActive);

        $this->entityManager->flush();

        return $creature->getUuid();
    }

    /**
     * @param User $user
     * @param string $uuid
     * @param bool $stake
     * @return string|null
     */
    public function stakeCreature(User $user, string $uuid, bool $stake): ?string
    {
        /** @var CreatureUser $creature */
        $creature = $this->creatureUserRepository->findOneBy(['uuid' => $uuid]);

        // Verification
        $this->isUserCreatureBelongToUser($creature, $user);

        $creature->setStaked($stake);

        // deactivate creature in game if is staked
        if ($stake) {
            $creature->setForGame(false);
        }

        $this->entityManager->flush();

        return $creature->getUuid();
    }

    /**
     * @param string $upgradeType
     * @param CreatureUser $creatureUser
     * @param CreatureLevel|null $creatureLevel
     * @return void
     *
     * @throws Exception
     */
    protected function setUpgradeTime(
        string $upgradeType,
        CreatureUser $creatureUser,
        CreatureLevel $creatureLevel = null
    ): void {
        if (null !== $creatureLevel) {
            $date = new DateTime();
            $date->add(new DateInterval('PT' . $creatureLevel->getDeliveryWaitingTime() . 'S'));
        } else {
            $date = null;
        }

        switch ($upgradeType) {
            case CreatureUpgradeTypes::MUSCLES:
                $creatureUser->setUpgradeMusclesEnd($date);
                break;
            case CreatureUpgradeTypes::LUNGS:
                $creatureUser->setUpgradeLungsEnd($date);
                break;
            case CreatureUpgradeTypes::HEART:
                $creatureUser->setUpgradeHeartEnd($date);
                break;
            case CreatureUpgradeTypes::BELLY:
                $creatureUser->setUpgradeBellyEnd($date);
                break;
            case CreatureUpgradeTypes::BUTTOCKS:
                $creatureUser->setUpgradeButtocksEnd($date);
                break;
        }
    }

    /**
     * @param User $user
     * @param string $uuid
     * @param bool $upgradeType
     * @return string|null
     * @throws Exception
     */
    public function skipUpgradeTime(User $user, string $uuid, bool $upgradeType): ?string
    {
        // Convert
        $upgradeType = $this->convertUpgradeType($upgradeType);

        if (!CreatureUpgradeTypes::validate($upgradeType)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::TYPE_VALIDATION_ERROR));
        }
        /** @var CreatureUser $creature */
        $creature = $this->creatureUserRepository->findOneBy([
                                                                 'uuid' => $uuid
                                                             ]);

        /** @var CreatureUser $creatureUser */
        if ($creature->isStaked()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        // Verification
        $this->isUserCreatureBelongToUser($creature, $user);
        $this->setUpgradeTime($upgradeType, $creatureUser);

        $this->entityManager->flush();

        return $creature->getUuid();
    }

    /**
     * @param User $user
     * @param string $uuid
     * @param bool $upgradeType
     * @return string|null
     */
    public function skipAllUpgradeTime(User $user, string $uuid, bool $upgradeType): ?string
    {
        // Convert
        $upgradeType = $this->convertUpgradeType($upgradeType);

        if (!CreatureUpgradeTypes::validate($upgradeType)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::TYPE_VALIDATION_ERROR));
        }
        /** @var CreatureUser $creature */
        $creature = $this->creatureUserRepository->findOneBy(
            [
                'uuid' => $uuid
            ]
        );

        /** @var CreatureUser $creatureUser */
        if ($creature->isStaked()) {
            throw new ApiException(new ApiExceptionWrapper(403, ApiExceptionWrapper::ACCESS_DENY));
        }

        // Verification
        $this->isUserCreatureBelongToUser($creature, $user);

        $creatureUser->setUpgradeMusclesEnd(null);
        $creatureUser->setUpgradeLungsEnd(null);
        $creatureUser->setUpgradeHeartEnd(null);
        $creatureUser->setUpgradeBellyEnd(null);
        $creatureUser->setUpgradeButtocksEnd(null);

        $this->entityManager->flush();

        return $creature->getUuid();
    }

    /**
     * @param $upgradeType
     * @return string
     */
    public static function getBodyPartsName($upgradeType): string
    {
        return match ($upgradeType) {
            CreatureUpgradeTypes::MUSCLES => 'Muscles',
            CreatureUpgradeTypes::LUNGS => 'Lungs',
            CreatureUpgradeTypes::HEART => 'Heart',
            CreatureUpgradeTypes::BELLY => 'Fuel',
            CreatureUpgradeTypes::BUTTOCKS => 'Boost power'
        };
    }

    /**
     * @param float $value
     * @param float $reduce
     * @param float $min
     * @return float
     */
    public static function getReducedPerformanceValue(float $value, float $reduce, float $min = 0.1): float
    {
        return $value > $reduce ? $value - $reduce : $min;
    }

    /**
     * @param string $upgradeType
     * @param CreatureUser $creature
     *
     * @return void
     */
    protected function verifyCooldown(string $upgradeType, CreatureUser $creature): void
    {
        $date = new DateTime();
        $levelUpgradeTime = null;

        switch ($upgradeType) {
            case CreatureUpgradeTypes::MUSCLES:
                $levelUpgradeTime = $creature->getUpgradeMusclesEnd();
                break;
            case CreatureUpgradeTypes::LUNGS:
                $levelUpgradeTime = $creature->getUpgradeLungsEnd();
                break;
            case CreatureUpgradeTypes::HEART:
                $levelUpgradeTime = $creature->getUpgradeHeartEnd();
                break;
            case CreatureUpgradeTypes::BELLY:
                $levelUpgradeTime = $creature->getUpgradeBellyEnd();
                break;
            case CreatureUpgradeTypes::BUTTOCKS:
                $levelUpgradeTime = $creature->getUpgradeButtocksEnd();
                break;
        }

        if (null !== $levelUpgradeTime && $levelUpgradeTime >= $date) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::UPGRADE_IN_PROGRESS));
        }
    }

    /**
     * @param CreatureUser|null $creatureCurrentUser
     * @param CreatureUser $creatureUser
     * @param CreatureLevel $creatureLevel
     * @return void
     */
    protected function updateLevels(
        ?CreatureUser $creatureCurrentUser,
        CreatureUser $creatureUser,
        CreatureLevel $creatureLevel
    ): void {
        if (null !== $creatureCurrentUser && !empty($creatureCurrentUser->getHash())) {
            $creatureUser->setBelly($creatureCurrentUser->getBelly());
            $creatureUser->setButtocks($creatureCurrentUser->getButtocks());
            $creatureUser->setHeart($creatureCurrentUser->getHeart());
            $creatureUser->setLungs($creatureCurrentUser->getLungs());
            $creatureUser->setMuscles($creatureCurrentUser->getMuscles());
        }

        switch ($creatureLevel->getUpgradeType()) {
            case CreatureUpgradeTypes::MUSCLES:
                $creatureUser->setMuscles($creatureUser->getMuscles() + 1);
                break;
            case CreatureUpgradeTypes::LUNGS:
                $creatureUser->setLungs($creatureUser->getLungs() + 1);
                break;
            case CreatureUpgradeTypes::HEART:
                $creatureUser->setHeart($creatureUser->getHeart() + 1);
                break;
            case CreatureUpgradeTypes::BELLY:
                $creatureUser->setBelly($creatureUser->getBelly() + 1);
                break;
            case CreatureUpgradeTypes::BUTTOCKS:
                $creatureUser->setButtocks($creatureUser->getButtocks() + 1);
                break;
        }
    }
}
