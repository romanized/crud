<?php
require 'config.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $mysqli->prepare("SELECT password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['gebruiker_ingelogd'] = true;
        $_SESSION['gebruikersnaam'] = $username;
        header('Location: toonagenda.php');
    } else {
        echo "Onjuiste inloggegevens.";
    }
} else {
    echo "Onjuiste inloggegevens.";
}
?>
