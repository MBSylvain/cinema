<?php
include('../model/connexionBD.php');

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $codePostal = $_POST['codePostal'];

    include_once('./model/cinemaModel.php');
    if ($stm) {
        echo "Votre prestation a bien été enregistrée dans la base de données";
    } else {
        echo "Il y a eu une erreur lors de l'enregistrement de votre prestation";
    }
} else {
    echo ('problemo');
}
