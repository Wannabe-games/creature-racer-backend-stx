<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230511130552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract_log ADD events JSON DEFAULT \'[]\' NOT NULL');
        $this->addSql('ALTER TABLE contract_log ALTER post_conditions SET DEFAULT \'[]\'');
        $this->addSql('ALTER TABLE contract_log ALTER contract_function_args SET DEFAULT \'[]\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contract_log DROP events');
        $this->addSql('ALTER TABLE contract_log ALTER post_conditions DROP DEFAULT');
        $this->addSql('ALTER TABLE contract_log ALTER contract_function_args DROP DEFAULT');
    }
}
