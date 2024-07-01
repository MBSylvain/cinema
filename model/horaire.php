<?php
function insertHoraire($conn, $idCinema, $idFilm, $dateHeure) {
    $sql = "INSERT INTO Horaire (ID_Cinema, ID_Film, DateHeure) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $idCinema, $idFilm, $dateHeure);
    $stmt->execute();
    return $stmt->affected_rows;
}
?>
