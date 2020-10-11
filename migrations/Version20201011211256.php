<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011211256 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE colours (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, importance INT NOT NULL, public_id VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products_colours (id INT AUTO_INCREMENT NOT NULL, colours_id INT NOT NULL, products_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_BC152284984D2C05 (colours_id), INDEX IDX_BC1522846C8A81A9 (products_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_colours ADD CONSTRAINT FK_BC152284984D2C05 FOREIGN KEY (colours_id) REFERENCES colours (id)');
        $this->addSql('ALTER TABLE products_colours ADD CONSTRAINT FK_BC1522846C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products_colours DROP FOREIGN KEY FK_BC152284984D2C05');
        $this->addSql('DROP TABLE colours');
        $this->addSql('DROP TABLE products_colours');
    }
}
