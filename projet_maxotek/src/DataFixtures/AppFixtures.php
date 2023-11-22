<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use App\Entity\Adresse;
use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Commercial;
use App\Entity\Facturation;
use App\Entity\Fournisseur;
use App\Entity\LigneCommande;
use App\Entity\Livraison;
use App\Entity\LivraisonInclut;
use App\Entity\ModePaiement;
use App\Entity\Pays;
use App\Entity\Produit;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

//------------------------------------------------------------- Categories Fixtures--------------------------------------------------------------------------------
    
        $categorie1 = new Categorie();
        $categorie1->setCategLibelle('PC FIXE')
                  ->setCategPhoto('pcfixe.png');        
        $manager->persist($categorie1);      
        
        $categorie2 = new Categorie();
        $categorie2->setCategLibelle('PC PORTABLE')
                  ->setCategPhoto('pcportable.png');          
        $manager->persist($categorie2);
        
        $categorie3 = new Categorie();
        $categorie3->setCategLibelle('COMPOSANTS')
                  ->setCategPhoto('composants.png');          
        $manager->persist($categorie3);

        $categorie4 = new Categorie();
        $categorie4->setCategLibelle('GAMING ZONE')
                  ->setCategPhoto('gamingzone.jpg');          
        $manager->persist($categorie4);

        $categorie5 = new Categorie();
        $categorie5->setCategLibelle('COMPOSANTS PC')
                  ->setCategPhoto('composantspc.png');          
        $manager->persist($categorie5);

        $categorie6 = new Categorie();
        $categorie6->setCategLibelle('Ordinateur Maxotek')
                  ->setCategPhoto('ordmaxotek.png')
                  ->setCategPrincipId($categorie1);          
        $manager->persist($categorie6);

        $categorie7 = new Categorie();
        $categorie7->setCategLibelle('Ordinateur Bureautique')
                  ->setCategPhoto('ordibureau.png')
                  ->setCategPrincipId($categorie1);          
        $manager->persist($categorie7);

        $categorie8 = new Categorie();
        $categorie8->setCategLibelle('Ordinateur Gamer')
                  ->setCategPhoto('ordigamer.png')
                  ->setCategPrincipId($categorie1);          
        $manager->persist($categorie8);

        $categorie9 = new Categorie();
        $categorie9->setCategLibelle('Portable Bureautique')
                  ->setCategPhoto('portbureau.png')
                  ->setCategPrincipId($categorie2);          
        $manager->persist($categorie9);

        $categorie10 = new Categorie();
        $categorie10->setCategLibelle('Portable Multimédia')
                  ->setCategPhoto('portmulti.png')
                  ->setCategPrincipId($categorie2);          
        $manager->persist($categorie10);

        $categorie11 = new Categorie();
        $categorie11->setCategLibelle('Portable Gamer')
                  ->setCategPhoto('portgamer.png')
                  ->setCategPrincipId($categorie2);          
        $manager->persist($categorie11);

        $categorie12 = new Categorie();
        $categorie12->setCategLibelle('Carte mère')
                  ->setCategPhoto('cartemere.png')
                  ->setCategPrincipId($categorie3);          
        $manager->persist($categorie12);

        $categorie13 = new Categorie();
        $categorie13->setCategLibelle('Processeur')
                  ->setCategPhoto('processeur.jpeg')
                  ->setCategPrincipId($categorie3);          
        $manager->persist($categorie13);

        $categorie14 = new Categorie();
        $categorie14->setCategLibelle('Carte Graphique')
                  ->setCategPhoto('cartegraph.png')
                  ->setCategPrincipId($categorie3);          
        $manager->persist($categorie14);

        $categorie15 = new Categorie();
        $categorie15->setCategLibelle('Siège PC Gamer')
                  ->setCategPhoto('siegegamer.png')
                  ->setCategPrincipId($categorie4);          
        $manager->persist($categorie15);

        $categorie16 = new Categorie();
        $categorie16->setCategLibelle('Clavier Gamer')
                  ->setCategPhoto('clavgamer.png')
                  ->setCategPrincipId($categorie4);          
        $manager->persist($categorie16);

        $categorie17 = new Categorie();
        $categorie17->setCategLibelle('Souris Gamer')
                  ->setCategPhoto('sourisgamer.png')
                  ->setCategPrincipId($categorie4);          
        $manager->persist($categorie17);

        $categorie18 = new Categorie();
        $categorie18->setCategLibelle('Ecrans PC')
                  ->setCategPhoto('ecranpc.png')
                  ->setCategPrincipId($categorie5);          
        $manager->persist($categorie18);

        $categorie19 = new Categorie();
        $categorie19->setCategLibelle('Clavier PC')
                  ->setCategPhoto('clavpc.png')
                  ->setCategPrincipId($categorie5);          
        $manager->persist($categorie19);

        $categorie20 = new Categorie();
        $categorie20->setCategLibelle('Souris PC')
                  ->setCategPhoto('sourispc.png')
                  ->setCategPrincipId($categorie5);          
        $manager->persist($categorie20);

        $categorie21 = new Categorie();
        $categorie21->setCategLibelle('Casque PC')
                  ->setCategPhoto('casquepc.png')
                  ->setCategPrincipId($categorie5);          
        $manager->persist($categorie21);

//-------------------------------------------------------------FIN Categories Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Pays Fixtures--------------------------------------------------------------------------------

        $pays = new Pays();
        $pays->setPaysNom('France');
        $manager->persist($pays);

        $pays1 = new Pays();
        $pays1->setPaysNom('Sweden');
        $manager->persist($pays1);

        $pays2 = new Pays();
        $pays2->setPaysNom('Canada');
        $manager->persist($pays2);

        $pays3 = new Pays();
        $pays3->setPaysNom('United Kingdom');
        $manager->persist($pays3);

        $pays4 = new Pays();
        $pays4->setPaysNom('Norway');
        $manager->persist($pays4);

        $pays5 = new Pays();
        $pays5->setPaysNom('Ukraine');
        $manager->persist($pays5);

        $pays6 = new Pays();
        $pays6->setPaysNom('Allemenge');
        $manager->persist($pays6);

//------------------------------------------------------------- FIN Pays Fixtures--------------------------------------------------------------------------------

//------------------------------------------------------------- Commercial Fixtures--------------------------------------------------------------------------------

        $commercial = new Commercial();
        $commercial->setCommercNom('Olga Fernandez');
        $manager->persist($commercial);

        $commercial1 = new Commercial();
        $commercial1->setCommercNom('Lilah Delaney');
        $manager->persist($commercial1);

        $commercial2 = new Commercial();
        $commercial2->setCommercNom('Noble Buckner');
        $manager->persist($commercial2);

        $commercial3 = new Commercial();
        $commercial3->setCommercNom('Colton Cruz');
        $manager->persist($commercial3);

        $commercial4 = new Commercial();
        $commercial4->setCommercNom('Kiona Barrera');
        $manager->persist($commercial4);

//------------------------------------------------------------- FIN Commercial Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Mode Paiement Fixtures--------------------------------------------------------------------------------

        $modep = new ModePaiement();
        $modep->setPaiementLibelle('carte bancaire')
              ->setPaiementStatut('Payé');
        $manager->persist($modep);

        $modep = new ModePaiement();
        $modep->setPaiementLibelle('carte bancaire')
              ->setPaiementStatut('Annulé');
        $manager->persist($modep);

        $modep = new ModePaiement();
        $modep->setPaiementLibelle('virements')
              ->setPaiementStatut('Remboursé');
        $manager->persist($modep);

        $modep = new ModePaiement();
        $modep->setPaiementLibelle('prélèvements')
              ->setPaiementStatut('En cours');
        $manager->persist($modep);

        $modep = new ModePaiement();
        $modep->setPaiementLibelle('virements')
              ->setPaiementStatut('Paiement partiel');
        $manager->persist($modep);

//------------------------------------------------------------- FIN Mode Paiement Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Adminstrateur Fixtures--------------------------------------------------------------------------------

        $admin = new Administrateur();
        $admin->setAdminNom('ALHELOU')
              ->setAdminPrenom('Muhannad')
              ->setEmail('alheloumuhannad@afpa.fr')
              ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
              ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $admin = new Administrateur();
        $admin->setAdminNom('Zoe')
              ->setAdminPrenom('Lindsay')
              ->setEmail('a.purus@aol.org')
              ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
              ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

//------------------------------------------------------------- FIN Adminstrateur Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- USERS Fixtures--------------------------------------------------------------------------------


        $user = new User();
        $user->setUserNom('Helen')
             ->setUserPrenom('Freeman')
             ->setUserSexe('f')
             ->setEmail('augue.scelerisque.mollis@aol.ca')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 13 28 73')
             ->setUserType('Particulier')
             ->setUserPays($pays)
             ->setUserCommerc($commercial)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user);

        $user1 = new User();
        $user1->setUserNom('Elena')
             ->setUserPrenom('Fmano')
             ->setUserSexe('f')
             ->setEmail('scelerisque.mollis@aol.ca')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 13 28 73')
             ->setUserType('Particulier')
             ->setUserPays($pays)
             ->setUserCommerc($commercial1)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUserNom('Velma')
             ->setUserPrenom('Meyers')
             ->setUserSexe('f')
             ->setEmail('risus.a@hotmail.ca')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 22 28 73')
             ->setUserType('Professionnel')
             ->setUserPays($pays2)
             ->setUserCommerc($commercial)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUserNom('Muhannad')
             ->setUserPrenom('Alhelou')
             ->setUserSexe('h')
             ->setEmail('alheloumuhannad@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 55 99 73')
             ->setUserType('Professionnel')
             ->setUserPays($pays3)
             ->setUserCommerc($commercial2)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user3);

        $user4 = new User();
        $user4->setUserNom('Munir')
             ->setUserPrenom('Alselem')
             ->setUserSexe('h')
             ->setEmail('alselem@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 55 99 73')
             ->setUserType('Particulier')
             ->setUserPays($pays6)
             ->setUserCommerc($commercial3)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user4);

        $user5 = new User();
        $user5->setUserNom('Munisqdr')
             ->setUserPrenom('alselemanez')
             ->setUserSexe('h')
             ->setEmail('alselemanez@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 55 99 73')
             ->setUserType('Particulier')
             ->setUserPays($pays5)
             ->setUserCommerc($commercial4)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user5);

        $user6 = new User();
        $user6->setUserNom('Musqdr')
             ->setUserPrenom('alsem')
             ->setUserSexe('h')
             ->setEmail('alsema@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 55 99 73')
             ->setUserType('Particulier')
             ->setUserPays($pays4)
             ->setUserCommerc($commercial4)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user6);

        $user7 = new User();
        $user7->setUserNom('vasqdr')
             ->setUserPrenom('alsemgdf')
             ->setUserSexe('f')
             ->setEmail('alsemgdf@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('08 81 55 99 73')
             ->setUserType('Professionnel')
             ->setUserPays($pays)
             ->setUserCommerc($commercial2)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user7);

        $user8 = new User();
        $user8->setUserNom('saqodr')
             ->setUserPrenom('alsemgsdf')
             ->setUserSexe('h')
             ->setEmail('saqodr@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('+55 08 81 55 99 73')
             ->setUserType('Professionnel')
             ->setUserPays($pays1)
             ->setUserCommerc($commercial2)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user8);

        $user9 = new User();
        $user9->setUserNom('savodr')
             ->setUserPrenom('alsemgf')
             ->setUserSexe('h')
             ->setEmail('savodr@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('+11 08 81 55 99 73')
             ->setUserType('Particulier')
             ->setUserPays($pays2)
             ->setUserCommerc($commercial3)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user9);

        $user10 = new User();
        $user10->setUserNom('savasodr')
             ->setUserPrenom('alsemgf')
             ->setUserSexe('h')
             ->setEmail('savasodr@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('+11 08 81 55 99 73')
             ->setUserType('Particulier')
             ->setUserPays($pays)
             ->setUserCommerc($commercial)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user10);

        $user11 = new User();
        $user11->setUserNom('vasodr')
             ->setUserPrenom('alsesqmgf')
             ->setUserSexe('h')
             ->setEmail('vasodr@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('+33 08 81 55 99 73')
             ->setUserType('Particulier')
             ->setUserPays($pays)
             ->setUserCommerc($commercial1)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user11);

        $user12 = new User();
        $user12->setUserNom('valery')
             ->setUserPrenom('alsesqmgf')
             ->setUserSexe('f')
             ->setEmail('valery@afpa.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('+330881559973')
             ->setUserType('Particulier')
             ->setUserPays($pays)
             ->setUserCommerc($commercial4)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user12);

        $user13 = new User();
        $user13->setUserNom('valerysan')
             ->setUserPrenom('erysan')
             ->setUserSexe('f')
             ->setEmail('erysan@hotmail.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('+440881559973')
             ->setUserType('Particulier')
             ->setUserPays($pays6)
             ->setUserCommerc($commercial2)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user13);

        $user14 = new User();
        $user14->setUserNom('molerysan')
             ->setUserPrenom('erysandor')
             ->setUserSexe('h')
             ->setEmail('molerysan@gmail.fr')
             ->setPassword('$2y$13$IISam1.vYMEoxcoXrN3bZ.EGSLMsOPBmvn9PE13TSF/6013fc4y3q')
             ->setUserTel('0881559973')
             ->setUserType('Particulier')
             ->setUserPays($pays)
             ->setUserCommerc($commercial3)
             ->setRoles(["ROLE_USER"]);        
        $manager->persist($user14);

//------------------------------------------------------------- FIN USERS Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- adresses Fixtures--------------------------------------------------------------------------------

$adresse = new Adresse();
$adresse->setAdresse('P.O. Box 422, 2880 Ullamcorper Rd')
        ->setAdresseVille('Burhaniye')
        ->setAdresseCp(91262)
        ->setUser($user);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('137-1063 Ligula Street')
        ->setAdresseVille('Kahramanmaraş')
        ->setAdresseCp(63383)
        ->setUser($user1);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('130-5027 Donec Street')
        ->setAdresseVille('Chortkiv')
        ->setAdresseCp(80949)
        ->setUser($user2);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('1857 Tincidunt Ave')
        ->setAdresseVille('Seshego')
        ->setAdresseCp(20339)
        ->setUser($user3);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('Ap 448-6052 Commodo Street')
        ->setAdresseVille('Arendal')
        ->setAdresseCp(87106)
        ->setUser($user4);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('P.O. Box 952, 564 Ornare')
        ->setAdresseVille('Galway')
        ->setAdresseCp(13446)
        ->setUser($user5);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('1181 Integer Ave')
        ->setAdresseVille('Los Patios')
        ->setAdresseCp(16372)
        ->setUser($user6);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('P.O. Box 422, 2880 Ullamcorper Rd')
        ->setAdresseVille('Burhaniye')
        ->setAdresseCp(91262)
        ->setUser($user7);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('137-1063 Ligula Street')
        ->setAdresseVille('Kahramanmaraş')
        ->setAdresseCp(63383)
        ->setUser($user8);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('130-5027 Donec Street')
        ->setAdresseVille('Chortkiv')
        ->setAdresseCp(80949)
        ->setUser($user9);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('1857 Tincidunt Ave')
        ->setAdresseVille('Seshego')
        ->setAdresseCp(20339)
        ->setUser($user10);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('Ap 448-6052 Commodo Street')
        ->setAdresseVille('Arendal')
        ->setAdresseCp(87106)
        ->setUser($user11);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('P.O. Box 952, 564 Ornare')
        ->setAdresseVille('Galway')
        ->setAdresseCp(13446)
        ->setUser($user12);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('1181 Integer Ave')
        ->setAdresseVille('Los Patios')
        ->setAdresseCp(16372)
        ->setUser($user13);
$manager->persist($adresse);

$adresse = new Adresse();
$adresse->setAdresse('5156 Inceptos St')
        ->setAdresseVille('Whangarei')
        ->setAdresseCp(18758)
        ->setUser($user14);
$manager->persist($adresse);

//------------------------------------------------------------- FIN adresses Fixtures--------------------------------------------------------------------------------



//------------------------------------------------------------- Fournisseur Fixtures--------------------------------------------------------------------------------

$fourni = new Fournisseur();
$fourni->setFournisNom('Posuere Vulputate Lacus LLP')
       ->setFournisTel('06 54 36 80 39')
       ->setFournisEmail('vel.venenatis.vel@google.org')
       ->setFournisAdresse($adresse)
       ->setFournisPays($pays);
$manager->persist($fourni);

$fourni = new Fournisseur();
$fourni->setFournisNom('AFPA')
       ->setFournisTel('06 54 36 80 39')
       ->setFournisEmail('afpa@afpa.fr')
       ->setFournisAdresse($adresse)
       ->setFournisPays($pays6);
$manager->persist($fourni);

//------------------------------------------------------------- FIN Fournisseur Fixtures--------------------------------------------------------------------------------



//------------------------------------------------------------- Commandes Fixtures--------------------------------------------------------------------------------

        $commande = new Commande();
        $commande->setComStatut('En attente de validation')
                 ->setComAdresse($adresse)
                 ->setComPaiement($modep)
                 ->setComUser($user);
        $manager->persist($commande);

        $commande = new Commande();
        $commande->setComStatut('En livraison')
                 ->setComAdresse($adresse)
                 ->setComPaiement($modep)
                 ->setComUser($user);
        $manager->persist($commande);

        $commande = new Commande();
        $commande->setComStatut('Livrée')
                 ->setComAdresse($adresse)
                 ->setComPaiement($modep)
                 ->setComUser($user);
        $manager->persist($commande);

//------------------------------------------------------------- FIN Commandes Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Livraison Fixtures--------------------------------------------------------------------------------

        $livraison = new Livraison();
        $livraison->setLivraisonDate(new DateTimeImmutable('2023-4-2'))
                  ->setLivraisonLivreur('Colissimo')
                  ->setLivraisonCom($commande);
        $manager->persist($livraison);

        $livraison = new Livraison();
        $livraison->setLivraisonDate(new DateTimeImmutable('2024-9-17'))
                  ->setLivraisonLivreur('Chronopost')
                  ->setLivraisonCom($commande);
        $manager->persist($livraison);

//------------------------------------------------------------- FIN Livraison Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Produits Fixtures--------------------------------------------------------------------------------

        $produit = new Produit();
        $produit->setProduitLibelle('MAXOTEK BILLSTRIKER CORE')
                ->setProduitDescrip('Boîtier PC MSI MPG GUNGNIR 110R - Processeur Intel Core i5-13600KF - Carte mère Asus PRIME B660-PLUS D4 - Mémoire Kingston 16 Go - Disque SSD WD 1To BLUE SN570 M.2 NVMe - 
                Watercooling Azza GaleForce 240 ARGB - Carte Graphique RTX 4070 Ti - Alimentation M.RED ATX 850W - 80+GOLD - F.Mod/RGB - Carte réseau Asus PCE-AX3000 - Sans systeme d\'exploitation')
                ->setProduitPrixachat(515.5)
                ->setProduitPrixht(991.99)
                ->setProduitPhoto('produit1.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie6)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MAXOTEK BILLSPIRIT EVO')
                ->setProduitDescrip('Boitier PC M.RED Crystal Sea Noir - Processeur Intel Processeur Core i7-13700KF - Carte mère Asus PRIME Z790-P WIFI D4 - Mémoire PC Kingston 16Go - Disque SSD Crucial 2To M.2 NVMe - 
                                    Watercooling Azza Galeforce 360 ARGB - Carte Graphique RTX 4070 Ti 12Go - Alimentation A1000G Gen 5 - Sans systeme d\'exploitation')
                ->setProduitPrixachat(545.5)
                ->setProduitPrixht(699.99)
                ->setProduitPhoto('produit2.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie6)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MAXOTEK EDUC PREMIUM')
                ->setProduitDescrip('Boîtier PC Antec VSK 10 - Processeur INTEL Core i5-12400 - Carte mère MSI PRO B660M-A WIFI DDR4 - Mémoire PC 16Go - Disque SSD P3 M.2 NVMe - 
                                    Alimentation DUST ATX 500W - (Ventilateur 12cm) - Windows 11 Home')
                ->setProduitPrixachat(355.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit3.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie6)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MAXOTEK BILLGAMER')
                ->setProduitDescrip('Boitier PC M.RED ELITE BLACK Rainbow ARGB MR-006 - Processeur Ryzen 7 5800X3D - Carte mère Asus TUF GAMING B550-PLUS - Mémoire PC 16Go - Watercooling AIO 240mm RGB Rainbow - 
                                    Disque SSD 1To BLUE SN570 M.2 NVMe - Carte Graphique RX 7900 XT 20G - Alimentation ATX 850W 80+ Gold - Sans système d\'exploitation')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit4.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie6)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC BUREAUTIQUE MAXOTEK EDUC')
                ->setProduitDescrip('Boîtier PC : Antec P7 Silent - Processeur : Intel Core i7-12700 - Carte mère : MSI PRO B660M-A WIFI DDR4 - Mémoire : Crucial DDR4 3200 - 32Go 4x8Go - Disque SSD : Crucial P3 M.2 NVMe - 500Go - 
                                    Carte graphique : MSI RTX 3060 VENTUS 2X 12G OC - Alimentation : M.RED ATX 750W - 80+BRONZE - Systeme d\'exploitation : Microsoft Windows 11 HOME')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit5.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie7)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC BUREAUTIQUE MAXOTEK BURO STATION')
                ->setProduitDescrip('Boîtier PC : Antec P7 Silent - Processeur : Intel Core i5-10400F - Carte mère : Asus PRIME H510M-K - Mémoire : Crucial DDR4 3200 - 16Go - 2x8Go - Disque SSD : Crucial SSD P3 M.2 NVMe - 500Go - 
                                    Carte graphique : MSI GTX 1660 SUPER VENTUS XS OC - Alimentation : M.RED ATX 750W - 80+BRONZE - Systeme d\'exploitation : Microsoft Windows 11 PRO')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit6.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie7)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC BUREAUTIQUE MAXOTEK BURO I3 HOME')
                ->setProduitDescrip('Boîtier PC : DUST BLACK FORCE DU-CBF - Processeur : Intel Core i3-10100 - Carte mère : Asus PRIME H510M-K - Mémoire PC : Crucial CT8G4DFRA32A (8Go DDR4 3200 PC25600) - 
                                    Disque SSD : Kingston 500Go NV1 M.2 NVMe - SNVS/500G - Systeme d\'exploitation : Microsoft Windows 11 HOME')
                ->setProduitPrixachat(889.99)
                ->setProduitPrixht(999.99)
                ->setProduitPhoto('produit7.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie7)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC BUREAUTIQUE MAXOTEK MINI BURO I7')
                ->setProduitDescrip('BBarebone et Mini-PC Intel RNUC12WSKI70000 - i7-1260P/SO-DDR4/M.2/NO CORD - Mémoire PC portable Crucial SO-DIMM 16Go DDR4 3200 CT16G4SFRA32A - Disque SSD Crucial 1To - 
                                    Connectique PC Câble Alimentation 220V en trèfle - Sans systeme d\'exploitation')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit8.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie7)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC GAMER MAXOTEK BILLSPIRIT PREMIUM')
                ->setProduitDescrip('32 Go DDR5 - 2 To SSD NVMe - Wifi intégré - RTX 4090 - Ryzen 7 7800X3D360 mm RGB')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit9.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie8)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC GAMER Maxotek BILLDOZER')
                ->setProduitDescrip('32 Go DDR5 - 2 To SSD NVMe - Wi-Fi Intégré - RTX 4090 - Intel i9 13900K - Windows 11 Home')
                ->setProduitPrixachat(155.5)
                ->setProduitPrixht(199.99)
                ->setProduitPhoto('produit10.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie8)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC GAMER BILLGAMER ULTRA')
                ->setProduitDescrip('32 Go DDR5 - 2To SSD NVMe - WiFi intégré - RTX 4080 - Ryzen 7 7700X')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit11.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie8)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('PC GAMER Maxotek BILLSPIRIT EVO')
                ->setProduitDescrip('16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit2.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie8)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS E510MANS - SACOCHE, SOURIS, OFFICE365(1AN)')
                ->setProduitDescrip('16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit13.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie9)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LENOVO V15 G3 IAP - 82TT00AHFR')
                ->setProduitDescrip('16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option')
                ->setProduitPrixachat(855.5)
                ->setProduitPrixht(899.99)
                ->setProduitPhoto('produit14.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie9)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('HP 250 G8')
                ->setProduitDescrip('16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit15.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie9)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS EXPERTBOOK B1 B1500CENT-BQ1657R')
                ->setProduitDescrip('16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit16.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie9)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS 15 X515EA-BQ2664W')
                ->setProduitDescrip('Le PC portable Asus X515EA-BQ2664W est une machine puissante et polyvalente, parfaite pour les professionnels et les particuliers à la recherche d\'un appareil performant et fiable. 
                                    Avec son écran Full HD de 15,6 pouces et son processeur Intel Core i5 de 8 ème génération, ce PC portable est capable de traiter rapidement toutes sortes de tâches. 
                                    De plus, sa mémoire RAM de 8 Go et son disque dur SSD de 512 Go lui permettent de stocker de nombreux fichiers et de travailler sans interruption.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit17.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie10)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS X515EA-BQ2663W')
                ->setProduitDescrip('Améliorez votre productivité avec le PC portable Asus 90NB0TY2-M020K0 15.6 - i3-1115G4/8Go/512Go SSD. 
                                Ce PC portable pourra vous suivre dans tous vos déplacements tout en vous permettant de travailler efficacement grâce à son processeur Intel Core i3, 
                                ses 8Go de RAM et son SSD de 512 Go.')
                ->setProduitPrixachat(565.5)
                ->setProduitPrixht(969.99)
                ->setProduitPhoto('produit17.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie10)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MSI PRESTIGE 15 A12SC-033XFR')
                ->setProduitDescrip('Le PC portable MSI vous offre une puissance impressionnante et des performances multimédia exceptionnelles. Avec son chipset graphique NVIDIA GeForce GTX 1650 et sa taille 15,6”, 
                                vous profiterez des meilleures performances pour du streaming, de l\'édition de vidéos, de la bureautique et des jeux. 
                                D\'une résolution de 1920x1080 et d\'une fréquence de 60 Hz, ce PC portable MSI offre à ses utilisateurs un confort optimum lors de leurs sessions multimédia.')
                ->setProduitPrixachat(855.5)
                ->setProduitPrixht(899.99)
                ->setProduitPhoto('produit19.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie10)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ACER ASPIRE A515-47-R2WY')
                ->setProduitDescrip('Le PC portable Acer Aspire A515-47-R2WY est le choix parfait pour les professionnels exigeants. Avec un processeur R7-5825U de pointe, 
                                    vous pouvez accomplir toutes les tâches les plus exigeantes en un rien de temps. Les 16 Go de RAM garantissent une exécution fluide et rapide de toutes vos applications, 
                                    tandis que le disque dur de 512 Go vous offre suffisamment d\'espace de stockage pour toutes vos données et fichiers importants. 
                                    Que vous travailliez sur des documents de grande taille, des présentations ou des graphiques, le PC portable Acer Aspire A515-47-R2WY répondra à tous vos besoins.')
                ->setProduitPrixachat(155.5)
                ->setProduitPrixht(199.99)
                ->setProduitPhoto('produit20.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie10)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE AORUS 17H BXF-74FR554SH')
                ->setProduitDescrip('Système d\'Exploitation - 
                                Windows 11 Home 
                                Processeur
                                i7-13700H Processor 5.0 GHz (24MB Cache, up to 5.0 GHz, 6 P-cores and 8 E- cores) - Carte Graphique Intel® Iris Xe Graphics,NVIDIA® GeForce RTX™ 4080 Laptop GPU 12GB GDDR6
                                Boost Clock 2010 MHz / Maximum Graphics Power 150 W')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit21.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie11)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MSI PULSE GL66 12UGSZOK-888FR')
                ->setProduitDescrip('Système d\'Exploitation - 
                            Windows 11 Home 
                            Processeur
                            i7-13700H Processor 5.0 GHz (24MB Cache, up to 5.0 GHz, 6 P-cores and 8 E- cores) - Carte Graphique Intel® Iris Xe Graphics,NVIDIA® GeForce RTX™ 4080 Laptop GPU 12GB GDDR6
                            Boost Clock 2010 MHz / Maximum Graphics Power 150 W')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit22.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie11)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ERAZER SCOUT E20 MD62521 FR')
                ->setProduitDescrip('Le PC Portable ERAZER SCOUT E20 MD62521 FR est un ordinateur portable de jeu abordable mais puissant qui offre des performances de jeu exceptionnelles. 
                            Avec un processeur Intel Core i5 et un chipset graphique GF RTX4050, ce PC portable est capable de gérer des jeux graphiquement intensifs sans ralentissement.
                            Vous pouvez ainsi profiter d\'une expérience de jeu fluide et immersive, où que vous soyez.')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(282.99)
                ->setProduitPhoto('produit23.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie11)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE G5 GE-51FR263SH')
                ->setProduitDescrip('Ce PC portable Gigabyte G5 GE-51FR263SH a été conçu spécialement pour les gamers qui cherchent à exploiter tout le potentiel de leurs jeux vidéo préférés. 
                                    Grâce à son processeur Intel Core i5-12500H, ses 8 Go de RAM et sa carte graphique NVIDIA GeForce RTX 3050, 
                                    cet ordinateur est capable d\'afficher des images ultra-réalistes et des textures détaillées même dans les jeux les plus exigeants')
                ->setProduitPrixachat(455.5)
                ->setProduitPrixht(499.99)
                ->setProduitPhoto('produit24.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie11)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MSI MPG B550 GAMING PLUS')
                ->setProduitDescrip('La carte mère MSI MPG B550 GAMING PLUS - B550/AM4/ATX est un choix idéal pour les gamers et les utilisateurs exigeants. 
                            Elle prend en charge les processeurs AMD Ryzen de 3e génération, avec une capacité de mémoire DDR4 allant jusqu\'à 128Go pour des performances supérieures. 
                            La carte mère est également équipée d\'une connectivité Ethernet Gigabit pour une connectivité rapide et fiable, 
                            ainsi que de connecteurs USB 3.2 Gen 2 pour des transferts de données rapides.')
                ->setProduitPrixachat(655.5)
                ->setProduitPrixht(699.99)
                ->setProduitPhoto('produit25.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie12)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS PRIME B660-PLUS D4')
                ->setProduitDescrip('La carte mère Asus PRIME B660 PLUS D4 LGA 1700 ATX peut accueillir des disques SSD au format SATA III mais aussi M.2 pour que vous puissiez bâtir la configuration professionnelle, 
                                multimédia ou gamer qui correspond le plus à vos attentes.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit26.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie12)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE B550 GAMING X V2')
                ->setProduitDescrip('La carte mère Gigabyte B550 GAMING X V2 est la solution idéale pour les joueurs les plus exigeants. Compatible avec les processeurs AMD Ryzen de dernière génération, 
                                cette carte mère ATX offre des performances optimales grâce à son chipset B550. Elle est dotée de la technologie Smart Fan 5, 
                                qui permet de contrôler facilement la température du système, ainsi que de la connectivité haut débit grâce à sa prise en charge du Wi-Fi 6 et du LAN Gigabit.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit27.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie12)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE Z790 GAMING X AX')
                ->setProduitDescrip('La carte mère Z790 Gaming X AX est conçue avec comme objectif de cocher toutes les cases pour les gamers. 
                            Retrouvé donc un concentré de technologie haut de gamme pour assurer de délivrer les performances maximal de tous vos composants dernier cri. 
                            Support DDR5, PCiE Gen 5, un socket LGA 1700 on vous dira tout sur cette carte mère digne des plus grands PC Gamer.')
                ->setProduitPrixachat(455.5)
                ->setProduitPrixht(499.99)
                ->setProduitPhoto('produit28.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie12)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('INTEL CORE I5-12400F')
                ->setProduitDescrip('Nombre de coeur : 6 coeurs - Fréquence processeur : de 2,5 à 2,99GHz - Mémoire Cache : 18Mo')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit29.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie13)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('AMD RYZEN 7 7700X')
                ->setProduitDescrip('le constructeur AMD a mis au point une nouvelle série de processeurs. Voici la série AMD Ryzen 7000, une série de processeurs capables de vous permettre de jouer, 
                                travailler, monter des vidéos en toute simplicité.
                                Découvrez le processeur AMD Ryzen 7 7700X - 5,4GHZ/40MO/AM5/BOX disponible au meilleur prix chez Maxotek, expert High Tech.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit30.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie13)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('INTEL CORE I7-13700')
                ->setProduitDescrip('Nombre de coeur : 16 coeurs - Fréquence processeur : de 5 à 5,99GHz - Mémoire Cache : 30Mo')
                ->setProduitPrixachat(855.5)
                ->setProduitPrixht(899.99)
                ->setProduitPhoto('produit31.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie13)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('AMD RYZEN 7 5800X3D')
                ->setProduitDescrip('AMD Ryzen 7 5800X3D. Famille de processeur: AMD Ryzen™ 7, Socket de processeur (réceptable de processeur): Emplacement AM4, Lithographie du processeur: 7 nm. 
                            Canaux de mémoire: Dual-channel, Types de mémoires pris en charge par le processeur: DDR4-SDRAM, 
                            Vitesses d\'horloge de mémoire prises en charge par le processeur: 2667,2933,3200 MHz')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit32.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie13)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE GEFORCE RTX 4070 TI')
                ->setProduitDescrip('Une puissance de traitement graphique exceptionnelle grâce à la technologie GeForce RTX™ 4070 Ti')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit33.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie14)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MSI GEFORCE RTX 4060 TI GAMING X 16G')
                ->setProduitDescrip('Élevez votre expérience de gaming à un tout autre niveau avec la GeForce RTX 4060 Ti GAMING X 16G. 
                                Elle offre une puissance inégalée pour vous immerger pleinement dans vos aventures virtuelles.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit34.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie14)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS GEFORCE RTX 4060 DUAL')
                ->setProduitDescrip('Vivez l\'expérience de jeu ultime avec la NVIDIA GeForce RTX 4060 Ti, une carte graphique conçue pour les joueurs exigeants. 
                                Grâce à sa mémoire vidéo de 8 Go et son interface mémoire de 128 bits, vous bénéficiez d\'une vitesse de traitement inégalée et d\'une immersion totale dans vos jeux préférés.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit35.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie14)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE RTX 4070 WINDFORCE OC')
                ->setProduitDescrip('La carte graphique Gigabyte RTX 4070 Windforce OC 12G est équipée de cœurs Tensor 4ème gen et de cœurs RT 3ème gen, ce qui en fait une carte graphique de dernière génération.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit36.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie14)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('SPIRIT OF GAMER DEMON ARMY')
                ->setProduitDescrip('Vous souhaitez profiter d’un siège gamer design, confortable et ergonomique, 
                                le siège PC Demon of Army de Spirit Of Gamer est le siège idéal pour attaquer vos sessions gaming et pour ajouter à votre univers gamer')
                ->setProduitPrixachat(355.5)
                ->setProduitPrixht(399.99)
                ->setProduitPhoto('produit37.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie15)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('REKT ULTIM8 PLUS')
                ->setProduitDescrip('Le siège PC gamer REKT Ultim8 Plus offre le confort et le style absolus pour les gamers les plus exigeants. 
                                Doté d\'un revêtement en tissu gris foncé, sa mousse 4D confortable vous permet de jouer en toute sérénité pendant des heures. 
                                Sa facilité de montage vous permet de le monter facilement et rapidement, afin de vous éviter toute frustration')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit38.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie15)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('REKT GG1-R - CUIR/4D')
                ->setProduitDescrip('sa moulure ergonomique offre un soutien confortable à chaque session de jeu. Offrant un espace de rangement intégré pour les accessoires de jeu et les articles essentiels, 
                                ce siège peut également être réglé à 4D pour vous assurer un ajustement optimal.')
                ->setProduitPrixachat(355.5)
                ->setProduitPrixht(399.99)
                ->setProduitPhoto('produit39.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie15)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('AKRACING MASTERS SÉRIE MAX CUIR/4D')
                ->setProduitDescrip('Le siège gaming AKRacing Masters Série Max est conçu pour offrir un confort suprême pendant de longues heures de jeu. Avec un rembourrage en mousse haute densité, 
                                 ce siège offre un excellent soutien pour votre corps et votre dos, vous permettant de vous concentrer sur votre jeu sans être distrait par des douleurs musculaires ou articulaires')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit40.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie15)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        //-------------------
        $produit = new Produit();
        $produit->setProduitLibelle('THE G-LAB KEYZ PLATINIUM')
                ->setProduitDescrip('Utilisation : Gamer - Couleur : Noir - Couleur : RGB - Connectivité : Filaire - Type de clavier : Mécanique - Rétroéclairé : Rétroéclairé - Interface avec le PC : USB 2.0')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit41.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie16)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('SPIRIT OF GAMER XPERT-K400')
                ->setProduitDescrip('Ce clavier gaming PC Spirit of Gamer Xpert-K400, est le modèle idéal si vous êtes à la recherche d’un clavier mécanique RGB 
                                performant et esthétique de type filaire pour vos parties de jeu en entrée de gamme')
                ->setProduitPrixachat(555.5)
                ->setProduitPrixht(599.99)
                ->setProduitPhoto('produit42.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie16)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('THE G-LAB KEYZ CAESIUM')
                ->setProduitDescrip('Ce clavier PC The G-Lab Keyz Caesium, un clavier PC gamer à membrane qui vous apportera un confort d’utilisation incroyable 
                                    ainsi qu’une possibilité de de personnalisation d’ambiance intéressante.')
                ->setProduitPrixachat(455.5)
                ->setProduitPrixht(499.99)
                ->setProduitPhoto('produit43.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie16)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('SPIRIT OF GAMER PRO-K5')
                ->setProduitDescrip('Utilisation : Gamer - Couleur : Noir - Couleur : RGB - Connectivité : Filaire - Type de clavier : Classique - Interface avec le PC : USB 2.0')
                ->setProduitPrixachat(355.5)
                ->setProduitPrixht(399.99)
                ->setProduitPhoto('produit44.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie16)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('GIGABYTE AORUS M3 - FILAIRE')
                ->setProduitDescrip('Maxotek vous propose sa souris PC Gigabyte Aorus M3. Performante et design, elle va devenir votre bras droit durant vos parties de jeu')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit45.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie17)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LOGITECH G305 LOL K/DA - SANS FIL')
                ->setProduitDescrip('La souris PC Logitech G305 LOL K/DA est conçue avec un design époustouflant qui combine un look moderne en blanc et noir avec des fonctionnalités 
                                spécialement adaptées pour le gaming. Avec ses formes ergonomiques, elle s\'adapte parfaitement à la main pour un confort optimal, même pendant les longues sessions de jeu.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit46.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie17)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('SPIRIT OF GAMER PRO M9 - SANS FIL')
                ->setProduitDescrip('La souris Spirit of Gamer Pro-M9 (S-PM9RF) est spécialement conçue pour répondre aux besoins des gamers. 
                                 Avec sa performance exceptionnelle et ses fonctionnalités avancées, elle offre une expérience de jeu immersive et vous permet de surpasser vos adversaires.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit47.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie17)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('CORSAIR DARK CORE PRO - SANS FIL')
                ->setProduitDescrip('Achetez cette incroyable souris gamer sans fil Corsair DARKCORE RGB PRO pour profiter d’une session de jeu de haute qualité. 
                                En effet, ce petit bijou signé Corsair a été pensé par et pour les gamers pour un confort et des performances optimaux')
                ->setProduitPrixachat(155.5)
                ->setProduitPrixht(199.99)
                ->setProduitPhoto('produit48.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie17)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('IIYAMA G-MASTER GCB3280QSU-B1')
                ->setProduitDescrip('L\'écran PC Iiyama GCB3280QSU-B1 31.5 CURVE QHD/165Hz/0.2ms/VA/FS est le meilleur choix pour profiter d\'une qualité visuelle exceptionnelle. 
                            Avec sa technologie CURVE QHD et ses 165Hz, vous bénéficierez d\'une expérience immersive et immédiate.')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit49.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie18)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MSI G32CQ4 E2')
                ->setProduitDescrip('l’écran PC MSI G32CQ4 E2 dispose tout d’abord d’une taille de 32” qui garantit un espace d’affichage très grand et agréable. 
                            Ce n’est pas tout, il dispose d’une résolution de 2560 x 1440 pixels, ce qui offre un rendu WQHD')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit50.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie18)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('AOC 24G2SPU/BK')
                ->setProduitDescrip('Superbes couleurs, ultra rapide. Quel que soit votre jeu, profitez-en sur le modèle AOC 24G2SPU
                                    La fréquence de rafraîchissement à 165 Hz, le temps de réponse (MPRT) de 1 ms 
                                    et la compatibilité FreeSync Premium de l\'AOC 24G2SPU suppriment tous les effets de saccades et de distorsion.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit51.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie18)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('ASUS ROG STRIX XG27AQ-W')
                ->setProduitDescrip('Voici l’écran PC Asus Rog STRIX XG27AQ-W, un écran fait pour les gamers qui vous permettra de révolutionner votre expérience pendant de  nombreuses années.')
                ->setProduitPrixachat(655.5)
                ->setProduitPrixht(699.99)
                ->setProduitPhoto('produit52.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie18)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('TRUST PRIMO')
                ->setProduitDescrip('le clavier PC Trust Primo Noir équipé de la technologie Membrane. 
                            Cette technologie offre une réponse douce et silencieuse à chaque pression de touche, pour un confort optimal lors de la saisie de vos textes et de vos données.')
                ->setProduitPrixachat(155.5)
                ->setProduitPrixht(199.99)
                ->setProduitPhoto('produit53.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie19)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('CHERRY KC 6000 SLIM ARGENT')
                ->setProduitDescrip('Le clavier Cherry KC 6000 Slim est conçu pour résister à l\'épreuve du temps. Chaque touche est capable de supporter jusqu\'à 10 millions de frappes, 
                            garantissant ainsi une durabilité exceptionnelle même lors d\'une utilisation intensive.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit54.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie19)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LOGITECH MX KEYS MINI GRIS')
                ->setProduitDescrip('Le clavier LOGITECH MX KEYS MINI est conçu pour résister à l\'épreuve du temps. Chaque touche est capable de supporter jusqu\'à 10 millions de frappes, 
                            garantissant ainsi une durabilité exceptionnelle même lors d\'une utilisation intensive.')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit55.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie19)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LOGITECH MX KEYS GRAPHITE')
                ->setProduitDescrip('Ce fantastique clavier PC Logitech MX Keys graphite. En effet, cette petite merveille venue tout droit du constructeur 
                Logitech a été spécialement conçue pour un usage bureautique, mais également pour un usage professionnel ou multimédia.')
                ->setProduitPrixachat(255.5)
                ->setProduitPrixht(299.99)
                ->setProduitPhoto('produit56.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie19)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('TRUST BASI - FILAIRE')
                ->setProduitDescrip('La Trust Basi est conçue pour s\'adapter parfaitement à votre main, vous offrant ainsi un confort optimal.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit57.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie20)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('MCL SAMAR SS-212U - FILAIRE')
                ->setProduitDescrip('La souris PC MCL Samar SS-212U est un choix idéal pour les utilisateurs recherchant une souris élégante et performante. 
                                Disponible en couleur noir/argent, cette souris filaire offre des fonctionnalités avancées pour améliorer votre expérience d\'utilisation.')
                ->setProduitPrixachat(155.5)
                ->setProduitPrixht(199.99)
                ->setProduitPhoto('produit58.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie20)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LOGITECH M187 MINI - BLANC/SANS FIL')
                ->setProduitDescrip('Cette souris de bureau blanche signée Logitech vous offre tout le confort dont vous avez besoin pour travailler sereinement durant plusieurs heures. 
                                Que vous soyez étudiant, professionnel ou particulier, cette souris saura répondre à vos attentes pour les activités multimédias et la bureautique.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit59.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie20)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LOGITECH MX VERTICAL - GRIS/SANS FIL')
                ->setProduitDescrip('Vous ressentez des douleurs aux poignets après vos journées de travail sur ordinateur ? Les souris ergonomiques sont conçues pour régler ce problème.')
                ->setProduitPrixachat(355.5)
                ->setProduitPrixht(399.99)
                ->setProduitPhoto('produit60.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie20)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('LOGITECH H540 - NOIR/USB/FILAIRE')
                ->setProduitDescrip('Utilisation : Bureautique - Type : Supra-auriculaire - Connectivité : Filaire - Couleur : Noir - Connecteur : USB - Micro : Oui - Technologie Audio :Stereo')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit61.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie21)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('T\'NB ACTIV 400S - BLUETOOTH STÉRÉO')
                ->setProduitDescrip('Concepteurs de qualité audio, T\'nB a créé le micro casque Activ 400S pour répondre aux attentes des mélomanes les plus exigeants. 
                                Grâce à sa connectivité sans fil, vous pouvez écouter de la musique ou passer des appels sans être gêné par des câbles encombrants.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit62.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie21)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('BLUESTORK MC 401 STEREO')
                ->setProduitDescrip('Utilisation : Pro - Type : Supra-auriculaire - Connectivité : Filaire - Couleur : Gris - Connecteur : Jack 3.5 - Micro : Oui - Technologie Audio :Stereo')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit63.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie21)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

        $produit = new Produit();
        $produit->setProduitLibelle('BLUESTORK MC301')
                ->setProduitDescrip('Si vous recherchez un modèle qui vous permet de discuter en ligne, au bureau ou à la maison tout en réduisant complètement le bruit de fond, 
                                ce micro casque Bluestork MC301 est le choix parfait pour obtenir une excellente qualité sonore.')
                ->setProduitPrixachat(55.5)
                ->setProduitPrixht(99.99)
                ->setProduitPhoto('produit64.png')
                ->setProduitStock(45)
                ->setProduitActive(true)
                ->setProduitCateg($categorie21)
                ->setProduitFournis($fourni);
        $manager->persist($produit);

//------------------------------------------------------------- FIN Produits Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Ligne Commande Fixtures--------------------------------------------------------------------------------

        $ldg = new LigneCommande();
        $ldg->setLigcomQuantite('7')
            ->setLigcomPrixunitaire('1336')
            ->setLigcomProduit($produit)
            ->setLigcomCom($commande);
        $manager->persist($ldg);

        $ldg = new LigneCommande();
        $ldg->setLigcomQuantite('10')
            ->setLigcomPrixunitaire('642')
            ->setLigcomProduit($produit)
            ->setLigcomCom($commande);
        $manager->persist($ldg);


//------------------------------------------------------------- FIN Ligne Commande Fixtures--------------------------------------------------------------------------------


//------------------------------------------------------------- Livraison Inclut Fixtures--------------------------------------------------------------------------------

        $livrinclut = new LivraisonInclut();
        $livrinclut->setQuantite('7')
                   ->setProduit($produit)
                   ->setLivraison($livraison);
        $manager->persist($livrinclut);

        $livrinclut = new LivraisonInclut();
        $livrinclut->setQuantite('10')
                   ->setProduit($produit)
                   ->setLivraison($livraison);
        $manager->persist($livrinclut);   
        
//------------------------------------------------------------- Livraison Inclut Fixtures--------------------------------------------------------------------------------

        $facture = new Facturation();
        $facture->setFactureDate(new DateTimeImmutable('2023-12-8'))
                ->setFactureAdresse($adresse)
                ->setFactureCom($commande);
        $manager->persist($facture);

        $facture = new Facturation();
        $facture->setFactureDate(new DateTimeImmutable('2024-3-17'))
                ->setFactureAdresse($adresse)
                ->setFactureCom($commande);
        $manager->persist($facture);   


        $manager->flush();
    }
}
