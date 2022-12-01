<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221130152928 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE airport ADD town_id INT NOT NULL');
        $this->addSql('ALTER TABLE airport ADD CONSTRAINT FK_7E91F7C275E23604 FOREIGN KEY (town_id) REFERENCES town (id)');
        $this->addSql('CREATE INDEX IDX_7E91F7C275E23604 ON airport (town_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE airport DROP FOREIGN KEY FK_7E91F7C275E23604');
        $this->addSql('DROP INDEX IDX_7E91F7C275E23604 ON airport');
        $this->addSql('ALTER TABLE airport DROP town_id');
    }
}
