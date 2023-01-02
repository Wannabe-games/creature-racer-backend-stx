<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230102104336 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_crature_definitions ALTER tier SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER muscles_max SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER lungs_max SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER heart_max SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER belly_max SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER buttocks_max SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_max SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_max SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_max SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_max SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_max SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_max SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_max SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_max SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_max SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_max SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_min SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_min SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_min SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_min SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_min SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_min SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_min SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_min SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_min SET DEFAULT \'0\'');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_min SET NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD price_gold INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD price_stacks INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP price_soft_currency');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP price_hard_currency');
        $this->addSql('ALTER TABLE game_crature_level_definitions ALTER level SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_level_definitions ALTER waiting_time SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_crature_level_definitions ALTER delivery_diamonds SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_creature_user ADD for_game BOOLEAN DEFAULT false NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD staked BOOLEAN DEFAULT false NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user DROP is_for_game');
        $this->addSql('ALTER TABLE game_creature_user DROP is_stacked');
        $this->addSql('ALTER TABLE game_creature_user ALTER muscles SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_creature_user ALTER lungs SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_creature_user ALTER heart SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_creature_user ALTER belly SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_creature_user ALTER buttocks SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_creature_user ALTER bonus SET DEFAULT false');
        $this->addSql('ALTER TABLE game_creature_user ALTER skin_color SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_player ADD gold INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_player ADD stacks INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_player DROP soft_currency');
        $this->addSql('ALTER TABLE game_player DROP hard_currency');
        $this->addSql('ALTER TABLE game_player ALTER energy SET DEFAULT 10');
        $this->addSql('ALTER TABLE game_player ALTER experience SET DEFAULT 0');
        $this->addSql('ALTER TABLE game_player ALTER max_score SET NOT NULL');
        $this->addSql('ALTER TABLE user_accounts ALTER enabled SET DEFAULT false');
        $this->addSql('ALTER TABLE user_accounts ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_accounts ALTER enabled DROP DEFAULT');
        $this->addSql('ALTER TABLE user_accounts ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD price_soft_currency INT NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD price_hard_currency INT NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP price_gold');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP price_stacks');
        $this->addSql('ALTER TABLE game_crature_level_definitions ALTER level DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_level_definitions ALTER waiting_time DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_level_definitions ALTER delivery_diamonds DROP DEFAULT');
        $this->addSql('ALTER TABLE game_player ADD soft_currency INT NOT NULL');
        $this->addSql('ALTER TABLE game_player ADD hard_currency INT NOT NULL');
        $this->addSql('ALTER TABLE game_player DROP gold');
        $this->addSql('ALTER TABLE game_player DROP stacks');
        $this->addSql('ALTER TABLE game_player ALTER energy DROP DEFAULT');
        $this->addSql('ALTER TABLE game_player ALTER experience DROP DEFAULT');
        $this->addSql('ALTER TABLE game_player ALTER max_score DROP NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD is_for_game BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD is_stacked BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user DROP for_game');
        $this->addSql('ALTER TABLE game_creature_user DROP staked');
        $this->addSql('ALTER TABLE game_creature_user ALTER muscles DROP DEFAULT');
        $this->addSql('ALTER TABLE game_creature_user ALTER lungs DROP DEFAULT');
        $this->addSql('ALTER TABLE game_creature_user ALTER heart DROP DEFAULT');
        $this->addSql('ALTER TABLE game_creature_user ALTER belly DROP DEFAULT');
        $this->addSql('ALTER TABLE game_creature_user ALTER buttocks DROP DEFAULT');
        $this->addSql('ALTER TABLE game_creature_user ALTER bonus DROP DEFAULT');
        $this->addSql('ALTER TABLE game_creature_user ALTER skin_color DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER tier DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER muscles_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER lungs_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER heart_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER belly_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER buttocks_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_max DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_max DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_max DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_max DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_max DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_max DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_min DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER speed_min DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_min DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER acceleration_min DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_min DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_time_min DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_min DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_velocity_min DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_min DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER boost_acceleration_min DROP NOT NULL');
    }
}
