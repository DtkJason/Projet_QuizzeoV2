<?php
require __DIR__ . "/../../classes/Admin.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != 1) {
        header("Location: ../login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td>Numéro ticket</td>
                <td>Type de requête</td>
                <td>Etat</td>
                <td>Statut</td>
                <td>Utilisateur</td>
            </tr>
            <?php
            $admin = new Admin();
            $admin->displayTicketsAvailable();
            ?>
        </thead>
    </table>
    <table>
        <thead>
            <tr>
                <td>Numéro ticket</td>
                <td>Type de requête</td>
                <td>Statut</td>
                <td>Utilisateur</td>
            </tr>
            <?php
            $admin->displayTicketsDone();
            ?>
        </thead>
    </table>
</body>

</html>