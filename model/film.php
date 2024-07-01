<?php
function insertFilm($conn, $titre, $realisateur, $dateDeSortie, $duree)
{
    $sql = "INSERT INTO Film (Titre, Réalisateur, DateDeSortie, Durée) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->affected_rows;
}
