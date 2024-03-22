<?php
require "controller.php";


$decoUser = new Administration();
$decoUser->deconexion($_SESSION["id"]);
session_start();
session_unset();
session_destroy();

header("Location: login.php");
