<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230214200228 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, building_id INT DEFAULT NULL, person_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, size INT DEFAULT NULL, cold_water_status DOUBLE PRECISION DEFAULT NULL, hot_water_status DOUBLE PRECISION DEFAULT NULL, gas_meter_status DOUBLE PRECISION DEFAULT NULL, meter_status DOUBLE PRECISION DEFAULT NULL, INDEX IDX_4D7E68544D2A7E12 (building_id), UNIQUE INDEX UNIQ_4D7E6854217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E68544D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E6854217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_7745248E217BBB47');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_7745248E4D2A7E12');
        $this->addSql('DROP TABLE apartment');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, building_id INT DEFAULT NULL, person_id INT DEFAULT NULL, title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, size INT DEFAULT NULL, cold_water_status DOUBLE PRECISION DEFAULT NULL, hot_water_status DOUBLE PRECISION DEFAULT NULL, gas_meter_status DOUBLE PRECISION DEFAULT NULL, meter_status DOUBLE PRECISION DEFAULT NULL, UNIQUE INDEX UNIQ_7745248E217BBB47 (person_id), INDEX IDX_7745248E4D2A7E12 (building_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_7745248E217BBB47 FOREIGN KEY (person_id) REFERENCES person (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_7745248E4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E68544D2A7E12');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E6854217BBB47');
        $this->addSql('DROP TABLE apartment');
    }
}
