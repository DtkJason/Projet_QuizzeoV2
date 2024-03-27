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
<<<<<<< HEAD
    <title>Gérer les membres</title>
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/log.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Page Admin</title>
>>>>>>> ce42ac0748d060bdb6e6104c4507d30f6f631fe1
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
<<<<<<< HEAD
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
            if (isset($_SESSION["id"])) {
                $idUser = $_SESSION["id"];
            }
            $admin->displayUsersAdmin($idUser);
            ?>
        </thead>
    </table>
=======
    <h1>Page Admin</h1>
    <p>Vous êtes sur la page Admin</p>
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
            </div>
        </div>

    </div>
>>>>>>> ce42ac0748d060bdb6e6104c4507d30f6f631fe1
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>