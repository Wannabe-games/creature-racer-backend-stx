<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401205030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_referral_nft ADD order_id VARCHAR(70) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_referral_nft ALTER ref_code SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_67E6BE266066711F ON user_referral_nft (ref_code)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_67E6BE266066711F');
        $this->addSql('ALTER TABLE user_referral_nft DROP order_id');
        $this->addSql('ALTER TABLE user_referral_nft ALTER ref_code DROP NOT NULL');
    }
}
