<?php
namespace App\DTO;

use App\Common\Exception\Api\ApiException;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Common\Service\Api\Wrapper\ApiExceptionWrapper;

/**
 * Class Experience
 * @package App\DTO\Experience
 */
class Experience
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
        if (!key_exists('Experience', $data)) {
            throw new ApiException(new ApiExceptionWrapper(404, ApiExceptionWrapper::BAD_REQUEST));
        }

        return $data;
    }

    /**
     * @param array                   $data
     * @param \App\Entity\Game\Player $player
     *
     * @return \App\Entity\Game\Player
     *
     * @throws \Exception
     */
    public function unserialize(array $data, \App\Entity\Game\Player $player): \App\Entity\Game\Player
    {
        $this->validate($data);

        $player->setExperience($data['Experience']);

        return $player;
    }

    /**
     * @param \App\Entity\Game\Player $player
     *
     * @return array
     */
    public function serialize(\App\Entity\Game\Player $player): array
    {
        $data['Experience'] = $player->getExperience();

        return $data;
    }
}
