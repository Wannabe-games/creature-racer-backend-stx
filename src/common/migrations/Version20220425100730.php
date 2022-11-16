<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425100730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_crature_definitions ADD speed_min DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ADD acceleration_min DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ADD boost_time_min DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ADD boost_velocity_min DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ADD boost_acceleration_min DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_crature_definitions DROP speed_min');
        $this->addSql('ALTER TABLE game_crature_definitions DROP acceleration_min');
        $this->addSql('ALTER TABLE game_crature_definitions DROP boost_time_min');
        $this->addSql('ALTER TABLE game_crature_definitions DROP boost_velocity_min');
        $this->addSql('ALTER TABLE game_crature_definitions DROP boost_acceleration_min');
    }
}
