<!DOCTYPE html>
<html>
<head>
    <title>Item Verwijderen</title>
    <link rel="shortcut icon" href="../MEDIA/1250743.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
<?php
require 'session.inc.php';
require 'config.php';

// CSRF-token en HTTP-referrer controle
$csrf_token = $_POST['csrf_token'] ?? '';
$valid_token = $csrf_token === $_SESSION['csrf_token'];
$valid_referrer = strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $valid_token && $valid_referrer) {
    // Valideer de begindatum, einddatum en prioriteit
    $begindatum = $_POST['begindatumVeld'];
    $einddatum = $_POST['einddatumVeld'];
    $prioriteit = $_POST['prioriteitVeld'];
    if ($prioriteit < 1 || $prioriteit > 5) {
        echo "Ongeldige prioriteit. Moet tussen 1 en 5 zijn.</br><a href='toonagenda.php'>OVERZICHT</a>";
        exit;
    }
    

    $begindatum_valid = DateTime::createFromFormat('Y-m-d', $begindatum) !== false;
    $einddatum_valid = DateTime::createFromFormat('Y-m-d', $einddatum) !== false;
    $prioriteit_valid = filter_var($prioriteit, FILTER_VALIDATE_INT) !== false && $prioriteit >= 1 && $prioriteit <= 5;

    if ($begindatum_valid && $einddatum_valid && $prioriteit_valid) {
        // Opschonen van invoergegevens
        $onderwerp = mysqli_real_escape_string($mysqli, $_POST['onderwerpVeld']);
        $inhoud = mysqli_real_escape_string($mysqli, $_POST['inhoudVeld']);
        $status = mysqli_real_escape_string($mysqli, $_POST['statusVeld']);

        // Maak de INSERT-query
        $query = "INSERT INTO crud_agenda (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status) VALUES ('$onderwerp', '$inhoud', '$begindatum', '$einddatum', $prioriteit, '$status')";

        if (mysqli_query($mysqli, $query)) {
            echo "Item succesvol toegevoegd ";
        } else {
            echo "<div class='alert alert-danger'>Fout bij het toevoegen van item: " . mysqli_error($mysqli) . "</div>";
        }
    } else {
        echo "Validatie fout. Controleer de ingevoerde gegevens.</br><a href='toonagenda.php'>OVERZICHT</a>";
    }
} else {
    echo "Ongeldige CSRF-token of referentie.</br><a href='toonagenda.php'>OVERZICHT</a></br><a href='toonagenda.php'>OVERZICHT</a>";
}

echo "<br><a href='toonagenda.php' class='btn btn-primary mt-3'>OVERZICHT</a>";

?>
</div>
</body>
</html>