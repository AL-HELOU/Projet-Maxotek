--Sauvgardes:
mysqldump -u alhelou -p maxotek > maxoteksauvgarde.sql;


--Restauration :
mysql -u alhelou -p maxotek < maxoteksauvgarde.sql;