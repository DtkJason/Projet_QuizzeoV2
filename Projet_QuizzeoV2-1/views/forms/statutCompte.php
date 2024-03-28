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
    $setStatus = new Admin();
    if ($_POST["status"] == 0) {
        $setStatus->setInactive($idUser);
    }
    if ($_POST["status"] == 1) {
        $setStatus->setActive($idUser);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier statut du compte</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerForms.php"; ?>
    <form method="POST">
        <label for="status">Statut du compte</label>
        <select name="status" required>
            <option value="">Choisir</option>
            <option value="0">Inactif</option>
            <option value="1">Actif</option>
        </select>
        <input type="submit" name="submit" value="Valider">
    </form>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>