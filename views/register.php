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
    <title>Inscription</title>
</head>

<body>
    <?php require __DIR__ . "/../shared/headers/headerOffline.php"; ?>
    <h2>Inscription</h2>

    <form method="POST">
        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" placeholder="Pseudo" required>
        <label for="email">Email : </label>
        <input type="email" name="email" placeholder="Email" required>
        <label for="password">Mot de passe : </label>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="submit" name="submit" value="Valider">
    </form>
    <?php require __DIR__ . "/../shared/footer/footer.php"; ?>
</body>

</html>