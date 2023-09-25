-- une vue correspondant à la jointure Produits - Fournisseurs
CREATE VIEW produits_fournisseurs
AS
SELECT PR.*, fournis_nom AS 'Nom du fournisseur', pays_nom AS 'Pays du fournisseur'
FROM produit PR
JOIN fournisseur F ON F.fournis_id = PR.produit_fournis_id
JOIN pays PY ON PY.pays_id = F.fournis_pays_id;



-- une vue correspondant à la jointure Produits - Catégorie/Sous catégorie
CREATE VIEW produits_categorie_souscategorie
AS
SELECT produit_id, produit_libelle, produit_descrip, produit_prixachat, produit_prixht, produit_photo, produit_stock, produit_active, produit_fournis_id,
produit_categ_id AS 'ID sous catégorie',
SCA.categ_libelle AS 'Sous catégorie', CA.categ_id AS 'ID Catégorie', CA.categ_libelle AS 'Catégorie'
FROM produit PR
JOIN categorie SCA ON SCA.categ_id = PR.produit_categ_id
JOIN categorie CA ON CA.categ_id = SCA.sous_categ_id
ORDER BY CA.categ_id ASC;