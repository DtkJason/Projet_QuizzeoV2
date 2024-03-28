<?php
require __DIR__ . "/../../classes/Admin.php";

if (isset($_GET["idTicket"])) {
    $idTicket = $_GET["idTicket"];
    $prendreTicket = new Admin();
    $prendreTicket->cloturerTicket($idTicket);

    header("Location: test.php");
    exit();
}
