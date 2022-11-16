<?php
namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Common\Repository\Creature\CreatureRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCreatureMaxPreferenceRangeCommand extends Command
{
    public function __construct(
        private CreatureRepository $creatureRepository,
        private CreatureLevelRepository $creatureLevelRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:creature:max-preference-range';

    protected function configure()
    {
        $this->setDescription('Create a creature preference max range.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creatures = $this->creatureRepository->findAll();
        $creatureLevels = $this->creatureLevelRepository->findAll();

        $result = [];

        /** @var CreatureLevel $creatureLevel */
        foreach ($creatureLevels as $creatureLevel) {
            /** @var CreatureUpgrade $upgradeChange */
            foreach ($creatureLevel->getUpgradeChanges() as $upgradeChange) {
                if (!key_exists($creatureLevel->getCreatureType(), $result)) {
                    $result[$creatureLevel->getCreatureType()][$upgradeChange->getType()] = $upgradeChange->getValue();
                } elseif (!key_exists($upgradeChange->getType(), $result[$creatureLevel->getCreatureType()])) {
                    $result[$creatureLevel->getCreatureType()][$upgradeChange->getType()] = $upgradeChange->getValue();
                } else {
                    $result[$creatureLevel->getCreatureType()][$upgradeChange->getType()] += $upgradeChange->getValue();
                }
            }
        }
        /** @var Creature $creature */
        foreach ($creatures as $creature) {
            if (key_exists($creature->getType(), $result)) {
                $creature->setSpeedMax($result[$creature->getType()][1]);
                $creature->setAccelerationMax($result[$creature->getType()][0]);
                $creature->setBoostTimeMax($result[$creature->getType()][4]);
                $creature->setBoostAccelerationMax($result[$creature->getType()][5]);
            }
            $this->creatureRepository->save($creature);
        }

        return 0;
    }
}
