<?php
// Insertion des informations du film dans la BDD
$SqlFilm = 'INSERT INTO Film (Titre, Réalisateur, DateDeSortie, Durée, Affiche) VALUES (?, ?, ?, ?, ?)';
$stmtFilm = $pdo->prepare($SqlFilm);
$resultFilm = $stmtFilm->execute([$titre, $realisateur, $date_de_sortie, $duree, $affiche]);

// Récupérer l'ID du film inséré
$id_film = $pdo->lastInsertId();
