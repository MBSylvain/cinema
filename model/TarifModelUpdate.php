<?php
$SqlTarif = "UPDATE Tarifs SET tarif_enfant = ?, tarif_adulte = ?, tarif_senior = ?, tarif_etudiant = ? WHERE ID = ?";
$stmtTarif = $pdo->prepare($SqlTarif);
$ResultTarif = $stmtTarif->execute([$tarif_enfant, $tarif_adulte, $tarif_senior, $tarif_etudiant, $cinema]);
