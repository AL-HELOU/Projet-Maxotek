DROP DATABASE IF EXISTS maxotek;

CREATE DATABASE maxotek;

USE maxotek;

CREATE TABLE categorie(
   categ_id INT NOT NULL AUTO_INCREMENT,
   categ_libelle VARCHAR(50)  NOT NULL,
   categ_photo BLOB NOT NULL,
   sous_categ_id INT NOT NULL,
   PRIMARY KEY(categ_id),
   FOREIGN KEY(sous_categ_id) REFERENCES categorie(categ_id)
);

CREATE TABLE adresse(
   adresse_id INT NOT NULL AUTO_INCREMENT,
   adresse VARCHAR(255)  NOT NULL,
   adresse_ville VARCHAR(50)  NOT NULL,
   adresse_cp CHAR(5)  NOT NULL,
   PRIMARY KEY(adresse_id)
);

CREATE TABLE pays(
   pays_id INT NOT NULL AUTO_INCREMENT,
   pays_nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(pays_id)
);

CREATE TABLE commercial(
   commerc_id INT NOT NULL AUTO_INCREMENT,
   commerc_nom VARCHAR(50)  NOT NULL,
   PRIMARY KEY(commerc_id)
);

CREATE TABLE mode_paiement(
   paiement_id INT NOT NULL AUTO_INCREMENT,
   paiement_libelle VARCHAR(50)  NOT NULL,
   paiement_statut VARCHAR(50)  NOT NULL,
   paiement_date DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(paiement_id)
);

CREATE TABLE administrateur(
   admin_id INT NOT NULL AUTO_INCREMENT,
   admin_nom VARCHAR(50)  NOT NULL,
   admin_prenom VARCHAR(50)  NOT NULL,
   admin_email VARCHAR(100)  NOT NULL,
   admin_password VARCHAR(50)  NOT NULL,
   admin_role VARCHAR(20)  NOT NULL,
   PRIMARY KEY(admin_id)
);

CREATE TABLE fournisseur(
   fournis_id INT NOT NULL AUTO_INCREMENT,
   fournis_nom VARCHAR(50)  NOT NULL,
   fournis_tel VARCHAR(20)  NOT NULL,
   fournis_email VARCHAR(100)  NOT NULL,
   fournis_adresse_id INT NOT NULL,
   fournis_pays_id INT NOT NULL,
   PRIMARY KEY(fournis_id),
   FOREIGN KEY(fournis_adresse_id) REFERENCES adresse(adresse_id),
   FOREIGN KEY(fournis_pays_id) REFERENCES pays(pays_id)
);

CREATE TABLE users(
   user_id BIGINT NOT NULL AUTO_INCREMENT,
   user_nom VARCHAR(50)  NOT NULL,
   user_prenom VARCHAR(50)  NOT NULL,
   user_sexe CHAR(1) NOT NULL,
   user_email VARCHAR(100)  NOT NULL,
   user_password VARCHAR(50)  NOT NULL,
   user_tel VARCHAR(20)  NOT NULL,
   user_type Enum('Particulier', 'Professionnel') NOT NULL,
   user_adresse_id INT NOT NULL,
   user_pays_id INT NOT NULL,
   user_commerc_id INT NOT NULL,
   PRIMARY KEY(user_id),
   FOREIGN KEY(user_adresse_id) REFERENCES adresse(adresse_id),
   FOREIGN KEY(user_pays_id) REFERENCES pays(pays_id),
   FOREIGN KEY(user_commerc_id) REFERENCES commercial(commerc_id)
);

CREATE TABLE commande(
   com_id BIGINT NOT NULL AUTO_INCREMENT,
   com_date DATE NOT NULL,
   com_statut VARCHAR(50) NOT NULL,
   com_adresse_id INT NOT NULL,
   com_paiement_id INT NOT NULL,
   com_user_id BIGINT NOT NULL,
   PRIMARY KEY(com_id),
   FOREIGN KEY(com_adresse_id) REFERENCES adresse(adresse_id),
   FOREIGN KEY(com_paiement_id) REFERENCES mode_paiement(paiement_id),
   FOREIGN KEY(com_user_id) REFERENCES users(user_id)
);

CREATE TABLE livraison(
   livraison_id BIGINT NOT NULL AUTO_INCREMENT,
   livraison_date DATE NOT NULL,
   livraison_livreur VARCHAR(50)  NOT NULL,
   livraison_com_id BIGINT NOT NULL,
   PRIMARY KEY(livraison_id),
   FOREIGN KEY(livraison_com_id) REFERENCES commande(com_id)
);

CREATE TABLE produit(
   produit_id BIGINT NOT NULL AUTO_INCREMENT,
   produit_libelle VARCHAR(50)  NOT NULL,
   produit_descrip TEXT NOT NULL,
   produit_prixachat DOUBLE NOT NULL,
   produit_prixht DOUBLE NOT NULL,
   produit_photo BLOB NOT NULL,
   produit_stock INT NOT NULL,
   produit_active BIT(1) NOT NULL,
   produit_categ_id INT NOT NULL,
   produit_fournis_id INT NOT NULL,
   PRIMARY KEY(produit_id),
   FOREIGN KEY(produit_categ_id) REFERENCES categorie(categ_id),
   FOREIGN KEY(produit_fournis_id) REFERENCES fournisseur(fournis_id)
);

CREATE TABLE ligne_commande(
   ligncom_id BIGINT NOT NULL AUTO_INCREMENT,
   ligncom_quantite INT NOT NULL,
   ligncom_prixunitaire DECIMAL(10,2)   NOT NULL,
   ligncom_produit_id BIGINT NOT NULL,
   lingom_com_id BIGINT NOT NULL,
   PRIMARY KEY(ligncom_id),
   FOREIGN KEY(ligncom_produit_id) REFERENCES produit(produit_id),
   FOREIGN KEY(lingom_com_id) REFERENCES commande(com_id)
);

CREATE TABLE facturation(
   facture_adresse_id INT NOT NULL,
   facture_com_id BIGINT NOT NULL,
   facture_date DATE NOT NULL,
   PRIMARY KEY(facture_adresse_id, facture_com_id),
   FOREIGN KEY(facture_adresse_id) REFERENCES adresse(adresse_id),
   FOREIGN KEY(facture_com_id) REFERENCES commande(com_id)
);

CREATE TABLE livraison_inclut(
   produit_id BIGINT NOT NULL,
   livraison_id BIGINT NOT NULL,
   quantite VARCHAR(50) ,
   PRIMARY KEY(produit_id, livraison_id),
   FOREIGN KEY(produit_id) REFERENCES produit(produit_id),
   FOREIGN KEY(livraison_id) REFERENCES livraison(livraison_id)
);


INSERT INTO categorie (`categ_libelle`, `categ_photo`, `sous_categ_id`)
VALUES
  ("PC FIXE", "pcfixe.png", 1),
  ("PC PORTABLE", "pcportable.png", 2),
  ("COMPOSANTS", "composants.png", 3),
  ("GAMING ZONE", "gamingzone.jpg", 4),
  ("COMPOSANTS PC", "Microphones.jpg", 5),
  
  ("Ordinateur Maxotek", "ordmaxotek.jpeg", 1),
  ("Ordinateur Bureautique", "ordibureau.png", 1),
  ("Ordinateur Gamer", "ordigamer.jpg", 1),
  ("Portable Bureautique", "portbureau.png", 2),
  ("Portable Multimédia", "portmulti.png", 2),
  ("Portable Gamer", "portgamer.png", 2),
  ("Carte mère", "cartemere.png", 3),
  ("Processeur", "processeur.jpeg", 3),
  ("Carte Graphique", "cartegraph.png", 3),
  ("Siège PC Gamer", "siegegamer.png", 4),
  ("Clavier Gamer", "clavgamer.png", 4),
  ("Souris Gamer" ,"sourisgamer.png", 4),
  ("Ecrans PC", "ecranpc.png", 5),
  ("Clavier PC" , "clavpc.png", 5),
  ("Souris PC", "sourispc.png", 5),
  ("Casque PC", "casquepc.png", 5);


INSERT INTO adresse (`adresse`,`adresse_ville`,`adresse_cp`)
VALUES
  ("P.O. Box 422, 2880 Ullamcorper Rd.","Burhaniye","91262"),
  ("137-1063 Ligula Street","Kahramanmaraş","63383"),
  ("130-5027 Donec Street","Chortkiv","80949"),
  ("1857 Tincidunt Ave","Seshego","20339"),
  ("Ap 448-6052 Commodo Street","Arendal","87106"),
  ("P.O. Box 952, 564 Ornare, Avenue","Galway","13446"),
  ("Ap 242-1641 Enim. Rd.","Zwolle","86749"),
  ("Ap 670-6386 Dui, Av.","Aguazul","13888"),
  ("1181 Integer Ave","Los Patios","16372"),
  ("Ap 468-8833 Velit Avenue","Straubing","36287"),
  ("9763 Ut, Rd.","Tacurong","32133"),
  ("5156 Inceptos St.","Whangarei","18758"),
  ("Ap 898-6870 Nisi. Rd.","Port Augusta","92470"),
  ("836-7925 Amet Avenue","Kuruman","69315"),
  ("P.O. Box 840, 2844 Cras Street","Suruç","77894");


INSERT INTO pays (`pays_nom`)
VALUES
  ("France"),
  ("Sweden"),
  ("Canada"),
  ("United Kingdom"),
  ("Norway"),
  ("Ukraine"),
  ("Sweden"),
  ("South Korea"),
  ("Allemenge");


INSERT INTO commercial (`commerc_nom`)
VALUES
  ("Olga Fernandez"),
  ("Lilah Delaney"),
  ("Noble Buckner"),
  ("Colton Cruz"),
  ("Kiona Barrera");


INSERT INTO mode_paiement (`paiement_libelle`, `paiement_statut`)
VALUES
  ("carte bancaire", "Payé"),
  ("carte bancaire", "Annulé"),
  ("virements", "Remboursé"),
  ("prélèvements", "En cours"),
  ("virements","Paiement partiel");


INSERT INTO administrateur (`admin_nom`,`admin_prenom`,`admin_email`, `admin_password`, `admin_role`)
VALUES
  ("Zoe","Lindsay","a.purus@aol.org","password","gestionnaire"),
  ("Elmo","Cotton","morbi.quis.urna@google.com","password","administrateur"),
  ("Kaye","Manning","tristique.pellentesque.tellus@yahoo.ca","password","administrateur"),
  ("Amethyst","Dotson","non@yahoo.net","password","approvisionneur");


INSERT INTO fournisseur (`fournis_nom`,`fournis_tel`,`fournis_email`,`fournis_adresse_id`,`fournis_pays_id`)
VALUES
  ("Est Ac PC","05 21 17 58 87","convallis@outlook.couk",15 ,1),
  ("Posuere Vulputate Lacus LLP","06 54 36 80 39","vel.venenatis.vel@google.org",14, 1),
  ("Semper Inc.","02 73 14 14 54","id.magna.et@protonmail.couk",13, 9),
  ("Suscipit Est Inc.","06 57 97 11 77","lorem.auctor@icloud.com",12, 9),
  ("Pretium Neque Morbi Associates","05 68 57 57 78","nec.ante@yahoo.com",11, 4),
  ("Ligula Aliquam Ltd","06 76 15 55 93","metus@hotmail.edu",10, 7);



INSERT INTO users (`user_nom`,`user_prenom`,`user_sexe`,`user_email`,`user_password`,`user_tel`,`user_type`,`user_adresse_id`,`user_pays_id`,`user_commerc_id`)
VALUES
  ("Helen","Freeman",'m',"augue.scelerisque.mollis@aol.ca","password","08 81 13 28 73","Particulier",9,1,5),
  ("Velma","Meyers",'f',"risus.a@hotmail.ca","password","05 34 13 96 16","Professionnel",8,1,5),
  ("Jorden","Curtis",'f',"neque@aol.ca","password","03 84 54 62 61","Particulier",6,2,3),
  ("Barrett","Cotton",'f',"tristique.pharetra.quisque@protonmail.edu","password","01 37 15 43 85","Professionnel",7,9,3),
  ("George","Bowers",'m',"nec.luctus.felis@protonmail.couk","password","02 16 71 12 49","Particulier",5,9,1),
  ("Lewis","Kline",'m',"ut.erat.sed@protonmail.org","password","07 74 48 81 17","Professionnel",4,9,2),
  ("Moses","Morris",'m',"morbi.vehicula@yahoo.ca","password","09 82 48 34 95","Particulier",3,1,5),
  ("Graiden","Hood",'m',"vivamus@outlook.ca","password","04 59 18 90 81","Particulier",2,1,4),
  ("Alan","Powers",'m',"nec.tempus.scelerisque@icloud.org","password","06 80 53 10 37","Particulier",1,1,3),
  ("Petra","Hill",'f',"et@aol.edu","password","06 50 54 77 46","Particulier",9,4,3);


INSERT INTO commande (`com_date`,`com_statut`,`com_adresse_id`,`com_paiement_id`,`com_user_id`)
VALUES
  ("2023-1-4","En attente de validation",15,5,9),
  ("2023-11-27","En livraison",11,1,1),
  ("2023-10-31","En préparation",5,1,2),
  ("2023-10-31","En attente d'acceptation",7,4,7),
  ("2023-6-13","Livrée",1,5,4),
  ("2023-2-14","En préparation",9,1,8),
  ("2023-10-3","Annulé",2,2,10),
  ("2023-10-2","Expédiée",14,1,5),
  ("2024-1-17","Confirmé",3,1,6),
  ("2023-2-22","Livrée",8,3,3);



INSERT INTO livraison (`livraison_date`,`livraison_livreur`,`livraison_com_id`)
VALUES
  ("2023-4-2","Colissimo",2),
  ("2023-1-13","Chronopost",5),
  ("2023-3-15","DPD",8),
  ("2023-4-7","DHL",10);



INSERT INTO `produit` (`produit_libelle`,`produit_descrip`,`produit_prixachat`,`produit_prixht`,`produit_photo`,`produit_stock`,`produit_active`,`produit_categ_id`,`produit_fournis_id`)
VALUES
  ("MAXOTEK BILLSTRIKER CORE",
  "Boîtier PC MSI MPG GUNGNIR 110R - Processeur Intel Core i5-13600KF - Carte mère Asus PRIME B660-PLUS D4 - Mémoire Kingston 16 Go - Disque SSD WD 1To BLUE SN570 M.2 NVMe - 
   Watercooling Azza GaleForce 240 ARGB - Carte Graphique RTX 4070 Ti - Alimentation M.RED ATX 850W - 80+GOLD - F.Mod/RGB - Carte réseau Asus PCE-AX3000 - Sans systeme d'exploitation
   ",
   409,739.99,"produit1.png",45,b'1',6,5
  ),
  ("MAXOTEK BILLSPIRIT EVO",
  "Boitier PC M.RED Crystal Sea Noir - Processeur Intel Processeur Core i7-13700KF - Carte mère Asus PRIME Z790-P WIFI D4 - Mémoire PC Kingston 16Go - Disque SSD Crucial 2To M.2 NVMe - 
   Watercooling Azza Galeforce 360 ARGB - Carte Graphique RTX 4070 Ti 12Go - Alimentation A1000G Gen 5 - Sans systeme d'exploitation
  ",
  585,1254.99,"produit2.png",45,b'1',6,2
  ),
  ("MAXOTEK EDUC PREMIUM",
  "Boîtier PC Antec VSK 10 - Processeur INTEL Core i5-12400 - Carte mère MSI PRO B660M-A WIFI DDR4 - Mémoire PC 16Go - Disque SSD P3 M.2 NVMe - 
   Alimentation DUST ATX 500W - (Ventilateur 12cm) - Windows 11 Home
  ",
  222,357.90,"produit3.png",76,b'1',6,1
  ),
  ("MAXOTEK BILLGAMER",
  "Boitier PC M.RED ELITE BLACK Rainbow ARGB MR-006 - Processeur Ryzen 7 5800X3D - Carte mère Asus TUF GAMING B550-PLUS - Mémoire PC 16Go - Watercooling AIO 240mm RGB Rainbow - 
   Disque SSD 1To BLUE SN570 M.2 NVMe - Carte Graphique RX 7900 XT 20G - Alimentation ATX 850W 80+ Gold - Sans système d'exploitation
  ",
  577,1339.99,"produit4.png",20,b'1',6,1
  ),

  ("PC BUREAUTIQUE MAXOTEK EDUC",
  "Boîtier PC : Antec P7 Silent - Processeur : Intel Core i7-12700 - Carte mère : MSI PRO B660M-A WIFI DDR4 - Mémoire : Crucial DDR4 3200 - 32Go 4x8Go - Disque SSD : Crucial P3 M.2 NVMe - 500Go - 
   Carte graphique : MSI RTX 3060 VENTUS 2X 12G OC - Alimentation : M.RED ATX 750W - 80+BRONZE - Systeme d'exploitation : Microsoft Windows 11 HOME
  ",
  405,899.99,"produit5.png",31,b'1',7,5
  ),
  ("PC BUREAUTIQUE MAXOTEK BURO STATION",
  "Boîtier PC : Antec P7 Silent - Processeur : Intel Core i5-10400F - Carte mère : Asus PRIME H510M-K - Mémoire : Crucial DDR4 3200 - 16Go - 2x8Go - Disque SSD : Crucial SSD P3 M.2 NVMe - 500Go - 
   Carte graphique : MSI GTX 1660 SUPER VENTUS XS OC - Alimentation : M.RED ATX 750W - 80+BRONZE - Systeme d'exploitation : Microsoft Windows 11 PRO
  ",
  454,1249,"produit6.png",59,b'1',7,4
  ),
  ("PC BUREAUTIQUE MAXOTEK BURO I3 HOME",
  "Boîtier PC : DUST BLACK FORCE DU-CBF - Processeur : Intel Core i3-10100 - Carte mère : Asus PRIME H510M-K - Mémoire PC : Crucial CT8G4DFRA32A (8Go DDR4 3200 PC25600) - 
   Disque SSD : Kingston 500Go NV1 M.2 NVMe - SNVS/500G - Systeme d'exploitation : Microsoft Windows 11 HOME
  ",
  654,999.99,"produit7.png",71,b'1',7,6
  ),
  ("PC BUREAUTIQUE MAXOTEK MINI BURO I7",
  "Barebone et Mini-PC Intel RNUC12WSKI70000 - i7-1260P/SO-DDR4/M.2/NO CORD - Mémoire PC portable Crucial SO-DIMM 16Go DDR4 3200 CT16G4SFRA32A - Disque SSD Crucial 1To - 
   Connectique PC Câble Alimentation 220V en trèfle - Sans systeme d'exploitation
  ",
  254,1002,"produit8.png",51,b'1',7,6
  ),

  ("PC GAMER MAXOTEK BILLSPIRIT PREMIUM",
   "32 Go DDR5 - 2 To SSD NVMe - Wifi intégré - RTX 4090 - Ryzen 7 7800X3D360 mm RGB",
   249,385,"produit9.png",17,b'1',8,2
  ),
  ("PC GAMER Maxotek BILLDOZER",
   "32 Go DDR5 - 2 To SSD NVMe - Wi-Fi Intégré - RTX 4090 - Intel i9 13900K - Windows 11 Home",
   773,769.99,"produit10.png",24,b'1',8,3
  ),
  ("PC GAMER BILLGAMER ULTRA",
   "32 Go DDR5 - 2To SSD NVMe - WiFi intégré - RTX 4080 - Ryzen 7 7700X",
   459,784,"produit11.png",74,b'1',8,3
  ),
  ("PC GAMER Maxotek BILLSPIRIT EVO",
   "16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option",
   743,1219.99,"produit2.png",38,b'1',8,4
  ),

  ("ASUS E510MANS - SACOCHE, SOURIS, OFFICE365(1AN)", "16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option",
   704,1413,"produit13.png",66,b'1',9,2
  ),
  ("LENOVO V15 G3 IAP - 82TT00AHFR","16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option",
   369,298,"produit14.png",34,b'1',9,4
  ),
  ("HP 250 G8",
   "16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option",
   698,1497,"produit15.png",11,b'1',9,3
  ),
  ("ASUS EXPERTBOOK B1 B1500CENT-BQ1657R","16 Go DDR4 - 2 To SSD NVMe - Wi-Fi intégré - RTX 4070Ti - Intel i7 13700KF - Windows en option",
   510,1409.99,"produit16.png",71,b'1',9,2
  ),

  ("ASUS 15 X515EA-BQ2664W",
   "Le PC portable Asus X515EA-BQ2664W est une machine puissante et polyvalente, parfaite pour les professionnels et les particuliers à la recherche d'un appareil performant et fiable. 
   Avec son écran Full HD de 15,6 pouces et son processeur Intel Core i5 de 8 ème génération, ce PC portable est capable de traiter rapidement toutes sortes de tâches. 
   De plus, sa mémoire RAM de 8 Go et son disque dur SSD de 512 Go lui permettent de stocker de nombreux fichiers et de travailler sans interruption.
   ",
  216,738,"produit17.png",10,b'1',10,6
  ),
  ("ASUS X515EA-BQ2663W",
   "Améliorez votre productivité avec le PC portable Asus 90NB0TY2-M020K0 15.6 - i3-1115G4/8Go/512Go SSD. 
   Ce PC portable pourra vous suivre dans tous vos déplacements tout en vous permettant de travailler efficacement grâce à son processeur Intel Core i3, 
   ses 8Go de RAM et son SSD de 512 Go.
   ",
  811,994.99,"produit17.png",11,b'1',10,5
  ),
  ("MSI PRESTIGE 15 A12SC-033XFR",
   "Le PC portable MSI vous offre une puissance impressionnante et des performances multimédia exceptionnelles. Avec son chipset graphique NVIDIA GeForce GTX 1650 et sa taille 15,6”, 
   vous profiterez des meilleures performances pour du streaming, de l'édition de vidéos, de la bureautique et des jeux. 
   D'une résolution de 1920x1080 et d'une fréquence de 60 Hz, ce PC portable MSI offre à ses utilisateurs un confort optimum lors de leurs sessions multimédia.
  ",
  859,947.99,"produit19.png",79,b'1',10,1
  ),
  ("ACER ASPIRE A515-47-R2WY",
  "Le PC portable Acer Aspire A515-47-R2WY est le choix parfait pour les professionnels exigeants. Avec un processeur R7-5825U de pointe, 
  vous pouvez accomplir toutes les tâches les plus exigeantes en un rien de temps. Les 16 Go de RAM garantissent une exécution fluide et rapide de toutes vos applications, 
  tandis que le disque dur de 512 Go vous offre suffisamment d'espace de stockage pour toutes vos données et fichiers importants. 
  Que vous travailliez sur des documents de grande taille, des présentations ou des graphiques, le PC portable Acer Aspire A515-47-R2WY répondra à tous vos besoins.
  ",
  842,932.99,"produit20.png",41,b'1',10,1
  ),

  ("GIGABYTE AORUS 17H BXF-74FR554SH",
   "Système d'Exploitation - 
    Windows 11 Home 
    Processeur
    i7-13700H Processor 5.0 GHz (24MB Cache, up to 5.0 GHz, 6 P-cores and 8 E- cores) - Carte Graphique Intel® Iris Xe Graphics,NVIDIA® GeForce RTX™ 4080 Laptop GPU 12GB GDDR6
    Boost Clock 2010 MHz / Maximum Graphics Power 150 W
   ",
   252,1359.99,"produit21.png",45,b'1',11,3
  ),
  ("MSI PULSE GL66 12UGSZOK-888FR",
   "Système d'Exploitation - 
    Windows 11 Home 
    Processeur
    i7-13700H Processor 5.0 GHz (24MB Cache, up to 5.0 GHz, 6 P-cores and 8 E- cores) - Carte Graphique Intel® Iris Xe Graphics,NVIDIA® GeForce RTX™ 4080 Laptop GPU 12GB GDDR6
    Boost Clock 2010 MHz / Maximum Graphics Power 150 W
   ",
   480,737.99,"produit22.png",20,b'1',11,2
  ),
  ("ERAZER SCOUT E20 MD62521 FR",
  "Le PC Portable ERAZER SCOUT E20 MD62521 FR est un ordinateur portable de jeu abordable mais puissant qui offre des performances de jeu exceptionnelles. 
   Avec un processeur Intel Core i5 et un chipset graphique GF RTX4050, ce PC portable est capable de gérer des jeux graphiquement intensifs sans ralentissement.
   Vous pouvez ainsi profiter d'une expérience de jeu fluide et immersive, où que vous soyez.
   ",
   484,202,"produit23.png",66,b'1',11,6
  ),
  ("GIGABYTE G5 GE-51FR263SH",
  "Ce PC portable Gigabyte G5 GE-51FR263SH a été conçu spécialement pour les gamers qui cherchent à exploiter tout le potentiel de leurs jeux vidéo préférés. 
  Grâce à son processeur Intel Core i5-12500H, ses 8 Go de RAM et sa carte graphique NVIDIA GeForce RTX 3050, 
  cet ordinateur est capable d'afficher des images ultra-réalistes et des textures détaillées même dans les jeux les plus exigeants
  ",
  214,344,"produit24.png",47,b'1',11,1
  ),

  ("MSI MPG B550 GAMING PLUS",
  "La carte mère MSI MPG B550 GAMING PLUS - B550/AM4/ATX est un choix idéal pour les gamers et les utilisateurs exigeants. 
  Elle prend en charge les processeurs AMD Ryzen de 3e génération, avec une capacité de mémoire DDR4 allant jusqu'à 128Go pour des performances supérieures. 
  La carte mère est également équipée d'une connectivité Ethernet Gigabit pour une connectivité rapide et fiable, 
  ainsi que de connecteurs USB 3.2 Gen 2 pour des transferts de données rapides.
  ",
  805,475,"produit25.png",37,b'1',12,3
  ),
  ("ASUS PRIME B660-PLUS D4",
  "La carte mère Asus PRIME B660 PLUS D4 LGA 1700 ATX peut accueillir des disques SSD au format SATA III mais aussi M.2 pour que vous puissiez bâtir la configuration professionnelle, 
  multimédia ou gamer qui correspond le plus à vos attentes.
  ",
  720,653,"produit26.png",52,b'1',12,5
  ),
  ("GIGABYTE B550 GAMING X V2",
  "La carte mère Gigabyte B550 GAMING X V2 est la solution idéale pour les joueurs les plus exigeants. Compatible avec les processeurs AMD Ryzen de dernière génération, 
  cette carte mère ATX offre des performances optimales grâce à son chipset B550. Elle est dotée de la technologie Smart Fan 5, 
  qui permet de contrôler facilement la température du système, ainsi que de la connectivité haut débit grâce à sa prise en charge du Wi-Fi 6 et du LAN Gigabit.
  ",
  676,420,"produit27.png",76,b'1',12,5
  ),
  ("GIGABYTE Z790 GAMING X AX",
  "La carte mère Z790 Gaming X AX est conçue avec comme objectif de cocher toutes les cases pour les gamers. 
  Retrouvé donc un concentré de technologie haut de gamme pour assurer de délivrer les performances maximal de tous vos composants dernier cri. 
  Support DDR5, PCiE Gen 5, un socket LGA 1700 on vous dira tout sur cette carte mère digne des plus grands PC Gamer. 
  ",
  516,907,"produit28.png",75,b'1',12,4
  ),

  ("INTEL CORE I5-12400F",
  "Nombre de coeur : 6 coeurs - Fréquence processeur : de 2,5 à 2,99GHz - Mémoire Cache : 18Mo",
  287,473,"produit29.png",31,b'1',13,4
  ),
  ("AMD RYZEN 7 7700X",
  "le constructeur AMD a mis au point une nouvelle série de processeurs. Voici la série AMD Ryzen 7000, une série de processeurs capables de vous permettre de jouer, 
   travailler, monter des vidéos en toute simplicité.
   Découvrez le processeur AMD Ryzen 7 7700X - 5,4GHZ/40MO/AM5/BOX disponible au meilleur prix chez Maxotek, expert High Tech.
  ",
  365,1307,"produit30.png",53,b'1',13,4
  ),
  ("INTEL CORE I7-13700",
  "Nombre de coeur : 16 coeurs - Fréquence processeur : de 5 à 5,99GHz - Mémoire Cache : 30Mo",
  800,1130,"produit31.png",76,b'1',13,6
  ),
  ("AMD RYZEN 7 5800X3D",
  "AMD Ryzen 7 5800X3D. Famille de processeur: AMD Ryzen™ 7, Socket de processeur (réceptable de processeur): Emplacement AM4, Lithographie du processeur: 7 nm. 
  Canaux de mémoire: Dual-channel, Types de mémoires pris en charge par le processeur: DDR4-SDRAM, 
  Vitesses d'horloge de mémoire prises en charge par le processeur: 2667,2933,3200 MHz
  ",
  547,990,"produit32.png",37,b'1',13,2
  ),

  ("GIGABYTE GEFORCE RTX 4070 TI",
  "Une puissance de traitement graphique exceptionnelle grâce à la technologie GeForce RTX™ 4070 Ti",
  865,765,"produit33.png",47,b'1',14,3
  ),
  ("MSI GEFORCE RTX 4060 TI GAMING X 16G",
  "Élevez votre expérience de gaming à un tout autre niveau avec la GeForce RTX 4060 Ti GAMING X 16G. 
  Elle offre une puissance inégalée pour vous immerger pleinement dans vos aventures virtuelles.
  ",
  674,472,"produit34.png",63,b'1',14,4
  ),
  ("ASUS GEFORCE RTX 4060 DUAL",
  "Vivez l'expérience de jeu ultime avec la NVIDIA GeForce RTX 4060 Ti, une carte graphique conçue pour les joueurs exigeants. 
  Grâce à sa mémoire vidéo de 8 Go et son interface mémoire de 128 bits, vous bénéficiez d'une vitesse de traitement inégalée et d'une immersion totale dans vos jeux préférés.
  ",
  257,1190,"produit35.png",23,b'1',14,2
  ),
  ("GIGABYTE RTX 4070 WINDFORCE OC",
  "La carte graphique Gigabyte RTX 4070 Windforce OC 12G est équipée de cœurs Tensor 4ème gen et de cœurs RT 3ème gen, ce qui en fait une carte graphique de dernière génération.",
  543,273,"produit36.png",34,b'1',14,2
  ),

  ("SPIRIT OF GAMER DEMON ARMY",
   "Vous souhaitez profiter d’un siège gamer design, confortable et ergonomique, 
   le siège PC Demon of Army de Spirit Of Gamer est le siège idéal pour attaquer vos sessions gaming et pour ajouter à votre univers gamer
   ",
   249,385,"produit37.png",17,b'1',15,2
  ),
  ("REKT ULTIM8 PLUS",
  "Le siège PC gamer REKT Ultim8 Plus offre le confort et le style absolus pour les gamers les plus exigeants. 
  Doté d'un revêtement en tissu gris foncé, sa mousse 4D confortable vous permet de jouer en toute sérénité pendant des heures. 
  Sa facilité de montage vous permet de le monter facilement et rapidement, afin de vous éviter toute frustration
  ",
  840,1095,"produit38.png",57,b'1',15,4
  ),
  ("REKT GG1-R - CUIR/4D",
  "sa moulure ergonomique offre un soutien confortable à chaque session de jeu. Offrant un espace de rangement intégré pour les accessoires de jeu et les articles essentiels, 
  ce siège peut également être réglé à 4D pour vous assurer un ajustement optimal.
  ",
  724,1375,"produit39.png",14,b'1',15,5
  ),
  ("AKRACING MASTERS SÉRIE MAX CUIR/4D",
  "Le siège gaming AKRacing Masters Série Max est conçu pour offrir un confort suprême pendant de longues heures de jeu. Avec un rembourrage en mousse haute densité, 
  ce siège offre un excellent soutien pour votre corps et votre dos, vous permettant de vous concentrer sur votre jeu sans être distrait par des douleurs musculaires ou articulaires
  ",
  278,341,"produit40.png",67,b'1',15,4
  ),

  ("THE G-LAB KEYZ PLATINIUM",
  "Utilisation : Gamer - Couleur : Noir - Couleur : RGB - Connectivité : Filaire - Type de clavier : Mécanique - Rétroéclairé : Rétroéclairé - Interface avec le PC : USB 2.0",
  402,581,"produit41.png",62,b'1',16,5
  ),
  ("SPIRIT OF GAMER XPERT-K400",
  "Ce clavier gaming PC Spirit of Gamer Xpert-K400, est le modèle idéal si vous êtes à la recherche d’un clavier mécanique RGB 
  performant et esthétique de type filaire pour vos parties de jeu en entrée de gamme
  ",
  863,920,"produit42.png",49,b'1',16,4
  ),
  ("THE G-LAB KEYZ CAESIUM",
  "e clavier PC The G-Lab Keyz Caesium, un clavier PC gamer à membrane qui vous apportera un confort d’utilisation incroyable 
  ainsi qu’une possibilité de de personnalisation d’ambiance intéressante.",
  684,896,"produit43.png",33,b'1',16,5
  ),
  ("SPIRIT OF GAMER PRO-K5",
  "Utilisation : Gamer - Couleur : Noir - Couleur : RGB - Connectivité : Filaire - Type de clavier : Classique - Interface avec le PC : USB 2.0",
  367,284,"produit44.png",59,b'1',16,4
  ),

  ("GIGABYTE AORUS M3 - FILAIRE",
  " Maxotek vous propose sa souris PC Gigabyte Aorus M3. Performante et design, elle va devenir votre bras droit durant vos parties de jeu",
  814,485,"produit45.png",58,b'1',17,5
  ),
  ("LOGITECH G305 LOL K/DA - SANS FIL",
  "La souris PC Logitech G305 LOL K/DA est conçue avec un design époustouflant qui combine un look moderne en blanc et noir avec des fonctionnalités 
  spécialement adaptées pour le gaming. Avec ses formes ergonomiques, elle s'adapte parfaitement à la main pour un confort optimal, même pendant les longues sessions de jeu.
  ",
  505,757,"produit46.png",49,b'1',17,2
  ),
  ("SPIRIT OF GAMER PRO M9 - SANS FIL",
  "La souris Spirit of Gamer Pro-M9 (S-PM9RF) est spécialement conçue pour répondre aux besoins des gamers. 
  Avec sa performance exceptionnelle et ses fonctionnalités avancées, elle offre une expérience de jeu immersive et vous permet de surpasser vos adversaires.
  ",
  645,1179,"produit47.png",12,b'1',17,1
  ),
  ("CORSAIR DARK CORE PRO - SANS FIL",
  "Achetez cette incroyable souris gamer sans fil Corsair DARKCORE RGB PRO pour profiter d’une session de jeu de haute qualité. 
  En effet, ce petit bijou signé Corsair a été pensé par et pour les gamers pour un confort et des performances optimaux",
  703,1030,"produit48.png",41,b'1',17,6
  ),

  ("IIYAMA G-MASTER GCB3280QSU-B1",
  "L'écran PC Iiyama GCB3280QSU-B1 31.5 CURVE QHD/165Hz/0.2ms/VA/FS est le meilleur choix pour profiter d'une qualité visuelle exceptionnelle. 
  Avec sa technologie CURVE QHD et ses 165Hz, vous bénéficierez d'une expérience immersive et immédiate.
  ",
  690,1189,"produit49.png",46,b'1',18,5
  ),
  ("MSI G32CQ4 E2",
  "l’écran PC MSI G32CQ4 E2 dispose tout d’abord d’une taille de 32” qui garantit un espace d’affichage très grand et agréable. 
  Ce n’est pas tout, il dispose d’une résolution de 2560 x 1440 pixels, ce qui offre un rendu WQHD",
  693,555,"produit50.png",23,b'1',18,3
  ),
  ("AOC 24G2SPU/BK",
  "Superbes couleurs, ultra rapide. Quel que soit votre jeu, profitez-en sur le modèle AOC 24G2SPU
   La fréquence de rafraîchissement à 165 Hz, le temps de réponse (MPRT) de 1 ms 
   et la compatibilité FreeSync Premium de l'AOC 24G2SPU suppriment tous les effets de saccades et de distorsion.
   ",
  550,897,"produit51.png",21,b'1',18,3
  ),
  ("ASUS ROG STRIX XG27AQ-W",
  "Voici l’écran PC Asus Rog STRIX XG27AQ-W, un écran fait pour les gamers qui vous permettra de révolutionner votre expérience pendant de  nombreuses années.",
  638,1445,"produit52.png",39,b'1',18,3
  ),

  ("TRUST PRIMO",
  "le clavier PC Trust Primo Noir équipé de la technologie Membrane. 
  Cette technologie offre une réponse douce et silencieuse à chaque pression de touche, pour un confort optimal lors de la saisie de vos textes et de vos données.
  ",
  847,1276,"produit53.png",31,b'1',19,2
  ),
  ("CHERRY KC 6000 SLIM ARGENT",
  "Le clavier Cherry KC 6000 Slim est conçu pour résister à l'épreuve du temps. Chaque touche est capable de supporter jusqu'à 10 millions de frappes, 
  garantissant ainsi une durabilité exceptionnelle même lors d'une utilisation intensive.",
  279,888,"produit54.png",27,b'1',19,2
  ),
  ("LOGITECH MX KEYS MINI GRIS",
  "Le clavier LOGITECH MX KEYS MINI est conçu pour résister à l'épreuve du temps. Chaque touche est capable de supporter jusqu'à 10 millions de frappes, 
  garantissant ainsi une durabilité exceptionnelle même lors d'une utilisation intensive.",
  841,1195,"produit55.png",20,b'1',19,2
  ),
  ("LOGITECH MX KEYS GRAPHITE",
  "ce fantastique clavier PC Logitech MX Keys graphite. En effet, cette petite merveille venue tout droit du constructeur 
  Logitech a été spécialement conçue pour un usage bureautique, mais également pour un usage professionnel ou multimédia.",
  701,1153,"produit56.png",11,b'1',19,1
  ),

  ("TRUST BASI - FILAIRE",
  "La Trust Basi est conçue pour s'adapter parfaitement à votre main, vous offrant ainsi un confort optimal.",
  877,779,"produit57.png",27,b'1',20,4
  ),
  ("MCL SAMAR SS-212U - FILAIRE",
  "La souris PC MCL Samar SS-212U est un choix idéal pour les utilisateurs recherchant une souris élégante et performante. 
  Disponible en couleur noir/argent, cette souris filaire offre des fonctionnalités avancées pour améliorer votre expérience d'utilisation.",
  572,432,"produit58.png",73,b'1',20,4
  ),
  ("LOGITECH M187 MINI - BLANC/SANS FIL",
  "Cette souris de bureau blanche signée Logitech vous offre tout le confort dont vous avez besoin pour travailler sereinement durant plusieurs heures. 
  Que vous soyez étudiant, professionnel ou particulier, cette souris saura répondre à vos attentes pour les activités multimédias et la bureautique.
  ",
  701,1382,"produit59.png",76,b'1',20,4
  ),
  ("LOGITECH MX VERTICAL - GRIS/SANS FIL",
  "Vous ressentez des douleurs aux poignets après vos journées de travail sur ordinateur ? Les souris ergonomiques sont conçues pour régler ce problème.",
  358,1276,"produit60.png",49,b'1',20,6
  ),

  ("LOGITECH H540 - NOIR/USB/FILAIRE",
  "Utilisation : Bureautique - Type : Supra-auriculaire - Connectivité : Filaire - Couleur : Noir - Connecteur : USB - Micro : Oui - Technologie Audio :Stereo",
  327,371,"produit61.png",80,b'1',21,6
  ),
  ("T'NB ACTIV 400S - BLUETOOTH STÉRÉO",
  "Concepteurs de qualité audio, T'nB a créé le micro casque Activ 400S pour répondre aux attentes des mélomanes les plus exigeants. 
   Grâce à sa connectivité sans fil, vous pouvez écouter de la musique ou passer des appels sans être gêné par des câbles encombrants.",
  487,818,"produit62.png",48,b'1',21,1
  ),
  ("BLUESTORK MC 401 STEREO",
  "Utilisation : Pro - Type : Supra-auriculaire - Connectivité : Filaire - Couleur : Gris - Connecteur : Jack 3.5 - Micro : Oui - Technologie Audio :Stereo",
  765,285,"produit63.png",30,b'1',21,2
  ),
  ("BLUESTORK MC301",
  "Si vous recherchez un modèle qui vous permet de discuter en ligne, au bureau ou à la maison tout en réduisant complètement le bruit de fond, 
  ce micro casque Bluestork MC301 est le choix parfait pour obtenir une excellente qualité sonore.",
  470,780,"produit64.png",59,b'1',21,3
  );



INSERT INTO ligne_commande (`ligncom_quantite`,`ligncom_prixunitaire`,`ligncom_produit_id`,`lingom_com_id`)
VALUES
  (7,1336,18,7),
  (13,642,31,1),
  (10,480,12,2),
  (4,684,45,4),
  (8,919,64,5),
  (4,479,37,8),
  (2,317,25,3),
  (13,398,59,10),
  (9,309,33,6),
  (7,1283,30,9);


INSERT INTO livraison_inclut (`produit_id`,`livraison_id`,`quantite`)
VALUES
  (62,3,8),
  (33,3,7),
  (10,1,7),
  (42,2,1);


INSERT INTO facturation (`facture_adresse_id`,`facture_com_id`,`facture_date`)
VALUES
  (11,2,"2023-12-8"),
  (1,5,"2023-6-28"),
  (14,8,"2023-10-19"),
  (8,10,"2023-3-17");
