<?php
if (isset($_POST)) {
    //information sur le film
    $titre = $_POST['film'];
    $realisateur = $_POST['realisateur'];
    $date_de_sortie = $_POST['date_sortie'];
    $duree = $_POST['duree'];
    $affiche = $_POST['affiche'];
    //informations sur les horaires

    include('../model/connexionBD.php');
    $sql = 'INSERT INTO Film (Titre, Réalisateur, DateDeSortie, Durée, Affiche) VALUES (?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([$titre, $realisateur, $date_de_sortie, $duree, $affiche]);
    var_dump($result);
} else {
    // Code à exécuter si $_POST n'est pas défini
}
