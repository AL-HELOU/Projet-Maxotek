<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231027074105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, admin_nom VARCHAR(50) NOT NULL, admin_prenom VARCHAR(50) NOT NULL, email VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_32EB52E8E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, adresse VARCHAR(255) NOT NULL, adresse_ville VARCHAR(50) NOT NULL, adresse_cp VARCHAR(5) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, sous_categ_id INT NOT NULL, categ_libelle VARCHAR(50) NOT NULL, categ_photo LONGBLOB NOT NULL, INDEX IDX_497DD634E0596F47 (sous_categ_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, com_adresse_id INT NOT NULL, com_paiement_id INT NOT NULL, com_user_id INT NOT NULL, com_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', com_statut VARCHAR(50) NOT NULL, INDEX IDX_6EEAA67DFB522C70 (com_adresse_id), INDEX IDX_6EEAA67D18229D6B (com_paiement_id), INDEX IDX_6EEAA67D9975955A (com_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (id INT AUTO_INCREMENT NOT NULL, commerc_nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facturation (id INT AUTO_INCREMENT NOT NULL, facture_adresse_id INT NOT NULL, facture_com_id INT NOT NULL, facture_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', INDEX IDX_17EB513AA7F83358 (facture_adresse_id), UNIQUE INDEX UNIQ_17EB513A211B1D90 (facture_com_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, fournis_adresse_id INT NOT NULL, fournis_pays_id INT NOT NULL, fournis_nom VARCHAR(50) NOT NULL, fournis_tel VARCHAR(20) NOT NULL, fournis_email VARCHAR(100) NOT NULL, INDEX IDX_369ECA32E8F11EA2 (fournis_adresse_id), INDEX IDX_369ECA3253046811 (fournis_pays_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, ligcom_produit_id INT NOT NULL, ligcom_com_id INT NOT NULL, ligcom_quantite INT NOT NULL, ligcom_prixunitaire NUMERIC(10, 2) NOT NULL, INDEX IDX_3170B74B7A2DF052 (ligcom_produit_id), INDEX IDX_3170B74BB51E83A3 (ligcom_com_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, livraison_com_id INT NOT NULL, livraison_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', livraison_livreur VARCHAR(50) NOT NULL, INDEX IDX_A60C9F1F5DE90BDD (livraison_com_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison_inclut (id INT AUTO_INCREMENT NOT NULL, livraison_id INT NOT NULL, quantite INT NOT NULL, UNIQUE INDEX UNIQ_FC2060C88E54FB25 (livraison_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mode_paiement (id INT AUTO_INCREMENT NOT NULL, paiement_libelle VARCHAR(50) NOT NULL, paiement_statut VARCHAR(50) NOT NULL, paiement_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, pays_nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, produit_categ_id INT NOT NULL, produit_fournis_id INT NOT NULL, livraison_inclut_id INT NOT NULL, produit_libelle VARCHAR(50) NOT NULL, produit_descrip LONGTEXT NOT NULL, produit_prixachat DOUBLE PRECISION NOT NULL, produit_prixht DOUBLE PRECISION NOT NULL, produit_photo LONGBLOB NOT NULL, produit_stock INT NOT NULL, produit_active TINYINT(1) NOT NULL, INDEX IDX_29A5EC27C1086901 (produit_categ_id), INDEX IDX_29A5EC27CC805D89 (produit_fournis_id), INDEX IDX_29A5EC27A76E495B (livraison_inclut_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, user_adresse_id INT NOT NULL, user_pays_id INT NOT NULL, user_commerc_id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, user_nom VARCHAR(50) NOT NULL, user_prenom VARCHAR(50) NOT NULL, user_sexe VARCHAR(1) NOT NULL, user_tel VARCHAR(20) NOT NULL, user_type VARCHAR(30) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), INDEX IDX_8D93D649EA801AB0 (user_adresse_id), INDEX IDX_8D93D649FEE95C4E (user_pays_id), INDEX IDX_8D93D64937D0AE5A (user_commerc_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634E0596F47 FOREIGN KEY (sous_categ_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DFB522C70 FOREIGN KEY (com_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D18229D6B FOREIGN KEY (com_paiement_id) REFERENCES mode_paiement (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D9975955A FOREIGN KEY (com_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513AA7F83358 FOREIGN KEY (facture_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE facturation ADD CONSTRAINT FK_17EB513A211B1D90 FOREIGN KEY (facture_com_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32E8F11EA2 FOREIGN KEY (fournis_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA3253046811 FOREIGN KEY (fournis_pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B7A2DF052 FOREIGN KEY (ligcom_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BB51E83A3 FOREIGN KEY (ligcom_com_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE livraison ADD CONSTRAINT FK_A60C9F1F5DE90BDD FOREIGN KEY (livraison_com_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE livraison_inclut ADD CONSTRAINT FK_FC2060C88E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C1086901 FOREIGN KEY (produit_categ_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27CC805D89 FOREIGN KEY (produit_fournis_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27A76E495B FOREIGN KEY (livraison_inclut_id) REFERENCES livraison_inclut (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649EA801AB0 FOREIGN KEY (user_adresse_id) REFERENCES adresse (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FEE95C4E FOREIGN KEY (user_pays_id) REFERENCES pays (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64937D0AE5A FOREIGN KEY (user_commerc_id) REFERENCES commercial (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634E0596F47');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DFB522C70');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D18229D6B');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D9975955A');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513AA7F83358');
        $this->addSql('ALTER TABLE facturation DROP FOREIGN KEY FK_17EB513A211B1D90');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32E8F11EA2');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA3253046811');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B7A2DF052');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BB51E83A3');
        $this->addSql('ALTER TABLE livraison DROP FOREIGN KEY FK_A60C9F1F5DE90BDD');
        $this->addSql('ALTER TABLE livraison_inclut DROP FOREIGN KEY FK_FC2060C88E54FB25');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C1086901');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27CC805D89');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27A76E495B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649EA801AB0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FEE95C4E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64937D0AE5A');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE facturation');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE ligne_commande');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE livraison_inclut');
        $this->addSql('DROP TABLE mode_paiement');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
