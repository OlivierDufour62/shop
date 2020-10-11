<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011210326 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stickers ADD products_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stickers ADD CONSTRAINT FK_D88DAC166C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_D88DAC166C8A81A9 ON stickers (products_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stickers DROP FOREIGN KEY FK_D88DAC166C8A81A9');
        $this->addSql('DROP INDEX IDX_D88DAC166C8A81A9 ON stickers');
        $this->addSql('ALTER TABLE stickers DROP products_id');
    }
}
