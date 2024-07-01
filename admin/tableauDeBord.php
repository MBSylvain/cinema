<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Film</title>
</head>

<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="#selection-cinema">Sélection Cinéma</a>
        <a href="#information-film">Information sur le Film</a>
        <a href="#horaires-film">Horaires du Film</a>
        <a href="#tarifs-places">Tarifs des Places</a>
        <a href="#deconnexion">Se Déconnecter</a>
    </div>
    <div class="content">
        <h1>Ajouter un Film</h1>
        <form action="../controleurs/film.php" method="post" enctype="multipart/form-data">
            <!-- Sélection du cinéma -->
            <?php include('../model/connexionBD.php'); ?>
            <?php if (!empty($result)) { ?>
                <fieldset id="selection-cinema">
                    <legend>Sélection du Cinéma</legend>
                    <label for="cinema">Sélectionnez un cinéma :</label>
                    <select multiple name="cinema" id=<? $result['ID_Cinema'] ?> required>

                        <?php foreach ($result as $row) { ?>
                            <option value="<?php echo htmlspecialchars($row['Nom']); ?>"><?php echo htmlspecialchars($row['Nom']); ?></option>
                        <?php } ?>
                    </select>

                </fieldset>

            <?php } else { ?>
                <? echo "0 résultats"; ?>
            <?php } ?>

            <!-- Information sur le film -->
            <form method="post" action="../controleurs/film.php">
                <fieldset id="information-film">
                    <legend>Informations sur le Film</legend>
                    <label for="film">Nom du film :</label>
                    <input type="text" id="film" name="film" required>

                    <label for="realisateur">Nom du réalisateur :</label>
                    <input type="text" id="realisateur" name="realisateur" required>

                    <label for="date_sortie">Date de sortie :</label>
                    <input type="date" id="date_sortie" name="date_sortie" required>

                    <label for="duree">Durée du film (en minutes) :</label>
                    <input type="number" id="duree" name="duree" required>

                    <label for="resume">Résumé du film :</label>
                    <textarea id="resume" name="resume" rows="4" required></textarea>

                    <label for="affiche">Affiche du film :</label>
                    <input type="text" id="affiche" name="affiche" accept="image/*" required>
                </fieldset>
                <input type="submit" name="valider">
            </form>
            <!-- Horaires du film -->
            <h1>Ajouter des Horaires</h1>
            <form action="../controleurs/horaire.php" method="post">
                <fieldset>
                    <legend>Jours:</legend>
                    <label for="lundi">Lundi</label>
                    <input type="checkbox" id="lundi" name="jours[]" value="Lundi">
                    <br>
                    <label for="mardi">Mardi</label>
                    <input type="checkbox" id="mardi" name="jours[]" value="Mardi">
                    <br>
                    <label for="mercredi">Mercredi</label>
                    <input type="checkbox" id="mercredi" name="jours[]" value="Mercredi">
                    <br>
                    <label for="jeudi">Jeudi</label>
                    <input type="checkbox" id="jeudi" name="jours[]" value="Jeudi">
                    <br>
                    <label for="vendredi">Vendredi</label>
                    <input type="checkbox" id="vendredi" name="jours[]" value="Vendredi">
                    <br>
                    <label for="samedi">Samedi</label>
                    <input type="checkbox" id="samedi" name="jours[]" value="Samedi">
                    <br>
                    <label for="dimanche">Dimanche</label>
                    <input type="checkbox" id="dimanche" name="jours[]" value="Dimanche">
                </fieldset>
                <br>

                <label for="creneau1_matin">Créneau 1 Matin:</label>
                <input type="time" id="creneau1_matin" name="creneau1_matin">
                <br><br>

                <label for="creneau2_matin">Créneau 2 Matin:</label>
                <input type="time" id="creneau2_matin" name="creneau2_matin">
                <br><br>

                <label for="creneau3_matin">Créneau 3 Matin:</label>
                <input type="time" id="creneau3_matin" name="creneau3_matin">
                <br><br>

                <label for="creneau4_matin">Créneau 4 Matin:</label>
                <input type="time" id="creneau4_matin" name="creneau4_matin">
                <br><br>

                <label for="creneau1_apresmidi">Créneau 1 Après-midi:</label>
                <input type="time" id="creneau1_apresmidi" name="creneau1_apresmidi">
                <br><br>

                <label for="creneau2_apresmidi">Créneau 2 Après-midi:</label>
                <input type="time" id="creneau2_apresmidi" name="creneau2_apresmidi">
                <br><br>

                <label for="creneau3_apresmidi">Créneau 3 Après-midi:</label>
                <input type="time" id="creneau3_apresmidi" name="creneau3_apresmidi">
                <br><br>

                <label for="creneau4_apresmidi">Créneau 4 Après-midi:</label>
                <input type="time" id="creneau4_apresmidi" name="creneau4_apresmidi">
                <br><br>

                <label for="id_cinema">ID Cinéma:</label>
                <input type="number" id="id_cinema" name="id_cinema" required>
                <br><br>

                <label for="id_film">ID Film:</label>
                <input type="number" id="id_film" name="id_film" required>
                <br><br>

                <input type="submit" value="Ajouter Horaires">
            </form>
            <!-- Tarifs des places -->
            <form method="post" action="">
                <fieldset id="tarifs-places">
                    <legend>Tarifs des Places</legend>
                    <label for="tarif_enfant">Tarif Enfant :</label>
                    <input type="number" id="tarif_enfant" name="tarif_enfant" step="0.01" required>

                    <label for="tarif_adulte">Tarif Adulte :</label>
                    <input type="number" id="tarif_adulte" name="tarif_adulte" step="0.01" required>

                    <label for="tarif_senior">Tarif Senior :</label>
                    <input type="number" id="tarif_senior" name="tarif_senior" step="0.01" required>

                    <label for="tarif_etudiant">Tarif Étudiant :</label>
                    <input type="number" id="tarif_etudiant" name="tarif_etudiant" step="0.01" required>
                </fieldset>

                <input type="submit" value="Ajouter le Film">
            </form>

            <!-- Lien de déconnexion -->
            <fieldset id="deconnexion">
                <legend>Se Déconnecter</legend>
                <a href="votre_script_de_deconnexion.php">Déconnexion</a>
            </fieldset>
    </div>
</body>

</html>