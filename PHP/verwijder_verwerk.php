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
$id = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

// Valideer de ID
if (!filter_var($id, FILTER_VALIDATE_INT)) {
    echo "Ongeldige ID.";
    exit;
}

// Kijken of het item uberhaupt bestaat
if ($stmt = $mysqli->prepare("SELECT * FROM crud_agenda WHERE ID = ?")) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ik heb rond gezocht wat ik nog meer kon toevoegen en heb gevonden dat ik het volgende kan doen:
        // Verwijder query met prepared statement
        if ($deleteStmt = $mysqli->prepare("DELETE FROM crud_agenda WHERE ID = ?")) {
            $deleteStmt->bind_param("i", $id);
            $deleteStmt->execute();

            if ($deleteStmt->affected_rows > 0) {
                echo "Het item is verwijderd.<br/>";
            } else {
                echo "Fout bij het verwijderen van item. <br/>";
            }
        }
    } else {
        echo "Geen item gevonden met ID: $id";
    }

    $stmt->close();
} else {
    echo "Fout bij het uitvoeren van de query.";
}

echo "<a href='toonagenda.php'>OVERZICHT</a>";
?>
</div>
</body>
</html>