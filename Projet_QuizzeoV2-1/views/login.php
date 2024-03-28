<?php
require __DIR__ . "/../classes/Authentification.php";

if (isset($_POST["submit"])) {
    $login = new Authentification();
    $userData = $login->login($_POST["email"], $_POST["password"]);
<<<<<<< HEAD
    $_SESSION["id"] = $userData["id_utilisateur"];
    $_SESSION["pseudo"] = $userData["pseudo"];
    $_SESSION["email"] = $userData["email"];
    $_SESSION["apiKey"] = $userData["api_key"];
    $_SESSION["role"] = $userData["id_groupe"];
    $_SESSION["avatar"] = $userData["avatar"];
    $idUser = $userData["id_utilisateur"];
=======
>>>>>>> 4efbdef4abe4c95dc985a1506910b11023f1319f

    if ($userData) {
        $_SESSION["id"] = $userData["id_utilisateur"];
        $_SESSION["pseudo"] = $userData["pseudo"];
        $_SESSION["email"] = $userData["email"];
        $_SESSION["apiKey"] = $userData["api_key"];
        $_SESSION["role"] = $userData["id_groupe"];
        $idUser = $userData["id_utilisateur"];
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
    } else {
        echo "Email ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/log.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Connexion</title>
</head>

<body>
    <?php require __DIR__ . "/../shared/headers/headerOffline.php"; ?>


    <div class="row">

        <div class="col">
            <div class="login-box">
                <h1>Connexion</h1>
                <form method="POST">
                    <div class="user-box">
                        <input type="mail" name="email" placeholder="Email" required>
                        <label for="mail">Email </label>
                    </div>
                    <div class="user-box">
                        <input type="password" name="password" placeholder="Mot de passe" required>
                        <label for="password">Mot de passe </label>
                    </div>

                    <input class="sub-box" type="submit" name="submit" value="Connexion">
                </form>
            </div>

        </div>

    </div>

    <?php require __DIR__ . "/../shared/footer/footer.php"; ?>
</body>

</html>