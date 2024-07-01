<?php
$stm = $pdo->prepare('INSERT INTO partenaire (Nom, Adresse, Ville, CodePostal) VALUES(?, ?, ?, ? )');
$stm->execute([$nom, $adresse, $ville, $codePostal]);
