<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251205163513 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD COLUMN gestation INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD COLUMN humeur_max INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD COLUMN humeur_min INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD COLUMN energie INTEGER DEFAULT NULL');
        $this->addSql('ALTER TABLE article ADD COLUMN image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__article AS SELECT id, title, content FROM article');
        $this->addSql('DROP TABLE article');
        $this->addSql('CREATE TABLE article (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content CLOB NOT NULL)');
        $this->addSql('INSERT INTO article (id, title, content) SELECT id, title, content FROM __temp__article');
        $this->addSql('DROP TABLE __temp__article');
    }
}
