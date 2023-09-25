-- une procédure stockée qui sélectionne les commandes non soldées (en cours de livraison)
DELIMITER $

CREATE PROCEDURE lst_commandes_en_livraison()
BEGIN
    SELECT com_id AS `Commande ID`,com_statut AS `Commande satut`, com_date `Commande date`
    FROM commande
    WHERE com_statut = 'Expédiée' || com_statut = 'En livraison';
END $

DELIMITER ;



-- une procédure stockée qui renvoie le délai moyen entre la date de commande et la date de facturation
DELIMITER $

CREATE PROCEDURE delai_moyen_datecom_datefacture_jours()

BEGIN
    SELECT CAST(AVG(DATEDIFF(facture_date, com_date)) AS SIGNED) AS 'le délai moyen entre la date de commande et la date de facturation (Jours)'
    FROM commande C
    JOIN facturation F ON C.com_id  = F.facture_com_id;
END $

DELIMITER ;
