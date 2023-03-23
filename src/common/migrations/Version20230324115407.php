<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230324115407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_lobby_id_seq CASCADE');
        $this->addSql('DROP TABLE game_lobby');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE game_lobby_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game_lobby (id INT NOT NULL, host_id INT NOT NULL, opponent_id INT DEFAULT NULL, winner_id INT DEFAULT NULL, uuid UUID NOT NULL, bet_amount INT DEFAULT 0 NOT NULL, timeleft TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, host_payment_id VARCHAR(32) DEFAULT NULL, opponent_payment_id VARCHAR(32) DEFAULT NULL, winner_withdraw_id VARCHAR(32) DEFAULT NULL, host_race_id UUID DEFAULT NULL, opponent_race_id UUID DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_fed72c787f656cdc ON game_lobby (opponent_id)');
        $this->addSql('CREATE INDEX idx_fed72c781fb8d185 ON game_lobby (host_id)');
        $this->addSql('CREATE INDEX idx_fed72c785dfcd4b8 ON game_lobby (winner_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_fed72c78d17f50a6 ON game_lobby (uuid)');
        $this->addSql('COMMENT ON COLUMN game_lobby.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN game_lobby.host_race_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN game_lobby.opponent_race_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT fk_fed72c781fb8d185 FOREIGN KEY (host_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT fk_fed72c787f656cdc FOREIGN KEY (opponent_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT fk_fed72c785dfcd4b8 FOREIGN KEY (winner_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
