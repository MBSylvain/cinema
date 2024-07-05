<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des ID des cinémas sélectionnés
    $id_cinema = $_POST['cinema'];

    // Récupérer les données du formulaire ajouter un film
    $titre = $_POST['film'];
    $realisateur = $_POST['realisateur'];
    $date_de_sortie = $_POST['date_sortie'];
    $duree = $_POST['duree'];
    $affiche = $_POST['affiche'];

    // Récupérer les données du formulaire
    $jours = $_POST['jours'];
    $creneau1_matin = $_POST['creneau1_matin'];
    $creneau2_matin = $_POST['creneau2_matin'];
    $creneau3_matin = $_POST['creneau3_matin'];
    $creneau4_matin = $_POST['creneau4_matin'];
    $creneau1_apresmidi = $_POST['creneau1_apresmidi'];
    $creneau2_apresmidi = $_POST['creneau2_apresmidi'];
    $creneau3_apresmidi = $_POST['creneau3_apresmidi'];
    $creneau4_apresmidi = $_POST['creneau4_apresmidi'];

    // Récupérer les données du formulaire Tarifs
    $tarif_enfant = $_POST['tarif_enfant'];
    $tarif_adulte = $_POST['tarif_adulte'];
    $tarif_senior = $_POST['tarif_senior'];
    $tarif_etudiant = $_POST['tarif_etudiant'];

    // Connexion à la BDD
    include('../model/connexionBD.php');
    include('../model/filmModel.php');

    // Insertion des horaires et tarifs pour chaque cinéma sélectionné
    foreach ($id_cinema as $cinema) {
        foreach ($jours as $jour) {
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
            echo "Nouveau record créé avec succès pour le cinéma ID $cinema, jour $jour.<br>";
        }
    }
    foreach ($id_cinema as $cinema) {
        include_once('../model/filmModelRead.php');
        if ($resultTarif) {
            include_once('../model/tarifModel.php');
            echo "Tarifs ajoutés pour le cinéma ID $cinema.<br>";
        }
    }
}
header('Location:../admin/tableauDeBord.php');
