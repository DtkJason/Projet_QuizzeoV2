<?php
require "controller.php";

if (isset($_GET["reg"])) {
    echo '<script type="text/javascript">';
    echo 'alert("Inscription réussie")';
    echo '</script>';
    // header("Location: login.php");
}

if (isset($_POST["submit"])) {
    $login = new Authentification();
    $login->login($_POST["email"], $_POST["password"]);
    $_SESSION["id"] = $login->getIdUser();
    $_SESSION["role"] = $login->getRoleUser();
}

// if (isset($_SESSION["id"])) {
//     header("Location: index.php");
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>

<body>
    <?php
    require "background.php";
    ?>
    <div class="row topnav">
        <div class="col-8">
            <img class="logoo" src="img/quizzeo1.png" alt="">
        </div>
        <div class="col">yolo

        </div>
        <div class="col">
            <a href="login.php" class=" btn btn-outline-light disconnect link">Connection</a>
            <a href="register.php" class=" btn btn-outline-warning disconnect link">Inscription</a>

        </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</body>

</html>