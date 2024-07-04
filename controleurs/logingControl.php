<?php
session_start();
// Récupération des information du formulaire de connexion 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    var_dump($email);
    include('../model/connexionBD.php');
    //Lecture de la table utilisateur
    $utilisateur = "SELECT ID_Utilisateur, Nom, Email, MotDePasse FROM Utilisateur)";
    $stmt = $pdo->prepare($utilisateur);
    $user = $resultUtilisateur->fetch_assoc();
    if (password_verify($password, $user['MotDePasse'])) {
        $_SESSION['user_id'] = $user['ID_Utilisateur'];
        $_SESSION['email'] = $user['Email'];
        echo ('Connexion réussi Vous allez être redirigé vers le tableau de bord');
        header("Location: admin/dashboard.php");
        exit();
    } else {
        $error = "Invalid password.";
    }
}
