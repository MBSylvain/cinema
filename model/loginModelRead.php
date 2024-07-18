<?php
$stmt = $pdo->prepare('SELECT id, email, password, role FROM Utilisateurs WHERE email = :email');
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch();
