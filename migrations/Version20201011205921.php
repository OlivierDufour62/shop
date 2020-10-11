<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011205921 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stickers ADD stickers_categories_id INT NOT NULL');
        $this->addSql('ALTER TABLE stickers ADD CONSTRAINT FK_D88DAC16516893AA FOREIGN KEY (stickers_categories_id) REFERENCES stickers_categories (id)');
        $this->addSql('CREATE INDEX IDX_D88DAC16516893AA ON stickers (stickers_categories_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stickers DROP FOREIGN KEY FK_D88DAC16516893AA');
        $this->addSql('DROP INDEX IDX_D88DAC16516893AA ON stickers');
        $this->addSql('ALTER TABLE stickers DROP stickers_categories_id');
    }
}
