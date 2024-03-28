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
if (isset($_POST['captcha'])) {
    if ($_POST['captcha'] == $_SESSION['captcha']) {
        if (isset($_POST["submit"])) {
            $registration = new Authentification();
            $apiKey = generateApiKey();
            $registration->register($_POST["pseudo"], $_POST["email"], $_POST["password"], generateApiKey());
        }
        echo "Captcha valide !";
    } else {
        echo "Captcha invalide...";
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
    <title>Inscription</title>
</head>

<body>


    <div class="box">
        <div class="row head"><?php require __DIR__ . "/../shared/headers/headerOffline.php"; ?></div>
        <div class="row content">
            .
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
                        <div class="user-box">
                            <img src="captcha.php" />
                            <br>
                        </div>
                        <div class="user-box">


                            <input type="text" name="captcha" placeholder="Captcha" required />
                            <label for="captcha">Captcha </label>
                        </div>

                        <input class="sub-box" type="submit" name="submit" value="Inscription">
                    </form>
                </div>

            </div>
        </div>

    </div>



    <?php require __DIR__ . "/../shared/footer/footer.php"; ?>
</body>

</html>