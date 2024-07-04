<?php
function getUserByEmail($conn, $email)
{
    $sql = "SELECT * FROM Utilisateur WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}
