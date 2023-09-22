--Chiffre d'affaires mois par mois pour une année sélectionnée
SELECT MONTH(com_date) AS 'Le mois', SUM(ligncom_prixunitaire * ligncom_quantite) AS 'Chiffre d\'affaires'
FROM ligne_commande LC
JOIN commande C ON C.com_id = LC.lingom_com_id
WHERE  YEAR(com_date) = 2023
GROUP BY MONTH(com_date)
ORDER BY `Le mois` ASC;


--Chiffre d'affaires généré pour un fournisseur
SELECT fournis_nom AS 'Le nom du fournisseur', SUM(ligncom_prixunitaire * ligncom_quantite) AS 'Chiffre d\'affaires'
FROM fournisseur F
JOIN produit P ON P.produit_fournis_id = F.fournis_id
JOIN ligne_commande LC ON LC.ligncom_produit_id = P.produit_id
WHERE fournis_nom = 'Semper Inc.';

--TOP 10 des produits les plus commandés pour une année sélectionnée (référence et nom du produit, quantité commandée, fournisseur)
SELECT produit_id AS 'Référence produit', produit_libelle AS 'Nom du produit', SUM(ligncom_quantite) AS 'Quantité commandée', fournis_nom AS 'Nom du fournisseur'
FROM produit P
JOIN ligne_commande LC ON LC.ligncom_produit_id = P.produit_id
JOIN fournisseur F ON F.fournis_id = P.produit_fournis_id
GROUP BY produit_id
ORDER BY `Quantité commandée` DESC
LIMIT 10;


--TOP 10 des produits les plus rémunérateurs pour une année sélectionnée (référence et nom du produit, marge, fournisseur)
SELECT produit_id AS 'Référence produit', produit_libelle AS 'Nom du produit', SUM(ligncom_prixunitaire * ligncom_quantite) AS 'TOTAL', fournis_nom AS 'Nom du fournisseur'
FROM produit P
JOIN ligne_commande LC ON LC.ligncom_produit_id = P.produit_id
JOIN fournisseur F ON F.fournis_id = P.produit_fournis_id
GROUP BY produit_id
ORDER BY `TOTAL` DESC
LIMIT 10;


--Top 10 des clients en nombre de commandes ou chiffre d'affaires
SELECT user_id AS 'Client Id', user_nom AS 'Client Nom', SUM(ligncom_prixunitaire * ligncom_quantite) AS 'Chiffre d\'affaires', user_type AS 'type de client'
FROM users U
JOIN commande C ON C.com_user_id = U.user_id
JOIN ligne_commande LC ON LC.lingom_com_id = C.com_id
GROUP BY user_id
ORDER BY `Chiffre d'affaires` DESC
LIMIT 10;


--Répartition du chiffre d'affaires par type de client
SELECT user_id AS 'Client Id', user_nom AS 'Client Nom', SUM(ligncom_prixunitaire * ligncom_quantite) AS 'Chiffre d\'affaires'
FROM users U
JOIN commande C ON C.com_user_id = U.user_id
JOIN ligne_commande LC ON LC.lingom_com_id = C.com_id
WHERE user_type = 'Particulier'
GROUP BY user_id
ORDER BY `Chiffre d'affaires` DESC
LIMIT 10;


--Nombre de commandes en cours de livraison.
SELECT COUNT(com_id) AS 'Nombre de commandes en cours de livraison'
FROM commande
WHERE com_statut = 'Expédiée' || com_statut = 'En livraison';