<?php
require __DIR__ . "/../../classes/Validator.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != 2) {
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
    <h2>Gérer les membres</h2>
    <table>
        <thead>
            <tr>
                <td>
                    <p>ID</p>
                </td>
                <td>
                    <p>Pseudo</p>
                </td>
                <td>
                    <p>Email</p>
                </td>
                <td>
                    <p>Type de compte</p>
                </td>
                <td></td>
                <td>
                    <p>Statut du compte</p>
                </td>
                <td></td>
                <td>
                    <p>Activité</p>
                </td>
            </tr>
            <?php
            $validator = new Validator();
            if (isset($_SESSION["id"])) {
                $idUser = $_SESSION["id"];
            }
            $validator->displayUsersValidator($idUser);
            ?>
        </thead>
    </table>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>