<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Enum\CreatureLevelChangesTypes;
use App\Enum\DefaultSettings;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220223113455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $data = json_decode(DefaultSettings::SETTINGS, true);

        $this->addSql('ALTER SEQUENCE IF EXISTS game_crature_definitions_id_seq RESTART WITH 1;');
        $this->addSql('ALTER SEQUENCE IF EXISTS game_crature_level_definitions_id_seq RESTART WITH 1;');
        $this->addSql('ALTER SEQUENCE IF EXISTS game_creature_upgrade_changes_definitions_id_seq RESTART WITH 1;');

        $indexLevel = count($data['Animals']);
        $indexChange = 0;
        foreach ($data['Animals'] as $key => $creature) {
            $this->addSql('insert into game_crature_definitions (
                                      id, name, type, tier, muscles_max, lungs_max, heart_max, belly_max, buttocks_max,
                                      speed_max, acceleration_max, boost_time_max, boost_velocity_max,
                                      boost_acceleration_max
                                      )
                                values (\''.++$key.'\', \''.$creature['Name'].'\', \''.$creature['Type'].'\', \''.$creature['TierIndex'].'\', 5, 5, 5, 5, 5, 0, 0, 0, 0, 0);'
            );
            $this->addSql('insert into game_crature_level_definitions (
                                            id, creature_type, upgrade_type, level, price_soft_currency,
                                            price_hard_currency, waiting_time, delivery_diamonds, creature_id)
                                values (\''.$key.'\', \''.$creature['Type'].'\', \'base\', 0, \''.$creature['PriceGold'].'\', \''.$creature['PriceStacks'].'\', \''.$creature['DeliveryWaitingTime'].'\', \''.$creature['DeliveryPriceStacks'].'\', \''.$key.'\');'
            );

            $this->addSql('insert into game_creature_upgrade_changes_definitions (id, creature_level_id, name, type, "value")
                                values (\'' . ++$indexChange . '\', \'' . $key . '\', \'acceleration\', 0, \'' . $creature['EngineParams']['AccParam'] . '\');');
            $this->addSql('insert into game_creature_upgrade_changes_definitions (id, creature_level_id, name, type, "value")
                                values (\'' . ++$indexChange . '\', \'' . $key . '\', \'speed\', 1, \'' . $creature['EngineParams']['SpeedParam'] . '\');');
            $this->addSql('insert into game_creature_upgrade_changes_definitions (id, creature_level_id, name, type, "value")
                                values (\'' . ++$indexChange . '\', \'' . $key . '\', \'gas_volume\', 4, \'' . $creature['EngineParams']['BoostTime'] + $creature['EngineParams']['BoostSpeedBonus'] . '\');');
            $this->addSql('insert into game_creature_upgrade_changes_definitions (id, creature_level_id, name, type, "value")
                                values (\'' . ++$indexChange . '\', \'' . $key . '\', \'gas_pressure\', 5, \'' . $creature['EngineParams']['BoostAccBonus'] . '\');');

            foreach ($creature['Upgrades'] as $upgrade) {
                foreach ($upgrade['UpgradeLevels'] as $level) {
                    $this->addSql('insert into game_crature_level_definitions (
                                            id, creature_type, upgrade_type, level, price_soft_currency,
                                            price_hard_currency, waiting_time, delivery_diamonds, creature_id)
                                values (\'' . ++$indexLevel . '\', \'' . $creature['Type'] . '\', \'' . $upgrade['Type'] . '\', \'' . $level['Level'] . '\', \'' . $level['PriceGold'] . '\', \'' . $level['PriceStacks'] . '\', \'' . $level['DeliveryWaitingTime'] . '\', \'' . $level['DeliveryPriceStacks'] . '\', \'' . $key . '\');'
                    );

                    foreach ($level['UpgradeChanges'] as $change) {
                        $this->addSql('insert into game_creature_upgrade_changes_definitions (id, creature_level_id, name, type, "value")
                                values (\'' . ++$indexChange . '\', \'' . $indexLevel . '\', \''.CreatureLevelChangesTypes::getName($change['Type']).'\', ' . $change['Type'] . ', \'' . $change['Value'] . '\');');
                    }
                }
            }
        }
        $this->addSql('ALTER SEQUENCE IF EXISTS game_crature_definitions_id_seq RESTART WITH '.$key.';');
        $this->addSql('ALTER SEQUENCE IF EXISTS game_crature_level_definitions_id_seq RESTART WITH '.$indexLevel.';');
        $this->addSql('ALTER SEQUENCE IF EXISTS game_creature_upgrade_changes_definitions_id_seq RESTART WITH '.$indexChange.';');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
