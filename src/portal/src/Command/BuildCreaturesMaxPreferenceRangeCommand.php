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

class BuildCreaturesMaxPreferenceRangeCommand extends Command
{
    public function __construct(
        private CreatureRepository $creatureRepository,
        private CreatureLevelRepository $creatureLevelRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:creatures:max-preference-range';

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

        $maxCreature = [];

        /** @var CreatureLevel $creatureLevel */
        foreach ($creatureLevels as $creatureLevel) {
            /** @var CreatureUpgrade $upgradeChange */
            foreach ($creatureLevel->getUpgradeChanges() as $upgradeChange) {
                if (!key_exists($creatureLevel->getCreatureType(), $maxCreature)) {
                    $maxCreature[$creatureLevel->getCreatureType()][$upgradeChange->getType()] = $upgradeChange->getValue();
                } elseif (!key_exists($upgradeChange->getType(), $maxCreature[$creatureLevel->getCreatureType()])) {
                    $maxCreature[$creatureLevel->getCreatureType()][$upgradeChange->getType()] = $upgradeChange->getValue();
                } else {
                    $maxCreature[$creatureLevel->getCreatureType()][$upgradeChange->getType()] += $upgradeChange->getValue();
                }
            }
        }
        $maxResult = [0,0,0,0,0,0];
        foreach ($maxCreature as $type) {
            $maxResult[0] = max($maxResult[0], $type[0]);
            $maxResult[1] = max($maxResult[1], $type[1]);
            $maxResult[4] = max($maxResult[4], $type[4]);
            $maxResult[5] = max($maxResult[5], $type[5]);

        }
        /** @var Creature $creature */
        foreach ($creatures as $creature) {
            $creature->setSpeedMax($maxResult[1]);
            $creature->setAccelerationMax($maxResult[0]);
            $creature->setBoostTimeMax($maxResult[4]);
            $creature->setBoostAccelerationMax($maxResult[5]);
            $creature->setBoostVelocityMax(0);

            $this->creatureRepository->save($creature);
        }

        $creatureLevels = $this->creatureLevelRepository->findBy([
            'upgradeType' => 'base'
        ]);

        $maxCreature = [];

        /** @var CreatureLevel $creatureLevel */
        foreach ($creatureLevels as $creatureLevel) {
            /** @var CreatureUpgrade $upgradeChange */
            foreach ($creatureLevel->getUpgradeChanges() as $upgradeChange) {
                if (!key_exists($creatureLevel->getCreatureType(), $maxCreature)) {
                    $maxCreature[$creatureLevel->getCreatureType()][$upgradeChange->getType()] = $upgradeChange->getValue();
                } elseif (!key_exists($upgradeChange->getType(), $maxCreature[$creatureLevel->getCreatureType()])) {
                    $maxCreature[$creatureLevel->getCreatureType()][$upgradeChange->getType()] = $upgradeChange->getValue();
                } else {
                    $maxCreature[$creatureLevel->getCreatureType()][$upgradeChange->getType()] += $upgradeChange->getValue();
                }
            }
        }
        $minResult = [100,100,100,100,100,100];
        foreach ($maxCreature as $type) {
            $minResult[0] = min($minResult[0], $type[0]);
            $minResult[1] = min($minResult[1], $type[1]);
            $minResult[4] = min($minResult[4], $type[4]);
            $minResult[5] = min($minResult[5], $type[5]);
        }
        /** @var Creature $creature */
        foreach ($creatures as $creature) {
            $creature->setSpeedMin($minResult[1]);
            $creature->setAccelerationMin($minResult[0]);
            $creature->setBoostTimeMin($minResult[4]);
            $creature->setBoostAccelerationMin($minResult[5]);
            $creature->setBoostVelocityMin(0);

            $this->creatureRepository->save($creature);
        }

        return 0;
    }
}
