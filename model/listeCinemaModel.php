<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinema";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
// définir le mode d'erreur PDO sur exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Votre requête S
$stmt = $pdo->prepare('SELECT `ID_Cinema`, `Nom`, `Adresse`, `Ville`, `CodePostal` FROM `partenaire`');
$stmt->execute();
$result = $stmt->fetchAll();
var_dump($result); ?>

<?php if (!empty($result)) { ?>


    <form action="" method="post">
        <legend>Sélection du Cinéma</legend>
        <label for="cinema">Sélectionnez un cinéma :</label>
        <fieldset id="selection-cinema">
            <?php foreach ($result as $row) { ?>

                <input type="checkbox" name="cinema[]" value="<?php echo htmlspecialchars($row['ID_Cinema']); ?>" id="<?php $row['Nom']; ?>">
                <label for="cinema-<?php echo htmlspecialchars($row['Nom']); ?>"><?php echo htmlspecialchars($row['Nom']); ?></label>
            <?php } ?>
            <input type="hidden" name="test" value=<?= $row['ID_Cinema'] ?>>
            <input type="submit" value="Valider les partenaires">
        </fieldset>

    </form>

<?php } else { ?>
    <? echo "0 résultats";     ?>
<?php } ?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"); {
    $id_cinema = $_POST['cinema'];
    foreach ($id_cinema as $test) {;
        echo ($test);
    }
}
?>