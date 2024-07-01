<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $tarif_enfant = $_POST['tarif_enfant'];
    $tarif_adulte = $_POST['tarif_adulte'];
    $tarif_senior = $_POST['tarif_senior'];
    $tarif_etudiant = $_POST['tarif_etudiant'];
    $id_cinema = 1;

    try {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cinema";

        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer l'instruction SQL
        $stmt = $pdo->prepare("INSERT INTO tarifs (tarif_enfant, tarif_adulte, tarif_senior, tarif_etudiant) VALUES (?, ?, ?, ?)");

        // Exécuter l'insertion
        $stmt->execute([$tarif_enfant, $tarif_adulte, $tarif_senior, $tarif_etudiant]);

        echo "Nouveau tarif créé avec succès";
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

    // Fermer la connexion
    $pdo = null;
}
