<?php

namespace App\Common\Repository\Game;

use App\Common\Repository\RepositoryTrait;
use App\Entity\Game\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class PlayerRepository.
 */
class PlayerRepository extends ServiceEntityRepository
{
    use RepositoryTrait;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Player::class);
    }
}
