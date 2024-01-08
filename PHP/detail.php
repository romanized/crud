<!DOCTYPE html>
<html>
<head>
    <title>Item Details</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/detail.css">
    <link rel="shortcut icon" href="../MEDIA/images.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
<div class="container text-center">
<?php
require 'session.inc.php';
require 'config.php';

//Lees het id uit de url
$id = $_GET['id'];
//Toon het id op het scherm
echo "<p><strong style='color: #333;'>ID van het agenda-item is: " . $id . "</p>";
//Maak de query om de gegevens van het item op te halen
$query = "SELECT * FROM crud_agenda WHERE ID = " . $id;
//voer de query uitm en vang het resultaat op
$result = mysqli_query($mysqli, $query);

//Als er een record is gevonden...
if (mysqli_num_rows($result) > 0) {
    $item = mysqli_fetch_assoc($result);
    echo "<p><strong style='color: #333;'>Onderwerp:</strong> " . $item['Onderwerp'] . "</p>";
    echo "<p><strong style='color: #333;'>Inhoud:</strong> " . $item['Inhoud'] . "</p>";
    echo "<p><strong style='color: #333;'>Begindatum:</strong> " . $item['Begindatum'] . "</p>";
    echo "<p><strong style='color: #333;'>Einddatum:</strong> " . $item['Einddatum'] . "</p>";
    echo "<p><strong style='color: #333;'>Prioriteit:</strong> " . $item['Prioriteit'] . "</p>";
    echo "<p><strong style='color: #333;'>Status:</strong> " . $item['Status'] . "</p>";
} else {
    echo "Er is geen record met ID: " . $id . "<br/>";
}
?>
<a href='toonagenda.php' class='btn btn-primary mt-3'>OVERZICHT</a>
</div>
</body>
</html>