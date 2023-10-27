<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231027075439 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1FA76E495B');
        $this->addSql('DROP INDEX IDX_A60C9F1FA76E495B ON livraison');
        $this->addSql('ALTER TABLE livraison DROP livraison_inclut_id');
        $this->addSql('ALTER TABLE livraison_inclut ADD produit_id INT NOT NULL, ADD livraison_id INT NOT NULL');
        $this->addSql('ALTER TABLE livraison_inclut ADD CONSTRAINT FK_FC2060C8F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE livraison_inclut ADD CONSTRAINT FK_FC2060C88E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('CREATE INDEX IDX_FC2060C8F347EFB ON livraison_inclut (produit_id)');
        $this->addSql('CREATE INDEX IDX_FC2060C88E54FB25 ON livraison_inclut (livraison_id)');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27A76E495B');
        $this->addSql('DROP INDEX IDX_29A5EC27A76E495B ON produit');
        $this->addSql('ALTER TABLE produit DROP livraison_inclut_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livraison_inclut DROP FOREIGN KEY FK_FC2060C8F347EFB');
        $this->addSql('ALTER TABLE livraison_inclut DROP FOREIGN KEY FK_FC2060C88E54FB25');
        $this->addSql('DROP INDEX IDX_FC2060C8F347EFB ON livraison_inclut');
        $this->addSql('DROP INDEX IDX_FC2060C88E54FB25 ON livraison_inclut');
        $this->addSql('ALTER TABLE livraison_inclut DROP produit_id, DROP livraison_id');
        $this->addSql('ALTER TABLE produit ADD livraison_inclut_id INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27A76E495B FOREIGN KEY (livraison_inclut_id) REFERENCES livraison_inclut (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27A76E495B ON produit (livraison_inclut_id)');
        $this->addSql('ALTER TABLE livraison ADD livraison_inclut_id INT NOT NULL');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1FA76E495B FOREIGN KEY (livraison_inclut_id) REFERENCES livraison_inclut (id)');
        $this->addSql('CREATE INDEX IDX_A60C9F1FA76E495B ON livraison (livraison_inclut_id)');
    }
}
