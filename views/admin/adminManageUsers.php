<?php
require __DIR__ . "/../../classes/Admin.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les membres</title>
</head>

<body>
    <h1>Gérer les membres</h1>
    <table>
        <thead>
            <tr>
                <td>
                    <p>ID</p>
                </td>
                <td>
                    <p>Pseudo</p>
                </td>
                <td></td>
                <td>
                    <p>Email</p>
                </td>
                <td></td>
                <td>
                    <p>Mot de passe</p>
                </td>
                <td></td>
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
            $admin = new Admin();
            $admin->displayUsers();
            ?>
        </thead>
    </table>
</body>

</html>