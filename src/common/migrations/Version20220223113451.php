<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220223113451 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE game_crature_definitions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE game_crature_level_definitions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE game_creature_upgrade_changes_definitions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE game_creature_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game_crature_definitions (id INT NOT NULL, name VARCHAR(180) NOT NULL, type VARCHAR(15) NOT NULL, tier INT NOT NULL, muscles_max INT NOT NULL, lungs_max INT NOT NULL, heart_max INT NOT NULL, belly_max INT NOT NULL, buttocks_max INT NOT NULL, speed_max DOUBLE PRECISION DEFAULT NULL, acceleration_max DOUBLE PRECISION DEFAULT NULL, boost_time_max DOUBLE PRECISION DEFAULT NULL, boost_velocity_max DOUBLE PRECISION DEFAULT NULL, boost_acceleration_max DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_414DD9625E237E06 ON game_crature_definitions (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_414DD9628CDE5729 ON game_crature_definitions (type)');
        $this->addSql('CREATE TABLE game_crature_level_definitions (id INT NOT NULL, creature_id INT NOT NULL, creature_type VARCHAR(15) NOT NULL, upgrade_type VARCHAR(15) NOT NULL, level INT NOT NULL, price_soft_currency INT NOT NULL, price_hard_currency INT NOT NULL, waiting_time INT NOT NULL, delivery_diamonds INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7B293E31F9AB048 ON game_crature_level_definitions (creature_id)');
        $this->addSql('CREATE TABLE game_creature_upgrade_changes_definitions (id INT NOT NULL, creature_level_id INT NOT NULL, name VARCHAR(180) NOT NULL, type VARCHAR(15) NOT NULL, value DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2808257C116120E3 ON game_creature_upgrade_changes_definitions (creature_level_id)');
        $this->addSql('CREATE TABLE game_creature_user (id INT NOT NULL, creature_id INT NOT NULL, user_id INT NOT NULL, uuid UUID NOT NULL, name VARCHAR(180) NOT NULL, contract_id INT DEFAULT NULL, muscles INT NOT NULL, lungs INT NOT NULL, heart INT NOT NULL, belly INT NOT NULL, buttocks INT NOT NULL, speed DOUBLE PRECISION DEFAULT NULL, acceleration DOUBLE PRECISION DEFAULT NULL, boost_time DOUBLE PRECISION DEFAULT NULL, boost_velocity DOUBLE PRECISION DEFAULT NULL, boost_acceleration DOUBLE PRECISION DEFAULT NULL, upgrade_end TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, is_for_game BOOLEAN NOT NULL, bonus BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDDB25AFD17F50A6 ON game_creature_user (uuid)');
        $this->addSql('CREATE INDEX IDX_BDDB25AFF9AB048 ON game_creature_user (creature_id)');
        $this->addSql('CREATE INDEX IDX_BDDB25AFA76ED395 ON game_creature_user (user_id)');
        $this->addSql('COMMENT ON COLUMN game_creature_user.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD CONSTRAINT FK_7B293E31F9AB048 FOREIGN KEY (creature_id) REFERENCES game_crature_definitions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_creature_upgrade_changes_definitions ADD CONSTRAINT FK_2808257C116120E3 FOREIGN KEY (creature_level_id) REFERENCES game_crature_level_definitions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_creature_user ADD CONSTRAINT FK_BDDB25AFF9AB048 FOREIGN KEY (creature_id) REFERENCES game_crature_definitions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_creature_user ADD CONSTRAINT FK_BDDB25AFA76ED395 FOREIGN KEY (user_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP CONSTRAINT FK_7B293E31F9AB048');
        $this->addSql('ALTER TABLE game_creature_user DROP CONSTRAINT FK_BDDB25AFF9AB048');
        $this->addSql('ALTER TABLE game_creature_upgrade_changes_definitions DROP CONSTRAINT FK_2808257C116120E3');
        $this->addSql('DROP SEQUENCE game_crature_definitions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE game_crature_level_definitions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE game_creature_upgrade_changes_definitions_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('DROP TABLE game_crature_definitions');
        $this->addSql('DROP TABLE game_crature_level_definitions');
        $this->addSql('DROP TABLE game_creature_upgrade_changes_definitions');
        $this->addSql('DROP TABLE game_creature_user');
    }
}
