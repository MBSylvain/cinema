<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    include('../model/connexionBD.php');

    include_once('../model/loginModelRead.php');

    try {
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the user exists and the password is correct
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            echo 'Connexion réussie. Vous allez être redirigé vers le tableau de bord';
            connexionOk();
            // Authentication by role
            if ($user['role'] == 'administrateur') {
                header('Location: ..admin/tableauDeBord.php'); // Admin dashboard URL
            } elseif ($user['role'] == 'manageur') {
                header('Location: ..admin/tableauDeBord.php'); // User dashboard URL
            } else {
                header('Location: ..admin/tableauDeBord.php'); // Default dashboard URL
            }
            exit();
        } else {
            echo 'Le mot de passe ou l\'email est invalide';
            sleep(5);
            header('Location: ../login.php');
            exit();
        }
    } catch (PDOException $e) {
        echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
    }
}

function connexionOk()
{
    echo 'Connexion réussie. Vous allez être redirigé vers le tableau de bord';
}
