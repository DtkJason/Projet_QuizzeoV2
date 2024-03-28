<?php
require __DIR__ . "/../../classes/Admin.php";

if (isset($_GET["idTicket"]) && isset($_SESSION["id"])) {
    $idTicket = $_GET["idTicket"];
    $idAdmin = $_SESSION["id"];
    $prendreTicket = new Admin();
    $prendreTicket->prendreTicket($idTicket, $idAdmin);

    header("Location: test.php");
    exit();
}
