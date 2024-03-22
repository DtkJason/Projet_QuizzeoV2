<?php
require __DIR__ . "/../classes/authentification.php";

if (isset($_POST["submit"])) {
    $login = new Authentification();
    $userData = $login->login($_POST["email"], $_POST["password"]);

    if ($userData) {
        if ($userData["statut_compte"] === 0) {
            header("Location: disabled.php");
            session_destroy();
        } elseif ($userData["id_groupe"] === 1) {
            header("Location: admin/adminPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 2) {
            header("Location: validator/validatorPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 3) {
            header("Location: adminQuiz/adminQuizPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 4) {
            header("Location: creatorQuiz/creatorQuizPage.php");
            exit();
        } elseif ($userData["id_groupe"] === 5) {
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
    <div>
        <h1>Connexion</h1>
        <form method="POST">
            <label for="email">Email </label>
            <input type="email" name="email" placeholder="Email" required>
            <label for="password">Mot de passe </label>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <input type="submit" name="submit" value="Connexion">
        </form>
    </div>
</body>

</html>