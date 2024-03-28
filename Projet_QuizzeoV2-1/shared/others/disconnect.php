<?php
require __DIR__ . "/../../classes/Authentification.php";

if (isset($_SESSION["id"])) {
    $idUser = $_SESSION["id"];
}

$offline = new Authentification();
$offline->setOffline($idUser);

session_start();
session_unset();
session_destroy();

header("Location: ../../views/login.php");
