<?php
namespace App\Command\Fixtures;

use App\Common\Repository\UserRepository;
use App\Entity\Creature\CreatureUser;
use App\Entity\User;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCreatureForUserFixturesCommand extends Command
{
    const CREATURES_FOR_EMPTY_USER = 10;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var CreatureRepository
     */
    private $creatureRepository;

    /**
     * @var CreatureUserRepository
     */
    private $creatureUserRepository;

    public function __construct(
        UserRepository $userRepository,
        CreatureRepository $creatureRepository,
        CreatureUserRepository $creatureUserRepository
    ) {
        parent::__construct();

        $this->userRepository = $userRepository;
        $this->creatureRepository = $creatureRepository;
        $this->creatureUserRepository = $creatureUserRepository;
    }

    protected static $defaultName = 'app:creature-user:create-for-empty-users';

    protected function configure()
    {
        $this->setDescription('Create a creature for user without them.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $users = $this->userRepository->findAll();

        /** @var User $user */
        foreach ($users as $user) {
            if ($user->getCreatures()->isEmpty()) {
                for ($i = 1; $i < self::CREATURES_FOR_EMPTY_USER; ++$i) {
                    $creatureId = rand(1,21);

                    $creature = $this->creatureRepository->find($creatureId);

                    $creatureUser = new CreatureUser();
                    $creatureUser->setName('creature_'.$i);
                    $creatureUser->setUser($user);
                    $creatureUser->setCreature($creature);
                    $creatureUser->setMuscles(rand(0,4));
                    $creatureUser->setLungs(rand(0,4));
                    $creatureUser->setHeart(rand(0,4));
                    $creatureUser->setBelly(rand(0,4));
                    $creatureUser->setButtocks(rand(0,4));
                    $creatureUser->setAcceleration( mt_rand( 0, 2000 ) / 1000);
                    $creatureUser->setBoostAcceleration(mt_rand( 0, 2000 ) / 1000);
                    $creatureUser->setBoostVelocity(mt_rand( 0, 2000 ) / 1000);
                    $creatureUser->setSpeed(mt_rand( 0, 2000 ) / 1000);
                    $creatureUser->setIsForGame(true);
                    $creatureUser->setBonus(true);
                    $creatureUser->setUpgradeMusclesEnd(new \DateTime());
                    $creatureUser->setUpgradeBellyEnd(new \DateTime());
                    $creatureUser->setUpgradeButtocksEnd(new \DateTime());
                    $creatureUser->setUpgradeLungsEnd(new \DateTime());
                    $creatureUser->setUpgradeHeartEnd(new \DateTime());

                    $this->creatureUserRepository->save($creatureUser);
                }
                $output->writeln(sprintf('Created creature for user <comment>%s</comment>', $user->getEmail()));
            }
        }

        return 0;
    }
}
