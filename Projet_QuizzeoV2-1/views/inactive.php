<?php
if (isset($_GET["idUser"])) {
    $idUser = $_GET["idUser"];
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>
</head>

<body>
    <?php require __DIR__ . "/../shared/headers/headerOffline.php"; ?>
    <h1>Compte inactif</h1>
    <p>Votre compte n'a pas encore été validé par un administrateur</p>
    <a href="user/support.php?idUser=<?php echo $idUser ?>">Support</a>
    <?php require __DIR__ . "/../shared/footer/footer.php"; ?>
</body>

</html>