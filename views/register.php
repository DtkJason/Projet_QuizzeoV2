<?php
require __DIR__ . "/../classes/authentification.php";

if (isset($_POST["submit"])) {
    $registration = new Authentification();
    $registration->register($_POST["pseudo"], $_POST["email"], $_POST["password"]);
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
</body>

</html>