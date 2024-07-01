<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $jours = isset($_POST['jours']) ? $_POST['jours'] : [];
    $creneau1_matin = $_POST['creneau1_matin'];
    $creneau2_matin = $_POST['creneau2_matin'];
    $creneau3_matin = $_POST['creneau3_matin'];
    $creneau4_matin = $_POST['creneau4_matin'];
    $creneau1_apresmidi = $_POST['creneau1_apresmidi'];
    $creneau2_apresmidi = $_POST['creneau2_apresmidi'];
    $creneau3_apresmidi = $_POST['creneau3_apresmidi'];
    $creneau4_apresmidi = $_POST['creneau4_apresmidi'];
    $id_cinema = $_POST['id_cinema'];
    $id_film = $_POST['id_film'];

    // Connexion à la base de données
    $conn = new mysqli("hostname", "username", "password", "database");

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Préparer et exécuter les insertions
    foreach ($jours as $jour) {
        $sql = "INSERT INTO Horaires (Jour, Creneau1_Matin, Creneau2_Matin, Creneau3_Matin, Creneau4_Matin, Creneau1_ApresMidi, Creneau2_ApresMidi, Creneau3_ApresMidi, Creneau4_ApresMidi, ID_Cinema, ID_Film) VALUES ('$jour', '$creneau1_matin', '$creneau2_matin', '$creneau3_matin', '$creneau4_matin', '$creneau1_apresmidi', '$creneau2_apresmidi', '$creneau3_apresmidi', '$creneau4_apresmidi', $id_cinema, $id_film)";

        if ($conn->query($sql) === TRUE) {
            echo "Nouveau record créé avec succès pour $jour<br>";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fermer la connexion
    $conn->close();
}
