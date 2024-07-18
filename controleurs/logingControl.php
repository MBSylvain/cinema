<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    include('../model/connexionBD.php');

    include_once('../model/loginModelRead.php');
    var_dump($user);
    // Check if the user exists and the password is correct
    if ($email == $user['email'] && $mdp == $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['prenom'] = $user['prenom'];
        // Authentication by role
        if ($user['role'] == 'administrateur') {
            header('Location: ../admin/tableauDeBord.php'); // Admin dashboard URL
        } elseif ($user['role'] == 'manageur') {
            header('Location: ../manageur/tableauDeBord.php'); // Manager dashboard URL
        } else {
            header('Location: login.php'); // Default user dashboard URL
        }
        exit();
    } else {
        echo 'Le mot de passe ou l\'email est invalide';
        // header('Location: ../index.php');
        var_dump($email);
        var_dump($_POST['password']);
        var_dump($mdp);
    }
}
