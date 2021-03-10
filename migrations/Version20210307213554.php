<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210307213554 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing ADD state_id INT NOT NULL');
        $this->addSql('ALTER TABLE outing ADD CONSTRAINT FK_F2A106255D83CC1 FOREIGN KEY (state_id) REFERENCES state (id)');
        $this->addSql('CREATE INDEX IDX_F2A106255D83CC1 ON outing (state_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE outing DROP FOREIGN KEY FK_F2A106255D83CC1');
        $this->addSql('DROP INDEX IDX_F2A106255D83CC1 ON outing');
        $this->addSql('ALTER TABLE outing DROP state_id');
    }
}
