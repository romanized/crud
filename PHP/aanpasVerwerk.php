<!DOCTYPE html>
<html>
<head>
    <title>Item Aanpassen</title>
    <link rel="shortcut icon" href="../MEDIA/14148.png" type="image/x-icon">
</head>
<body>
<?php
require 'session.inc.php';
require 'config.php';


// Haal de waarden uit het formulier
$id = $_POST['id'];
$onderwerp = mysqli_real_escape_string($mysqli, $_POST['onderwerp']);
$inhoud = mysqli_real_escape_string($mysqli, $_POST['inhoud']);
$begindatum = $_POST['begindatum'];
$einddatum = $_POST['einddatum'];
$prioriteit = $_POST['prioriteit'];
$status = mysqli_real_escape_string($mysqli, $_POST['status']);

// VALIDATIE
$begindatum_valid = DateTime::createFromFormat('Y-m-d', $begindatum) !== false;
$einddatum_valid = DateTime::createFromFormat('Y-m-d', $einddatum) !== false;
$prioriteit_valid = filter_var($prioriteit, FILTER_VALIDATE_INT) !== false && $prioriteit >= 1 && $prioriteit <= 5;

if ($begindatum_valid && $einddatum_valid && $prioriteit_valid) {
    $query = "UPDATE crud_agenda SET Onderwerp='$onderwerp', Inhoud='$inhoud', Begindatum='$begindatum', Einddatum='$einddatum', Prioriteit=$prioriteit, Status='$status' WHERE ID = $id";

    if (mysqli_query($mysqli, $query)) {
        echo "Item succesvol bijgewerkt.";
    } else {
        echo "Fout bij het bijwerken van item: " . mysqli_error($mysqli);
    }
} else {
    echo "Validatie fout. Controleer de ingevoerde gegevens.";
}

echo "<a href='toonagenda.php'><br/>OVERZICHT</a>";
?>
</body>
</html>