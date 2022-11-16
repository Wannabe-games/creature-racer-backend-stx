<?php
namespace App\Command;

use App\Common\Enum\CreatureCohorts;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\Creature\CreatureRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Entity\Creature\CreatureUser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SetCohortsCommand extends Command
{
    public function __construct(
        private CreatureRepository $creatureRepository,
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:creature:cohorts';

    protected function configure()
    {
        $this->setDescription('Set cohorts to creatures');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creatures = $this->creatureRepository->findAll();

        /** @var Creature $creature */
        foreach ($creatures as $creature) {

            $creature->setCohort(CreatureCohorts::$creatureCohorts[$creature->getType()]);

            $this->creatureRepository->save($creature);
        }

        return 0;
    }
}
