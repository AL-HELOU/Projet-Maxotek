<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231027074946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison ADD livraison_inclut_id INT NOT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FA76E495B FOREIGN KEY (livraison_inclut_id) REFERENCES livraison_inclut (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1FA76E495B ON livraison (livraison_inclut_id)');
        $this->addSql('ALTER TABLE livraison_inclut DROP FOREIGN KEY FK_FC2060C88E54FB25');
        $this->addSql('DROP INDEX UNIQ_FC2060C88E54FB25 ON livraison_inclut');
        $this->addSql('ALTER TABLE livraison_inclut DROP livraison_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison_inclut ADD livraison_id INT NOT NULL');
        $this->addSql('ALTER TABLE livraison_inclut ADD CONSTRAINT FK_FC2060C88E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FC2060C88E54FB25 ON livraison_inclut (livraison_id)');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FA76E495B');
        $this->addSql('DROP INDEX IDX_A60C9F1FA76E495B ON livraison');
        $this->addSql('ALTER TABLE livraison DROP livraison_inclut_id');
    }
}
