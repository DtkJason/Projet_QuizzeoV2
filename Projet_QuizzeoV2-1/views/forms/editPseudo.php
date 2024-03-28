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
    $newPseudo = new Admin();
    $newPseudo->editPseudo($idUser, $_POST["pseudo"]);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier pseudo</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerForms.php"; ?>
    <form method="POST">
        <label for="pseudo">Nouveau pseudo</label>
        <input type="text" name="pseudo" required>
        <input type="submit" name="submit" value="Valider">
    </form>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>