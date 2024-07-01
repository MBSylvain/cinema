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
    <? echo "0 résultats"; ?>
<?php } ?>