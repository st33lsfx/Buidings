<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230212195145 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, building_id INT DEFAULT NULL, person_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, cold_water_status DOUBLE PRECISION DEFAULT NULL, hot_water_status DOUBLE PRECISION DEFAULT NULL, gas_meter_status DOUBLE PRECISION DEFAULT NULL, meter_status DOUBLE PRECISION DEFAULT NULL, INDEX IDX_7745248E4D2A7E12 (building_id), UNIQUE INDEX UNIQ_7745248E217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, description_number INT NOT NULL, post_zip INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone INT DEFAULT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_7745248E4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_7745248E217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_7745248E4D2A7E12');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_7745248E217BBB47');
        $this->addSql('DROP TABLE apartment');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE person');
    }
}
