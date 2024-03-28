<?php
session_start();

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] == 5) {
        header("Location: views/admin/adminPage.php");
        exit();
    } elseif ($_SESSION["role"] == 4) {
        header("Location: views/validator/validatorPage.php");
        exit();
    } elseif ($_SESSION["role"] == 3) {
        header("Location: views/creatorQuiz/creatorQuizPage.php");
        exit();
    } elseif ($_SESSION["role"] == 2) {
        header("Location: views/adminQuiz/adminQuizPage.php");
        exit();
    } elseif ($_SESSION["role"] == 1) {
        header("Location: views/user/userPage.php");
        exit();
    }
} else {
    header("Location: views/login.php");
    exit();
}
