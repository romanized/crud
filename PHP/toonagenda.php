<!DOCTYPE html>
<html>
<head>
    <title>Agenda Overzicht</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/toonagenda.css">
    <link rel="shortcut icon" href="../MEDIA/images.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="container text-center">
    <?php
    require 'session.inc.php';
    require 'config.php';

    echo "<h3>Hallo " . $_SESSION['gebruikersnaam'] . "!</h3>";

    //Maak de query
    $query = "SELECT * FROM crud_agenda";

    //Voer de query uit, en vang het resultaat op
    $result = mysqli_query($mysqli, $query);

    if (!$result) {
        echo "<p>FOUT!</p>";
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "</p>";
        exit;
    }
    echo '<div class="table-responsive">';
    echo '<table class="table table-striped table-hover">';
    echo "<tr><th>Onderwerp</th><th>Inhoud</th><th>Detail</th><th>Verwijder</th><th>Pas aan</th></tr>";

    if (mysqli_num_rows($result) > 0) {
        while ($item = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $item['Onderwerp'] . "</td>";
            echo "<td>" . $item['Inhoud'] . "</td>";
            echo "<td><a href='detail.php?id=" . $item['ID'] . "'>Detail</a></td>";
            echo "<td><a href='verwijder.php?id=" . $item['ID'] . "'>Verwijder</a></td>";
            echo "<td><a href='pasaan.php?id=" . $item['ID'] . "'>Pas aan</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Geen items gevonden!</td></tr>";
    }

    echo '</table>';
    echo '</div>';
    echo "<a href='toevoegForm.php' class='btn btn-primary btn-spacing'>Item toevoegen</a>";
    echo "<a href='uitlog.php' class='btn btn-secondary'>Uitloggen</a>";    
    ?>
</body>
</html>