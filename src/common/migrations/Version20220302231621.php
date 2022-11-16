<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220302231621 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE game_player_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game_player (id INT NOT NULL, user_id INT NOT NULL, soft_currency INT NOT NULL, hard_currency INT NOT NULL, energy INT NOT NULL, restore_start_time TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, additional_data TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E52CD7ADA76ED395 ON game_player (user_id)');
        $this->addSql('COMMENT ON COLUMN game_player.additional_data IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE game_player ADD CONSTRAINT FK_E52CD7ADA76ED395 FOREIGN KEY (user_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_player_id_seq CASCADE');
        $this->addSql('DROP TABLE game_player');
    }
}
