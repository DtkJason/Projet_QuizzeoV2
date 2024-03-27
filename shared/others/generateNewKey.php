<?php
require __DIR__ . "/../../classes/User.php";

if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];
}

if (isset($_GET["role"])) {
    $role = $_GET["role"];
}

$generateNewKey = new User();
$newKey = $generateNewKey->generateApiKey();
$generateNewKey->newApiKey($idUser, $newKey);

if ($role == 1) {
    header("Location: ../../views/admin/profile.php");
    exit();
} elseif ($role == 2) {
    header("Location: ../../views/validator/profile.php");
    exit();
} elseif ($role == 3) {
    header("Location: ../../views/adminQuiz/profile.php");
    exit();
} elseif ($role == 4) {
    header("Location: ../../views/creatorQuiz/profile.php");
    exit();
} elseif ($role == 5) {
    header("Location: ../../views/user/profile.php");
    exit();
}
