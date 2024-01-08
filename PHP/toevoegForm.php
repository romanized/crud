<!DOCTYPE html>
<html>
<head>
    <title>Item Toevoegen</title>
    <link rel="stylesheet" href="../CSS/toevoegForm.css">
    <link rel="shortcut icon" href="../MEDIA/images.png" type="image/x-icon">
</head>
<body>
    <?php
    require 'session.inc.php';
    // Controleer of een CSRF-token aanwezig is in de sessie, zo niet, maak er een
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    ?>

    <form action="../PHP/toevoegVerwerk.php" method="post">
        <label>Onderwerp: <input type="text" name="onderwerpVeld" required></label>
        <label>Inhoud: <input type="text" name="inhoudVeld" required></label>
        <label>Begindatum: <input type="date" name="begindatumVeld" required></label>
        <label>Einddatum: <input type="date" name="einddatumVeld" required></label>
        <label>Prioriteit: <input type="number" id="prioriteitVeld" name="prioriteitVeld" min="1" max="5" required oninput="validatePrioriteit()"></label>
        <label>Status: 
            <select name="statusVeld" required>
                <option value="">Kies een status...</option>
                <option value="Niet begonnen">Niet begonnen</option>
                <option value="Bezig">Bezig</option>
                <option value="Afgerond">Afgerond</option>
            </select>
        </label>
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="submit" value="Voeg toe aan agenda">
    </form>
    <script defer src="../JS/toevoegForm.js"></script>
</body>
</html>
