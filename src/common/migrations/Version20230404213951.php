<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404213951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE game_creature_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE game_creature_user DROP CONSTRAINT FK_BDDB25AFA76ED395');
        $this->addSql('ALTER TABLE game_creature_user DROP contract_id');
        $this->addSql('ALTER TABLE game_creature_user ALTER user_id DROP NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD CONSTRAINT FK_BDDB25AFA76ED395 FOREIGN KEY (user_id) REFERENCES user_accounts (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_creature_user_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 100 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE game_creature_user DROP CONSTRAINT fk_bddb25afa76ed395');
        $this->addSql('ALTER TABLE game_creature_user ADD contract_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user ALTER user_id SET NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD CONSTRAINT fk_bddb25afa76ed395 FOREIGN KEY (user_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
