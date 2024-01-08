<?php
$wachtwoord = 'glr123';
$gehashtWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
echo $gehashtWachtwoord;
?>
