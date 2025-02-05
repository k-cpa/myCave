<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250205103545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bottles_grapes (bottles_id INT NOT NULL, grapes_id INT NOT NULL, INDEX IDX_465F42F54B11BD50 (bottles_id), INDEX IDX_465F42F5A7C5CFD3 (grapes_id), PRIMARY KEY(bottles_id, grapes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bottles_grapes ADD CONSTRAINT FK_465F42F54B11BD50 FOREIGN KEY (bottles_id) REFERENCES bottles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bottles_grapes ADD CONSTRAINT FK_465F42F5A7C5CFD3 FOREIGN KEY (grapes_id) REFERENCES grapes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bottles DROP FOREIGN KEY FK_A3C3D9A7C5CFD3');
        $this->addSql('DROP INDEX IDX_A3C3D9A7C5CFD3 ON bottles');
        $this->addSql('ALTER TABLE bottles DROP grapes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottles_grapes DROP FOREIGN KEY FK_465F42F54B11BD50');
        $this->addSql('ALTER TABLE bottles_grapes DROP FOREIGN KEY FK_465F42F5A7C5CFD3');
        $this->addSql('DROP TABLE bottles_grapes');
        $this->addSql('ALTER TABLE bottles ADD grapes_id INT NOT NULL');
        $this->addSql('ALTER TABLE bottles ADD CONSTRAINT FK_A3C3D9A7C5CFD3 FOREIGN KEY (grapes_id) REFERENCES grapes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A3C3D9A7C5CFD3 ON bottles (grapes_id)');
    }
}
