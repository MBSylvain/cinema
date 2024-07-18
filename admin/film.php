<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <title>Afficher les Données</title>
</head>

<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="ajouter_film.php">Ajouter un Film</a>
        <a href="afficher_donnees.php">Afficher les Données</a>
        <a href="../controleurs/deconnexionControle.php">Déconnexion</a>
    </div>
    <div class="content">
        <h1>Données des Films</h1>
        <?php
        include('../model/connexionBD.php');

        // Récupération des données des films
        $stmt = $pdo->prepare('SELECT film  AS film, f.Realisateur, f.DateSortie, f.Duree, f.Resume, f.Affiche, 
                                      c.Nom AS cinema, h.Jour, h.CreneauMatin, h.CreneauApresMidi, 
                                      t.TarifEnfant, t.TarifAdulte, t.TarifSenior, t.TarifEtudiant
                               FROM films f
                               JOIN cinemas_films cf ON f.ID_Film = cf.ID_Film
                               JOIN cinemas c ON cf.ID_Cinema = c.ID_Cinema
                               JOIN horaires h ON f.ID_Film = h.ID_Film
                               JOIN tarifs t ON f.ID_Film = t.ID_Film');
        $stmt->execute();
        $films = $stmt->fetchAll();

        if (!empty($films)) {
            echo '<table>';
            echo '<tr><th>Film</th><th>Réalisateur</th><th>Date de Sortie</th><th>Durée</th><th>Résumé</th><th>Affiche</th><th>Cinéma</th><th>Jour</th><th>Créneaux Matin</th><th>Créneaux Après-midi</th><th>Tarif Enfant</th><th>Tarif Adulte</th><th>Tarif Senior</th><th>Tarif Étudiant</th></tr>';

            foreach ($films as $film) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($film['film']) . '</td>';
                echo '<td>' . htmlspecialchars($film['Realisateur']) . '</td>';
                echo '<td>' . htmlspecialchars($film['DateSortie']) . '</td>';
                echo '<td>' . htmlspecialchars($film['Duree']) . '</td>';
                echo '<td>' . htmlspecialchars($film['Resume']) . '</td>';
                echo '<td><img src="' . htmlspecialchars($film['Affiche']) . '" alt="Affiche du film" width="50"></td>';
                echo '<td>' . htmlspecialchars($film['cinema']) . '</td>';
                echo '<td>' . htmlspecialchars($film['Jour']) . '</td>';
                echo '<td>' . htmlspecialchars($film['CreneauMatin']) . '</td>';
                echo '<td>' . htmlspecialchars($film['CreneauApresMidi']) . '</td>';
                echo '<td>' . htmlspecialchars($film['TarifEnfant']) . '</td>';
                echo '<td>' . htmlspecialchars($film['TarifAdulte']) . '</td>';
                echo '<td>' . htmlspecialchars($film['TarifSenior']) . '</td>';
                echo '<td>' . htmlspecialchars($film['TarifEtudiant']) . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Aucune donnée disponible</p>';
        }
        ?>
    </div>
</body>

</html>