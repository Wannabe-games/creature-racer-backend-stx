<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315115523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_lobby ADD host_payment_id VARCHAR(32) DEFAULT NULL');
        $this->addSql('ALTER TABLE game_lobby ADD host_race_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE game_lobby ADD opponent_payment_id VARCHAR(32) DEFAULT NULL');
        $this->addSql('ALTER TABLE game_lobby ADD opponent_race_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE game_lobby ADD winner_withdraw_id VARCHAR(32) DEFAULT NULL');
        $this->addSql('ALTER TABLE game_lobby DROP status');
        $this->addSql('COMMENT ON COLUMN game_lobby.host_race_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN game_lobby.opponent_race_id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE game_lobby ADD status VARCHAR(15) NOT NULL');
        $this->addSql('ALTER TABLE game_lobby DROP host_payment_id');
        $this->addSql('ALTER TABLE game_lobby DROP host_race_id');
        $this->addSql('ALTER TABLE game_lobby DROP opponent_payment_id');
        $this->addSql('ALTER TABLE game_lobby DROP opponent_race_id');
        $this->addSql('ALTER TABLE game_lobby DROP winner_withdraw_id');
    }
}
