<!DOCTYPE html>
<html>
<head>
    <title>Item Aanpassen</title>
    <link rel="shortcut icon" href="../MEDIA/14148.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/pasaan.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container">
<?php 
require 'session.inc.php';
require 'config.php';

// Haal de ID uit de URL
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!$id) {
    echo "Geen geldige ID opgegeven.";
    exit;
}
//Lees het id uit de url
$id = $_GET['id'];
//Toon het id op het scherm
echo "<p><strong style='color: #333;'>ID van het agenda-item is: " . $id . "</strong></p>";

// Haal de gegevens op voor het specifieke item
$query = "SELECT * FROM crud_agenda WHERE ID = $id";
$result = mysqli_query($mysqli, $query);
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Geen item gevonden met ID: $id";
    exit;
}

$item = mysqli_fetch_assoc($result);
?>

<form action="aanpasVerwerk.php" method="post">
    <input type="hidden" name="id" value="<?php echo $item['ID']; ?>">

    <div class="form-group">
        <label for="onderwerp">Onderwerp:</label>
        <input type="text" class="form-control" name="onderwerp" value="<?php echo $item['Onderwerp']; ?>">
    </div>

    <div class="form-group">
        <label for="inhoud">Inhoud:</label>
        <input type="text" class="form-control" name="inhoud" value="<?php echo $item['Inhoud']; ?>">
    </div>

    <div class="form-group">
        <label for="begindatum">Begindatum:</label>
        <input type="date" class="form-control" name="begindatum" value="<?php echo $item['Begindatum']; ?>">
    </div>

    <div class="form-group">
        <label for="einddatum">Einddatum:</label>
        <input type="date" class="form-control" name="einddatum" value="<?php echo $item['Einddatum']; ?>">
    </div>

    <div class="form-group">
        <label for="prioriteit">Prioriteit:</label>
        <input type="number" class="form-control" name="prioriteit" value="<?php echo $item['Prioriteit']; ?>">
    </div>

    <div class="form-group">
        <label for="status">Status:</label>
        <input type="text" class="form-control" name="status" value="<?php echo $item['Status']; ?>">
    </div>

    <input type="submit" class="btn btn-primary" value="Item aanpassen">

    <a href='toonagenda.php' class='btn btn-secondary'>Terug naar Overzicht</a>
</form>
</div>
</body>
</html>