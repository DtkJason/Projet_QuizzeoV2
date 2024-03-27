<?php
require __DIR__ . "/../../classes/Admin.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];
}

if (isset($_POST["submit"])) {
    $newMDP = new Admin();
    $newMDP->editMDP($idUser, $_POST["password"]);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mot de passe</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerForms.php"; ?>
    <form method="POST">
        <label for="password">Nouveau mot de passe</label>
        <input type="password" name="password" required>
        <input type="submit" name="submit" value="Valider">
    </form>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>