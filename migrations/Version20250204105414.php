<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250204105414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_A26779F3F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE regions ADD CONSTRAINT FK_A26779F3F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE bottles DROP FOREIGN KEY FK_A3C3D9AEBAE514');
        $this->addSql('DROP INDEX IDX_A3C3D9AEBAE514 ON bottles');
        $this->addSql('ALTER TABLE bottles DROP countries_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE regions DROP FOREIGN KEY FK_A26779F3F92F3E70');
        $this->addSql('DROP TABLE regions');
        $this->addSql('ALTER TABLE bottles ADD countries_id INT NOT NULL');
        $this->addSql('ALTER TABLE bottles ADD CONSTRAINT FK_A3C3D9AEBAE514 FOREIGN KEY (countries_id) REFERENCES countries (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A3C3D9AEBAE514 ON bottles (countries_id)');
    }
}
