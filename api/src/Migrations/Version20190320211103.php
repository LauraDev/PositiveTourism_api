<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190320211103 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, address VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, map_url CLOB NOT NULL, phone VARCHAR(255) DEFAULT NULL, postcode VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE full_day_program (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_id INTEGER NOT NULL, description CLOB NOT NULL, note CLOB DEFAULT NULL, included CLOB DEFAULT NULL --(DC2Type:simple_array)
        , excluded CLOB DEFAULT NULL --(DC2Type:simple_array)
        )');
        $this->addSql('CREATE INDEX IDX_CE91C52715ED8D43 ON full_day_program (tour_id)');
        $this->addSql('CREATE TABLE pictures (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, tour_id INTEGER NOT NULL, img VARCHAR(255) NOT NULL, alt VARCHAR(255) DEFAULT NULL, text CLOB DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_8F7C2FC015ED8D43 ON pictures (tour_id)');
        $this->addSql('CREATE TABLE tour (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, contact_id INTEGER NOT NULL, client_benefits CLOB DEFAULT NULL, community_benefits CLOB DEFAULT NULL, description CLOB NOT NULL, duration VARCHAR(255) NOT NULL, is_validated BOOLEAN NOT NULL, location VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, overview_image VARCHAR(255) NOT NULL, overview_title VARCHAR(255) DEFAULT NULL, overview_subtitle VARCHAR(255) DEFAULT NULL, price VARCHAR(255) DEFAULT NULL, volunteering VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AD1F969E7A1254A ON tour (contact_id)');
        $this->addSql('DROP TABLE greeting');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE greeting (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE full_day_program');
        $this->addSql('DROP TABLE pictures');
        $this->addSql('DROP TABLE tour');
    }
}
