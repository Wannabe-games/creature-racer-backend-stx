<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329233624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_crature_definitions RENAME COLUMN cohorts TO cohort');
        $this->addSql('ALTER TABLE user_accounts ADD ref_code VARCHAR(150) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_accounts ADD r_nft_id VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_accounts DROP ref_code');
        $this->addSql('ALTER TABLE user_accounts DROP r_nft_id');
        $this->addSql('ALTER TABLE game_crature_definitions RENAME COLUMN cohort TO cohorts');
    }
}
