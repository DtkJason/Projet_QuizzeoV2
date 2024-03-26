<?php
require __DIR__ . "/../../classes/AdminQuiz.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
}

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != 3) {
        header("Location: ../login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin Quiz</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
    <h1>Page Admin Quiz</h1>
    <p>Vous êtes sur la page Admin Quiz</p>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>