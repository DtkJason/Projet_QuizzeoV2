<?php
require __DIR__ . "/../../classes/Validator.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != 4) {
        header("Location: ../login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Validateur</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
    <h1>Page Validateur</h1>
    <p>Vous êtes sur la page Validateur</p>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>