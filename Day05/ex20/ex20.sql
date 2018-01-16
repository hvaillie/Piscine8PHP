SELECT b.id_genre AS 'id_genre',
       b.nom AS 'nom genre',
       c.id_distrib AS 'id_distrib',
       c.nom AS 'nom distrib',
       a.titre AS 'titre film'
  FROM film AS a
  LEFT JOIN genre as b ON b.id_genre = a.id_genre
  LEFT JOIN distrib AS c ON c.id_distrib = a.id_distrib
  WHERE a.id_genre BETWEEN 4 AND 8
