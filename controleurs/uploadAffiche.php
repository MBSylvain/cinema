// Vérifier si le fichier a été téléchargé sans erreur
<?php
if ($affiche['error'] == 0) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($affiche["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Vérifier si le fichier est une image
    $check = getimagesize($affiche["tmp_name"]);
    if ($check !== false) {
        // Déplacer le fichier téléchargé dans le répertoire cible
        if (move_uploaded_file($affiche["tmp_name"], $target_file)) {
            // Insérer le film dans la table Film avec le chemin de l'affiche
            $sql = "INSERT INTO Film (Titre, Réalisateur, DateDeSortie, Durée, Affiche) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $titre, $realisateur, $date_de_sortie, $duree, $target_file);

            if ($stmt->execute()) {
                echo "Film ajouté avec succès.";
            } else {
                echo "Erreur: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    } else {
        echo "Le fichier n'est pas une image.";
    }
} else {
    echo "Erreur de téléchargement du fichier.";
}
