<?php
require __DIR__ . "/../../classes/Admin.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/log.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <title>Mon compte</title>
</head>

<body>

    <div class="box">
        <div class="row head">
            <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
        </div>
        <div class="row content">
            <div class="col-1"></div>
            <div class="col-2">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mon compte</h4>
                        <img class="user1" src="../../img/account.png" alt="">
                        <p class="card-text"><?php
                                                if (isset($_SESSION["pseudo"])) {
                                                    $pseudo = $_SESSION["pseudo"];
                                                    echo "<h2> $pseudo</h2>";
                                                }
                                                ?></p>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Modifier les informations</h4>
                        <p class="card-text"><?php
                                                if (isset($_SESSION["id"])) {
                                                    $displayProfile = new Admin();
                                                    $displayProfile->displayProfile($_SESSION["id"]);
                                                }
                                                ?></p>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
            <h1></h1>

        </div>
    </div>

    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>