<?php
require __DIR__ . "/../classes/Authentification.php";

if (isset($_POST["submit"])) {
    $login = new Authentification();
    $userData = $login->login($_POST["email"], $_POST["password"]);
    $_SESSION["id"] = $userData["id_utilisateur"];
    $_SESSION["pseudo"] = $userData["pseudo"];
    $_SESSION["email"] = $userData["email"];
    $_SESSION["role"] = $userData["id_groupe"];
    $idUser = $userData["id_utilisateur"];

    if ($userData) {
        if ($userData["statut_compte"] === 0) {
            header("Location: inactive.php?idUser=$idUser");
            session_destroy();
        } elseif ($userData["id_groupe"] === 1) {
            $login->setOnline($idUser);
            header("Location: admin/adminPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 2) {
            $login->setOnline($idUser);
            header("Location: validator/validatorPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 3) {
            $login->setOnline($idUser);
            header("Location: adminQuiz/adminQuizPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 4) {
            $login->setOnline($idUser);
            header("Location: creatorQuiz/creatorQuizPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 5) {
            $login->setOnline($idUser);
            header("Location: user/userPage.php");
            exit();
        } else {
            header("Location: index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <?php require __DIR__ . "/../shared/headers/headerOffline.php"; ?>
    <div>
        <h2>Connexion</h2>
        <form method="POST">
            <label for="email">Email </label>
            <input type="email" name="email" placeholder="Email" required>
            <label for="password">Mot de passe </label>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>
    <?php require __DIR__ . "/../shared/footer/footer.php"; ?>
</body>

</html>