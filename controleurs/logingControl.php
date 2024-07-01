<?php
session_start();
include('db.php');
include('model.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = getUserByEmail($conn, $email);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['MotDePasse'])) {
            $_SESSION['user_id'] = $user['ID_Utilisateur'];
            $_SESSION['email'] = $user['Email'];
            header("Location: admin/dashboard.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "No user found with that email.";
    }
}
?>
