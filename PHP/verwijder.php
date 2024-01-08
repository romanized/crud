<!DOCTYPE html>
<html>
<head>
    <title>Item Verwijderen</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../MEDIA/1250743.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/verwijder.css">
</head>
<body>
<div>
<?php
require 'session.inc.php';
require 'config.php';
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

// Check of ID bestaat in de database
$checkQuery = "SELECT * FROM crud_agenda WHERE ID = $id";
$checkResult = mysqli_query($mysqli, $checkQuery);

//Lees het id uit de url
$id = $_GET['id'];
//Toon het id op het scherm
echo "<p><strong style='color: #333;'>ID van het agenda-item is: " . $id . "</strong></p>";

if (mysqli_num_rows($checkResult) > 0) {
    echo "<p class='warning'>Weet je het 100% zeker dat je het item wilt verwijderen?<br/> Dit kan niet ongedaan worden!</p>";
    echo "<div class='decision-links'>";
    echo "<a href='verwijder_verwerk.php?id=$id'>JA, IK BEN ZEKER</a>";
    echo "<a href='toonagenda.php' style='background-color: green;'>NEE, NEEM ME TERUG</a>";
    echo "</div>";
}
 else {
    echo "Geen item gevonden met ID: $id";
    echo "<br/> Probeer het <a href='toonagenda.php'>opnieuw</a>";
}
?>
</div>
</body>
</html>