<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230628105733 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract_log ADD status VARCHAR(50) NOT NULL');
        $this->addSql('CREATE INDEX IDX_27C2F8177C68921F ON contract_log (wallet)');
        $this->addSql('CREATE INDEX IDX_27C2F8177B00651C ON contract_log (status)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_27C2F8177C68921F');
        $this->addSql('DROP INDEX IDX_27C2F8177B00651C');
        $this->addSql('ALTER TABLE contract_log DROP status');
    }
}
