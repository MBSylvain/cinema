<?php
session_start();
// Récupération des information du formulaire de connexion 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    var_dump($email);
    include('../model/connexionBD.php');
    //Lecture de la table utilisateur
    $utilisateur = 'SELECT id, nom, prenom, email, password, role FROM Utilisateurs';
    $stmt = $pdo->prepare($utilisateur);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($user);
    if (password_verify($password, $user['email'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        echo ('Connexion réussi Vous allez être redirigé vers le tableau de bord');
        exit();
    } else {
        $error = "Invalid password.";
    }
}
