<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208140646 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER SEQUENCE contract_id_seq INCREMENT BY 100');
        $this->addSql('DROP SEQUENCE game_creature_user_id_seq CASCADE');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER created_at SET NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ALTER skin_color SET NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ALTER is_stacked DROP DEFAULT');
        $this->addSql('ALTER TABLE game_player ALTER experience SET NOT NULL');
        $this->addSql('ALTER TABLE user_accounts ADD public_key VARCHAR(130) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER SEQUENCE contract_id_seq INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE game_creature_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE user_accounts DROP public_key');
        $this->addSql('ALTER TABLE game_player ALTER experience DROP NOT NULL');
        $this->addSql('ALTER TABLE game_creature_user ALTER is_stacked SET DEFAULT false');
        $this->addSql('ALTER TABLE game_creature_user ALTER skin_color DROP NOT NULL');
        $this->addSql('ALTER TABLE game_crature_definitions ALTER created_at DROP NOT NULL');
    }
}
