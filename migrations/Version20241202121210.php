<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241202121210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajout de numéro d\'annonce';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce CHANGE numero_annonce numero_annonce VARCHAR(13) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F65593E530018D44 ON annonce (numero_annonce)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_F65593E530018D44 ON annonce');
        $this->addSql('ALTER TABLE annonce CHANGE numero_annonce numero_annonce VARCHAR(255) NOT NULL');
    }
}
