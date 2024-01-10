<!DOCTYPE html>
<html>

<head>
    <title>Error</title>
    <link rel="shortcut icon" href="../MEDIA/login.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
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
        echo "<div class='error-message'>Onjuiste inloggegevens.</div>";
        echo "<div class='back-to-login'><a href='login.php'>Terug naar Inloggen</a></div>";
    }
} else {
    echo "<div class='error-message'>Onjuiste inloggegevens.</div>";
    echo "<div class='back-to-login'><a href='login.php'>Terug naar Inloggen</a></div>";
}
?>

</body>

</html>