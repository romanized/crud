<?php
session_start();
if (!isset($_SESSION['gebruiker_ingelogd']) || $_SESSION['gebruiker_ingelogd'] !== true) {
    header('Location: login.php');
    exit;
}

//Deze code zet ik overal neer voor beveiling zodat er gecontroleerd word of je ingelogd bent.
