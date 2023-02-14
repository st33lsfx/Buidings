<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212122150 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE building CHANGE city city VARCHAR(255) NOT NULL, CHANGE description_number description_number INT NOT NULL, CHANGE post_zip post_zip INT NOT NULL, CHANGE address address VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE building CHANGE city city VARCHAR(255) DEFAULT NULL, CHANGE description_number description_number INT DEFAULT NULL, CHANGE post_zip post_zip INT DEFAULT NULL, CHANGE address address VARCHAR(255) DEFAULT NULL');
    }
}
