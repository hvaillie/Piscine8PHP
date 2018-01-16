
SELECT COUNT(*) AS 'nb_abo', AVG(prix) DIV 1 AS 'moy_abo', MOD(SUM(duree_abo), 42) as 'ft'
	FROM abonnement;
