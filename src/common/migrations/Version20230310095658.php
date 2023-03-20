<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310095658 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE game_lobby_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game_lobby (id INT NOT NULL, host_id INT NOT NULL, opponent_id INT DEFAULT NULL, winner_id INT DEFAULT NULL, uuid UUID NOT NULL, bet_amount INT DEFAULT 0 NOT NULL, timeleft TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, status VARCHAR(15) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FED72C78D17F50A6 ON game_lobby (uuid)');
        $this->addSql('CREATE INDEX IDX_FED72C781FB8D185 ON game_lobby (host_id)');
        $this->addSql('CREATE INDEX IDX_FED72C787F656CDC ON game_lobby (opponent_id)');
        $this->addSql('CREATE INDEX IDX_FED72C785DFCD4B8 ON game_lobby (winner_id)');
        $this->addSql('COMMENT ON COLUMN game_lobby.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT FK_FED72C781FB8D185 FOREIGN KEY (host_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT FK_FED72C787F656CDC FOREIGN KEY (opponent_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_lobby ADD CONSTRAINT FK_FED72C785DFCD4B8 FOREIGN KEY (winner_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_lobby_id_seq CASCADE');
        $this->addSql('DROP TABLE game_lobby');
    }
}
