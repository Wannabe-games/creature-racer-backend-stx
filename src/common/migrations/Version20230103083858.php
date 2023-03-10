<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230103083858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD delivery_waiting_time INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD delivery_price_stacks INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP waiting_time');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP delivery_diamonds');
        $this->addSql('ALTER TABLE user_accounts ALTER created_at SET DEFAULT CURRENT_TIMESTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_accounts ALTER created_at DROP DEFAULT');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD waiting_time INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions ADD delivery_diamonds INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP delivery_waiting_time');
        $this->addSql('ALTER TABLE game_crature_level_definitions DROP delivery_price_stacks');
    }
}
