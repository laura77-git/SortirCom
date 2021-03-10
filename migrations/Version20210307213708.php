<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307213708 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE outing ADD CONSTRAINT FK_F2A1062564D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('CREATE INDEX IDX_F2A1062564D218E ON outing (location_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing DROP FOREIGN KEY FK_F2A1062564D218E');
        $this->addSql('DROP INDEX IDX_F2A1062564D218E ON outing');
        $this->addSql('ALTER TABLE outing DROP location_id');
    }
}
