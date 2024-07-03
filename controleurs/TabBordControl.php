<?php
// Récupération des cinémas partenaire
$stmt = $pdo->prepare('SELECT `ID_Cinema`, `Nom`, `Adresse`, `Ville`, `CodePostal` FROM `partenaire`');
$stmt->execute();
$result = $stmt->fetchAll(); ?>
<form action="" method="post">
    <?php if (!empty($result)) { ?>
        <fieldset id="selection-cinema">
            <legend>Sélection du Cinéma</legend>
            <label for="cinema">Sélectionnez un cinéma :</label>
            <select multiple name="cinema" id="cinema" required>
                <?php foreach ($result as $row) { ?>
                    <option value="<?php echo htmlspecialchars($row['Nom']); ?>"><?php echo htmlspecialchars($row['Nom']); ?></option>
                <?php } ?>
            </select>
        </fieldset>

    <?php } else { ?>
        <? echo "0 résultats";     ?>
    <?php } ?>
    <input type="submit" value="Valider les partenaires">

</form>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des ID des cinéma selectionné
    $id_cinema = $_POST['cinema'];


    // Récupérer les données du formulaire ajouter un film
    $titre = $_POST['film'];
    $realisateur = $_POST['realisateur'];
    $date_de_sortie = $_POST['date_sortie'];
    $duree = $_POST['duree'];
    $affiche = $_POST['affiche'];

    // Récupérer les données du formulaire
    $jours = isset($_POST['jours']) ? $_POST['jours'] : [];
    $creneau1_matin = $_POST['creneau1_matin'];
    $creneau2_matin = $_POST['creneau2_matin'];
    $creneau3_matin = $_POST['creneau3_matin'];
    $creneau4_matin = $_POST['creneau4_matin'];
    $creneau1_apresmidi = $_POST['creneau1_apresmidi'];
    $creneau2_apresmidi = $_POST['creneau2_apresmidi'];
    $creneau3_apresmidi = $_POST['creneau3_apresmidi'];
    $creneau4_apresmidi = $_POST['creneau4_apresmidi'];
    $id_film = $_POST['id_film'];

    // Récupérer les données du formulaire Tarifs
    $tarif_enfant = $_POST['tarif_enfant'];
    $tarif_adulte = $_POST['tarif_adulte'];
    $tarif_senior = $_POST['tarif_senior'];
    $tarif_etudiant = $_POST['tarif_etudiant'];

    //connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cinema";

    // Connexion à la BDD
    include('../model/connexionBD.php');

    foreach ($id_cinema as $test) {;

        // Insertion les informations du film dans la BDD
        $SqlFilm = 'INSERT INTO Film (Titre, Réalisateur, DateDeSortie, Durée, Affiche) VALUES (?, ?, ?, ?, ?)';
        $stmtFilm = $pdo->prepare($SqlFilm);
        $resultFilm = $stmtFilm->execute([$titre, $realisateur, $date_de_sortie, $duree, $affiche]);
        // var_dump($result);


        // Insertion des horaires
        $SqlHoraire = "INSERT INTO Horaires (Jour, Creneau1_Matin, Creneau2_Matin, Creneau3_Matin, Creneau4_Matin, Creneau1_ApresMidi, Creneau2_ApresMidi, Creneau3_ApresMidi, Creneau4_ApresMidi, ID_Cinema, ID_Film) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtH = $pdo->prepare($SqlHoraire);

        foreach ($jours as $jour) {

            $resultHoraire = $stmtH->execute([
                $jour,
                $creneau1_matin,
                $creneau2_matin,
                $creneau3_matin,
                $creneau4_matin,
                $creneau1_apresmidi,
                $creneau2_apresmidi,
                $creneau3_apresmidi,
                $creneau4_apresmidi,
                $cinema,
                $id_film
            ]);
            echo "Nouveau record créé avec succès pour $jour et cinéma $cinema<br>";
        }

        // Insertion des informations des Tarifs des places 
        $SqlTarif = "INSERT INTO tarifs (tarif_enfant, tarif_adulte, tarif_senior, tarif_etudiant) VALUES (?, ?, ?, ?)";
        $stmtTarif = $pdo->prepare($SqlTarif);

        // Exécuter l'insertion
        $ResultTarif = $stmt->execute([$tarif_enfant, $tarif_adulte, $tarif_senior, $tarif_etudiant]);
    }
}
