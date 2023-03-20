<?php
namespace App\Command;

use App\Common\Enum\SystemTypes;
use App\Common\Repository\Creature\CreatureLevelRepository;
use App\Common\Repository\SettingsRepository;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Creature\CreatureUpgrade;
use App\Entity\Settings;
use App\Enum\DefaultSettings;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RewriteLevelsPreferencesCommand extends Command
{
    public function __construct(
        private CreatureLevelRepository $creatureLevelRepository,
        private SettingsRepository $settingsRepository
    ) {
        parent::__construct();
    }

    protected static $defaultName = 'game:settings:update-levels';

    protected function configure()
    {
        $this->setDescription('Update levels in game setting');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = DefaultSettings::getSettings();

        $progressBar = new ProgressBar($output, count($data['Animals'])*21);
        $progressBar->start();
        $progressBar->setFormat('debug');

        foreach ($data['Animals'] as &$creature) {
            /** @var CreatureLevel $levelEntity */
            $levelEntity = $this->creatureLevelRepository->findOneBy([
                'level' => 0,
                'creatureType' => $creature['Type'],
                'upgradeType' => 'base',
            ]);

            $creature['PriceGold'] = $levelEntity->getPriceGold();
            $creature['PriceStacks'] = $levelEntity->getPriceStacks();
            $creature['PriceDollar'] = $levelEntity->getPriceDollar();
            $creature['DeliveryWaitingTime'] = $levelEntity->getDeliveryWaitingTime();
            $creature['DeliveryPriceStacks'] = $levelEntity->getDeliveryPriceStacks();

            /** @var CreatureUpgrade $upgradeChange */
            foreach ($levelEntity->getUpgradeChanges() as $upgradeChange) {
                switch ($upgradeChange->getName()) {
                    case 'acceleration':
                        $creature['EngineParams']['AccParam'] = $upgradeChange->getValue();
                        break;
                    case 'speed':
                        $creature['EngineParams']['SpeedParam'] = $upgradeChange->getValue();
                        break;
                    case 'gas_volume':
                        $creature['EngineParams']['BoostTime'] = $upgradeChange->getValue();
                        break;
                    case 'gas_pressure':
                        $creature['EngineParams']['BoostAccBonus'] = $upgradeChange->getValue();
                        break;
                }
            }
            $creature['EngineParams']['BoostSpeedBonus'] = 0;
            $progressBar->advance();

            foreach ($creature['Upgrades'] as &$upgrade) {
                foreach ($upgrade['UpgradeLevels'] as &$level) {
                    /** @var CreatureLevel $levelEntity */
                    $levelEntity = $this->creatureLevelRepository->findOneBy([
                        'level' => $level['Level'],
                        'creatureType' => $creature['Type'],
                        'upgradeType' => $upgrade['Type'],
                    ]);

                    $level['PriceGold'] = $levelEntity->getPriceGold();
                    $level['PriceStacks'] = $levelEntity->getPriceStacks();
                    $level['PriceDollar'] = $levelEntity->getPriceDollar();
                    $level['DeliveryWaitingTime'] = $levelEntity->getDeliveryWaitingTime();
                    $level['DeliveryPriceStacks'] = $levelEntity->getDeliveryPriceStacks();

                    foreach ($level['UpgradeChanges'] as &$change) {
                        /** @var CreatureUpgrade $upgradeChange */
                        foreach ($levelEntity->getUpgradeChanges() as $upgradeChange) {
                            if ($upgradeChange->getType() == $change['Type']) {
                                $change['Value'] = $upgradeChange->getValue();
                            }
                        }
                    }

                    $progressBar->advance();
                }
            }
        }
        $progressBar->finish();
        $output->writeln('');

        $settings = $this->settingsRepository->findOneBy([
            'systemType' => SystemTypes::GAME_SETTINGS
        ]);

        if (empty($settings)) {
            $settings = new Settings();
            $settings->setSystemType(SystemTypes::GAME_SETTINGS);
        }

        $settings->setValue([
            'type' => 'array',
            'value' => $data
        ]);

        $this->settingsRepository->save($settings);

        $output->writeln('Settings saved');

        return 0;
    }
}
