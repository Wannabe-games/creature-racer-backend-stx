<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220224230407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_creature_user ADD upgrade_muscles_end TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD upgrade_lungs_end TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD upgrade_heart_end TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD upgrade_belly_end TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD upgrade_buttocks_end TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user DROP upgrade_end');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE game_creature_user ADD upgrade_end TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user DROP upgrade_muscles_end');
        $this->addSql('ALTER TABLE game_creature_user DROP upgrade_lungs_end');
        $this->addSql('ALTER TABLE game_creature_user DROP upgrade_heart_end');
        $this->addSql('ALTER TABLE game_creature_user DROP upgrade_belly_end');
        $this->addSql('ALTER TABLE game_creature_user DROP upgrade_buttocks_end');
    }
}
