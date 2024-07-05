<?php
$SqlHoraire = "INSERT INTO Horaires (Jour, Creneau1_Matin, Creneau2_Matin, Creneau3_Matin, Creneau4_Matin, Creneau1_ApresMidi, Creneau2_ApresMidi, Creneau3_ApresMidi, Creneau4_ApresMidi, ID_Cinema, ID_Film) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtH = $pdo->prepare($SqlHoraire);
$resultHoraire = $stmtH->execute([
    $jour,
    $creneau1_matin,
    $creneau2_matin,
    $creneau3_matin,
    $creneau4_matin,
    $creneau1_apresmidi,
    $creneau2_apresmidi,
    $creneau3_apresmidi,
    $creneau4_apresmidi,
    $cinema,
    $id_film
]);
