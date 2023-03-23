<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324122755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_lobby (id UUID NOT NULL, host_id INT NOT NULL, opponent_id INT DEFAULT NULL, winner_id INT DEFAULT NULL, host_payment_id VARCHAR(32) DEFAULT NULL, opponent_payment_id VARCHAR(32) DEFAULT NULL, winner_withdraw_id VARCHAR(32) DEFAULT NULL, bet_amount INT DEFAULT 0 NOT NULL, timeleft TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FED72C781FB8D185 ON game_lobby (host_id)');
        $this->addSql('CREATE INDEX IDX_FED72C787F656CDC ON game_lobby (opponent_id)');
        $this->addSql('CREATE INDEX IDX_FED72C785DFCD4B8 ON game_lobby (winner_id)');
        $this->addSql('COMMENT ON COLUMN game_lobby.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE game_race (id UUID NOT NULL, creature_user_id INT NOT NULL, lobby_id UUID DEFAULT NULL, score INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, finished_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_317AD7837386C377 ON game_race (creature_user_id)');
        $this->addSql('CREATE INDEX IDX_317AD783B6612FD9 ON game_race (lobby_id)');
        $this->addSql('COMMENT ON COLUMN game_race.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN game_race.lobby_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT FK_FED72C781FB8D185 FOREIGN KEY (host_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT FK_FED72C787F656CDC FOREIGN KEY (opponent_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT FK_FED72C785DFCD4B8 FOREIGN KEY (winner_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_race ADD CONSTRAINT FK_317AD7837386C377 FOREIGN KEY (creature_user_id) REFERENCES game_creature_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_race ADD CONSTRAINT FK_317AD783B6612FD9 FOREIGN KEY (lobby_id) REFERENCES game_lobby (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_race DROP CONSTRAINT FK_317AD783B6612FD9');
        $this->addSql('DROP TABLE game_lobby');
        $this->addSql('DROP TABLE game_race');
    }
}
