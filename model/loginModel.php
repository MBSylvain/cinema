<?php
function getUserByEmail($conn, $email) {
    $sql = "SELECT * FROM Utilisateur WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    return $stmt->get_result();
}
?>
