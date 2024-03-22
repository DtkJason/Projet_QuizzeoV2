<?php
require "controller.php";


$decoUser = new Administration();
$decoUser->deconexion($_SESSION["id"]);
session_start();
session_unset();
session_destroy();


// zoebfkhdjcbdze;fezfzfz
// dfzfddc
// dcdzcdcd
// scdzcddqcjbnzeuojq
header("Location: login.php");
