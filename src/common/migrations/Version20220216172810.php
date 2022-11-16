<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220216172810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE refresh_tokens_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_accounts_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE refresh_tokens (id INT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BACE7E1C74F2195 ON refresh_tokens (refresh_token)');
        $this->addSql('CREATE TABLE user_accounts (id INT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, email VARCHAR(180) NOT NULL, enabled BOOLEAN NOT NULL, salt VARCHAR(255) DEFAULT NULL, last_login TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2A457AAC92FC23A8 ON user_accounts (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2A457AACA0D96FBF ON user_accounts (email_canonical)');
        $this->addSql('COMMENT ON COLUMN user_accounts.roles IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE user_users_groups (user_id INT NOT NULL, group_id INT NOT NULL, PRIMARY KEY(user_id, group_id))');
        $this->addSql('CREATE INDEX IDX_7F46CBE2A76ED395 ON user_users_groups (user_id)');
        $this->addSql('CREATE INDEX IDX_7F46CBE2FE54D947 ON user_users_groups (group_id)');
        $this->addSql('CREATE TABLE user_groups (id INT NOT NULL, name VARCHAR(180) NOT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN user_groups.roles IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE user_users_groups ADD CONSTRAINT FK_7F46CBE2A76ED395 FOREIGN KEY (user_id) REFERENCES user_accounts (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_users_groups ADD CONSTRAINT FK_7F46CBE2FE54D947 FOREIGN KEY (group_id) REFERENCES user_groups (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_users_groups DROP CONSTRAINT FK_7F46CBE2A76ED395');
        $this->addSql('ALTER TABLE user_users_groups DROP CONSTRAINT FK_7F46CBE2FE54D947');
        $this->addSql('DROP SEQUENCE refresh_tokens_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_accounts_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_groups_id_seq CASCADE');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('DROP TABLE user_accounts');
        $this->addSql('DROP TABLE user_users_groups');
        $this->addSql('DROP TABLE user_groups');
    }
}
