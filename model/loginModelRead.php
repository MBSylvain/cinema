<?php
// Fetch the user by email
$utilisateur = 'SELECT id, nom, prenom, email, password, role FROM Utilisateurs WHERE email = :email';
$stmt = $pdo->prepare($utilisateur);
$stmt->bindParam(':email', $email);
