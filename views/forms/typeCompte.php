<?php
require __DIR__ . "/../../classes/Admin.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
}

if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];
}

if (isset($_POST["submit"])) {
    $newRole = new Admin();
    $newRole->editRole($idUser, $_POST["type"]);
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier type de compte</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
    <form method="POST">
        <label for="type">Type de compte</label>
        <select name="type" required>
            <option value="">Choisir</option>
            <option value="1">Administrateur</option>
            <option value="2">Validateur</option>
            <option value="3">Administrateur Quiz</option>
            <option value="4">Créateur Quiz</option>
            <option value="5">Utilisateur</option>
        </select>
        <input type="submit" name="submit" value="Valider">
    </form>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>