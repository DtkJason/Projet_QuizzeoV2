<?php
require __DIR__ . "/../../classes/Admin.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
    <h1>Mon compte</h1>
    <?php
    if (isset($_SESSION["id"])) {
        $displayProfile = new Admin();
        $displayProfile->displayProfile($_SESSION["id"]);
    }
    ?>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>