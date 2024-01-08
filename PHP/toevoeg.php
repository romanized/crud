<?php
require 'session.inc.php';
require 'config.php';

//Maak een toevoeg-query (let op de verschillende aanhalingstekens!)
$query = "INSERT INTO crud_agenda";
$query .= " (Onderwerp, Inhoud, Begindatum, Einddatum, Prioriteit, Status)";
$query .= " VALUES ('OOP2', 'Opdracht 4.1 maken', '2023-12-24', '2023-12-24', 2, 'b')";

    //Voor de query uit het vang het 'resultaat' op
    //LET OP: het resultaat geeft aan of het wel of niet is gelukt ('true'/'false')
    $result = mysqli_query($mysqli, $query);

    //Controleer of het is gelukt
    if ($result)
    {
        echo "Het item is toegevoegd!<br/>";
    }
    else
    {
        echo "FOUT bij toevoegen<br/>";
    }

    //Terug naar het overzicht
    echo "<a href='toonagenda.php'>OVERZICHT</a> ";