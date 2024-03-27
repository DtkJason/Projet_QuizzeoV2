<?php
require __DIR__ . "/../classes/Authentification.php";

function generateApiKey()
{
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurCaracteres = strlen($caracteres);
    $apiKey = '';
    for ($i = 0; $i < 32; $i++) {
        $apiKey .= $caracteres[rand(0, $longueurCaracteres - 1)];
    }
    return $apiKey;
}

if (isset($_POST["submit"])) {
    $registration = new Authentification();
    $apiKey = generateApiKey();
    $registration->register($_POST["pseudo"], $_POST["email"], $_POST["password"], generateApiKey());
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
    <title>Inscription</title>
</head>

<body>
    <?php require __DIR__ . "/../shared/headers/headerOffline.php"; ?>
    <h1>Inscription</h1>

    <form method="POST">
        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" placeholder="Pseudo" required>
        <label for="email">Email : </label>
        <input type="email" name="email" placeholder="Email" required>
        <label for="password">Mot de passe : </label>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" name="submit" value="Valider">
    </form>
    <div class="row">

        <div class="col">
            <div class="login-box">
                <h1>Inscription</h1>
                <form method="POST">
                    <div class="user-box">
                        <input type="text" name="pseudo" placeholder="Pseudo" required>
                        <label for="pseudo">Pseudo </label>
                    </div>
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