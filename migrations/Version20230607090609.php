<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230607090609 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE louer (id INT AUTO_INCREMENT NOT NULL, appartement_id INT NOT NULL, saison_id INT NOT NULL, prix_semaine VARCHAR(255) NOT NULL, nombre_semaines VARCHAR(255) NOT NULL, date_debut_location VARCHAR(255) NOT NULL, INDEX IDX_D1EAF4DE1729BBA (appartement_id), INDEX IDX_D1EAF4DF965414C (saison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE saison (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, date_debut VARCHAR(255) NOT NULL, date_fin VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE louer ADD CONSTRAINT FK_D1EAF4DE1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id)');
        $this->addSql('ALTER TABLE louer ADD CONSTRAINT FK_D1EAF4DF965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE louer DROP FOREIGN KEY FK_D1EAF4DE1729BBA');
        $this->addSql('ALTER TABLE louer DROP FOREIGN KEY FK_D1EAF4DF965414C');
        $this->addSql('DROP TABLE louer');
        $this->addSql('DROP TABLE saison');
    }
}
