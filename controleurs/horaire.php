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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cinema";

    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // définir le mode d'erreur PDO sur exception
    $stmt = $pdo->prepare("INSERT INTO Horaires (Jour, Creneau1_Matin, Creneau2_Matin, Creneau3_Matin, Creneau4_Matin, Creneau1_ApresMidi, Creneau2_ApresMidi, Creneau3_ApresMidi, Creneau4_ApresMidi, ID_Cinema, ID_Film) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $id_cinema = ['1', '2', '3'];

    // Préparer et exécuter les insertions par jours
    foreach ($jours as $jour) {
        foreach ($id_cinema as $cinema) {
            $stmt->execute([
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
            echo "Nouveau record créé avec succès pour $jour et cinéma $cinema<br>";
        }
    }

    // Fermer la connexion

}
