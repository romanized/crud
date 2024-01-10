<!DOCTYPE html>
<html>

<head>
    <title>Inloggen</title>
    <link rel="shortcut icon" href="../MEDIA/login.png" type="image/x-icon">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Inloggen Agenda</h2>
        <form action="login_verwerk.php" method="post">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="custom-btn">Inloggen</button>
        </form>
    </div>
</body>

</html>