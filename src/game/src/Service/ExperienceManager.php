<?php
namespace App\Service;

use App\Entity\Game\Player;
use App\Enum\DefaultSettings;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class ExperienceManager
 * @package App\Service
 */
class ExperienceManager
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @param int    $experience
     * @param Player $player
     *
     * @return void
     */
    public function levelUp(int  $experience, Player $player)
    {
        if ($experience > $player->getExperience()) {

            $levelSettings = DefaultSettings::getLevelSettings();

            $currentLevel = 0;
            $nextLevel = 0;
            $levelReward = 0;

            /**
             * Example:
             * {
             *  "Level": 1,
             *  "ExperienceThreshold": 10,
             *  "RewardSoftCurrency": 500
             * }
             */
            foreach ($levelSettings as $levelSetting) {
                if (
                    $levelSetting['ExperienceThreshold'] > $player->getExperience() &&
                    $currentLevel == 0
                ) {
                    $currentLevel = $levelSetting['Level'] - 1;
                }
                if (
                    $levelSetting['ExperienceThreshold'] > $experience &&
                    $nextLevel == 0
                ) {
                    $nextLevel = $levelSetting['Level'] - 1;
                }
                if (
                    (
                        $currentLevel != 0 ||
                        $player->getExperience() < 10
                    ) &&
                    $nextLevel == 0
                ) {
                    $levelReward += $levelSetting['RewardSoftCurrency'];
                } elseif (
                    $currentLevel != 0 &&
                    $nextLevel != 0
                ) {
                    break;
                }
            }

            $player->addSoftCurrency($levelReward);
            $player->setExperience($experience);
            $this->entityManager->flush();
        }
    }
}
