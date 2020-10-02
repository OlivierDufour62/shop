<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200922203027 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ADD address_id_id INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE48E1E977 FOREIGN KEY (address_id_id) REFERENCES addresses (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE48E1E977 ON orders (address_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE48E1E977');
        $this->addSql('DROP INDEX IDX_E52FFDEE48E1E977 ON orders');
        $this->addSql('ALTER TABLE orders DROP address_id_id');
    }
}
