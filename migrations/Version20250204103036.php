<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250204103036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE regions');
        $this->addSql('ALTER TABLE bottles ADD countries_id INT NOT NULL, ADD grapes_id INT NOT NULL');
        $this->addSql('ALTER TABLE bottles ADD CONSTRAINT FK_A3C3D9AEBAE514 FOREIGN KEY (countries_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE bottles ADD CONSTRAINT FK_A3C3D9A7C5CFD3 FOREIGN KEY (grapes_id) REFERENCES grapes (id)');
        $this->addSql('CREATE INDEX IDX_A3C3D9AEBAE514 ON bottles (countries_id)');
        $this->addSql('CREATE INDEX IDX_A3C3D9A7C5CFD3 ON bottles (grapes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bottles DROP FOREIGN KEY FK_A3C3D9AEBAE514');
        $this->addSql('ALTER TABLE bottles DROP FOREIGN KEY FK_A3C3D9A7C5CFD3');
        $this->addSql('DROP INDEX IDX_A3C3D9AEBAE514 ON bottles');
        $this->addSql('DROP INDEX IDX_A3C3D9A7C5CFD3 ON bottles');
        $this->addSql('ALTER TABLE bottles DROP countries_id, DROP grapes_id');
    }
}
