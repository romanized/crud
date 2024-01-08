<?php
// Database logingegevens
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = '090006_database';

// Maak de database-verbinding
$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// Als de verbinding niet gemaakt kan worden: geef een melding
if (!$mysqli) {
    echo "FOUT: geen connectie naar database. <br>";
    echo "Error: " . mysqli_connect_error() . "<br/>";
    exit;
}
