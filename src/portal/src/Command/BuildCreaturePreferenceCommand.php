<?php
namespace App\Command;

use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\Creature\CreatureUserRepository;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Entity\Creature\CreatureUser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BuildCreaturePreferenceCommand extends Command
{
    public function __construct(
        private CreatureUserRepository $creatureUserRepository,
        private CreatureLevelRepository $creatureLevelRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'app:creature-user:preferences';

    protected function configure()
    {
        $this->setDescription('Create a creature preference.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $creatureUsers = $this->creatureUserRepository->findAll();
        $creatureLevels = $this->creatureLevelRepository->findAll();

        $result = [];
//        $resultLevels = [
//            'muscles' => 0,
//            'lung' => 0,
//            'reflex' => 0,
//            'boost' => 0,
//            'boost2' => 0
//        ];

        /** @var CreatureLevel $creatureLevel */
        foreach ($creatureLevels as $creatureLevel) {
            $result[$creatureLevel->getCreatureType()][$creatureLevel->getUpgradeType()][$creatureLevel->getLevel()] = [
                'acceleration' => 0,
                'speed' => 0,
                'gas_volume' => 0,
                'gas_pressure' => 0,
            ];
            /** @var CreatureUpgrade $upgradeChange */
            foreach ($creatureLevel->getUpgradeChanges() as $upgradeChange) {
                if ($creatureLevel->getLevel() > 1) {
                    $result[$creatureLevel->getCreatureType()][$creatureLevel->getUpgradeType()][$creatureLevel->getLevel()][$upgradeChange->getName()] = $result[$creatureLevel->getCreatureType()][$creatureLevel->getUpgradeType()][$creatureLevel->getLevel()-1][$upgradeChange->getName()] + $upgradeChange->getValue();
                } else {
                    $result[$creatureLevel->getCreatureType()][$creatureLevel->getUpgradeType()][$creatureLevel->getLevel()][$upgradeChange->getName()] = $upgradeChange->getValue();
                }
            }
        }
        /** @var CreatureUser $creatureUser */
        foreach ($creatureUsers as $creatureUser) {
            $creatureUser->setSpeed(
                $result[$creatureUser->getCreature()->getType()]['base'][0]['speed']+
                ($creatureUser->getMuscles() > 0 ? $result[$creatureUser->getCreature()->getType()]['muscles'][$creatureUser->getMuscles()]['speed'] : 0)+
                ($creatureUser->getLungs() > 0 ? $result[$creatureUser->getCreature()->getType()]['lung'][$creatureUser->getLungs()]['speed'] : 0)+
                ($creatureUser->getHeart() > 0 ? $result[$creatureUser->getCreature()->getType()]['reflex'][$creatureUser->getHeart()]['speed'] : 0)+
                ($creatureUser->getBelly() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost'][$creatureUser->getBelly()]['speed'] : 0)+
                ($creatureUser->getButtocks() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost2'][$creatureUser->getButtocks()]['speed'] : 0)
            );
            $creatureUser->setAcceleration(
                $result[$creatureUser->getCreature()->getType()]['base'][0]['acceleration']+
                ($creatureUser->getMuscles() > 0 ? $result[$creatureUser->getCreature()->getType()]['muscles'][$creatureUser->getMuscles()]['acceleration'] : 0)+
                ($creatureUser->getLungs() > 0 ? $result[$creatureUser->getCreature()->getType()]['lung'][$creatureUser->getLungs()]['acceleration'] : 0)+
                ($creatureUser->getHeart() > 0 ? $result[$creatureUser->getCreature()->getType()]['reflex'][$creatureUser->getHeart()]['acceleration'] : 0)+
                ($creatureUser->getBelly() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost'][$creatureUser->getBelly()]['acceleration'] : 0)+
                ($creatureUser->getButtocks() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost2'][$creatureUser->getButtocks()]['acceleration'] : 0)
            );
            $creatureUser->setBoostTime(
                $result[$creatureUser->getCreature()->getType()]['base'][0]['gas_volume']+
                ($creatureUser->getMuscles() > 0 ? $result[$creatureUser->getCreature()->getType()]['muscles'][$creatureUser->getMuscles()]['gas_volume'] : 0)+
                ($creatureUser->getLungs() > 0 ? $result[$creatureUser->getCreature()->getType()]['lung'][$creatureUser->getLungs()]['gas_volume'] : 0)+
                ($creatureUser->getHeart() > 0 ? $result[$creatureUser->getCreature()->getType()]['reflex'][$creatureUser->getHeart()]['gas_volume'] : 0)+
                ($creatureUser->getBelly() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost'][$creatureUser->getBelly()]['gas_volume'] : 0)+
                ($creatureUser->getButtocks() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost2'][$creatureUser->getButtocks()]['gas_volume'] : 0)
            );
            $creatureUser->setBoostAcceleration(
                $result[$creatureUser->getCreature()->getType()]['base'][0]['gas_pressure']+
                ($creatureUser->getMuscles() > 0 ? $result[$creatureUser->getCreature()->getType()]['muscles'][$creatureUser->getMuscles()]['gas_pressure'] : 0)+
                ($creatureUser->getLungs() > 0 ? $result[$creatureUser->getCreature()->getType()]['lung'][$creatureUser->getLungs()]['gas_pressure'] : 0)+
                ($creatureUser->getHeart() > 0 ? $result[$creatureUser->getCreature()->getType()]['reflex'][$creatureUser->getHeart()]['gas_pressure'] : 0)+
                ($creatureUser->getBelly() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost'][$creatureUser->getBelly()]['gas_pressure'] : 0)+
                ($creatureUser->getButtocks() > 0 ? $result[$creatureUser->getCreature()->getType()]['boost2'][$creatureUser->getButtocks()]['gas_pressure'] : 0)
            );

            $this->creatureUserRepository->save($creatureUser);
        }

        return 0;
    }
}
