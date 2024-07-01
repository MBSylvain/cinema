<body>
    <h2>Ajouter un Cinéma</h2>
    <form method="post" action="../controleurs/cinemaControl.php">
        <label>Nom:</label>
        <input type="text" name="nom" required><br>
        <label>Adresse:</label>
        <input type="text" name="adresse" required><br>
        <label>Ville:</label>
        <input type="text" name="ville" required><br>
        <label>Code Postal:</label>
        <input type="text" name="codePostal" required><br>
        <button type="submit" name="submit">Soumettre</button>
    </form>

    <a href="tableauDeBord.php">Retour au tableau de bord</a>
</body>

</html>

<?php
