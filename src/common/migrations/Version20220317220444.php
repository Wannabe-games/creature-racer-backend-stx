<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220317220444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_creature_user ADD is_stacked BOOLEAN NOT NULL DEFAULT FALSE');
        $this->addSql('ALTER TABLE game_creature_user ADD nft_expiry_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE game_creature_user ADD reward_pool DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_creature_user DROP is_stacked');
        $this->addSql('ALTER TABLE game_creature_user DROP nft_expiry_date');
        $this->addSql('ALTER TABLE game_creature_user DROP reward_pool');
    }
}
