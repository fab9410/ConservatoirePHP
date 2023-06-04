<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230604134903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prof ADD COLUMN instrument VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__prof AS SELECT id, nom, prenom, email, photo FROM prof');
        $this->addSql('DROP TABLE prof');
        $this->addSql('CREATE TABLE prof (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO prof (id, nom, prenom, email, photo) SELECT id, nom, prenom, email, photo FROM __temp__prof');
        $this->addSql('DROP TABLE __temp__prof');
    }
}
