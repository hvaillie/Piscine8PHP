SELECT UPPER(c.nom) AS 'NOM', c.prenom, b.prix
  FROM membre AS a
  INNER JOIN abonnement AS b ON b.id_abo = a.id_abo
  INNER JOIN fiche_personne AS c ON c.id_perso = a.id_membre
  WHERE b.prix > 42
  ORDER BY c.nom ASC, c.prenom ASC;
