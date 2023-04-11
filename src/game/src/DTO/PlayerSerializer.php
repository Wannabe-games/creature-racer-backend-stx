<?php
namespace App\DTO;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;
use App\Common\Utils\TimeTickerConverter;
use App\Entity\Game\Player;
use DateTime;
use Exception;

/**
 * Class Player
 * @package App\DTO\Player
 */
class PlayerSerializer
{
    /**
     * @var CreatureUserRepository
     */
    private CreatureUserRepository $creatureUserRepository;

    /**
     * @var CreatureLevelRepository
     */
    private CreatureLevelRepository $creatureLevelRepository;

    public function __construct(CreatureUserRepository $creatureUserRepository, CreatureLevelRepository $creatureLevelRepository)
    {
        $this->creatureUserRepository = $creatureUserRepository;
        $this->creatureLevelRepository = $creatureLevelRepository;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    public function validate(array $data): array
    {
        if (
            !key_exists('Gold', $data) ||
            !key_exists('Stacks', $data) ||
            !key_exists('Energy_', $data) ||
            !key_exists('Value', $data['Energy_']) ||
            !key_exists('RestoreStartTime', $data['Energy_'])
        ) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        return $data;
    }

    /**
     * @param array                   $data
     * @param Player $player
     *
     * @return Player
     *
     * @throws Exception
     */
    public function unserialize(array $data, Player $player): Player
    {
        $this->validate($data);

        unset($data['Gold']);
        unset($data['Stacks']);
        unset($data['Experience']);

        if (!empty($data['ActiveAnimalType'])) {
            $player->setActiveAnimalCreatureType($data['ActiveAnimalType']);
        }
        if (!empty($data['Energy_']['Value'])) {
            $player->setEnergy($data['Energy_']['Value']);
        }
        if (!empty($data['Energy_']['RestoreStartTime'])) {
            $player->setRestoreStartTime(new DateTime('@'.TimeTickerConverter::TicksToTime($data['Energy_']['RestoreStartTime'])));
        }
        unset($data['ActiveAnimalType']);
        unset($data['Energy_']);
        unset($data['Animals']);

        $player->setAdditionalData($data);

        return $player;
    }

    /**
     * @param Player $player
     *
     * @return array
     */
    public function serialize(Player $player): array
    {
        $data = [];
        $userCreature = new UserCreatureSerializer($this->creatureLevelRepository);

        $data['Gold'] = $player->getGold();
        $data['Stacks'] = $player->getStacks();
        $data['FlappyPetsMaxScore'] = $player->getMaxScore();
        $data['ActiveAnimalType'] = $player->getActiveAnimalCreatureType();
        $data['Experience'] = $player->getExperience();
        $data['Energy_']['Value'] = $player->getEnergy();
        $data['Energy_']['RestoreStartTime'] = $player->getRestoreStartTime() ? TimeTickerConverter::TimeToTicks((int)$player->getRestoreStartTime()->format('U')) : 0;

        foreach ($this->creatureUserRepository->findForGame($player->getUser()) as $creatureUser) {
            $data['Animals'][] = $userCreature->serialize($creatureUser);
        }

        return array_merge($player->getAdditionalData(), $data);
    }
}
