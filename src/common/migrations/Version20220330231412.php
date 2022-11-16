<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330231412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE user_referral_nft_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_referral_nft (id INT NOT NULL, owner_id INT DEFAULT NULL, ref_code VARCHAR(150) DEFAULT NULL, hash VARCHAR(255) DEFAULT NULL, r_nft_id VARCHAR(255) DEFAULT NULL, nft_expiry_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67E6BE267E3C61F9 ON user_referral_nft (owner_id)');
        $this->addSql('ALTER TABLE user_referral_nft ADD CONSTRAINT FK_67E6BE267E3C61F9 FOREIGN KEY (owner_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game_creature_user ADD nft_name VARCHAR(180) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_accounts ADD referral_nft_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user_accounts DROP ref_code');
        $this->addSql('ALTER TABLE user_accounts DROP r_nft_id');
        $this->addSql('ALTER TABLE user_accounts ADD CONSTRAINT FK_2A457AAC7B7257F1 FOREIGN KEY (referral_nft_id) REFERENCES user_referral_nft (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_2A457AAC7B7257F1 ON user_accounts (referral_nft_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_accounts DROP CONSTRAINT FK_2A457AAC7B7257F1');
        $this->addSql('DROP SEQUENCE user_referral_nft_id_seq CASCADE');
        $this->addSql('DROP TABLE user_referral_nft');
        $this->addSql('DROP INDEX IDX_2A457AAC7B7257F1');
        $this->addSql('ALTER TABLE user_accounts ADD ref_code VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_accounts ADD r_nft_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_accounts DROP referral_nft_id');
        $this->addSql('ALTER TABLE game_creature_user DROP royalties');
        $this->addSql('ALTER TABLE game_creature_user DROP nft_name');
    }
}
