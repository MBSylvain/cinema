<?php
$qlTarif = "SELECT tarif_enfant, tarif_adulte, tarif_senior, tarif_etudiant FROM Tarifs WHERE ID = ?";
$tmtTarif = $pdo->prepare($qlTarif);
$tmtTarif->execute([$cinema]);
$resultTarif = $tmtTarif->fetch(PDO::FETCH_ASSOC);
