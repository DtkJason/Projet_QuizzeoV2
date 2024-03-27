<?php
require __DIR__ . "/../../classes/AdminQuiz.php";

if (isset($_POST["submit"])) {
    $ticket = new AdminQuiz();
    if (!empty($_GET["idUser"])) {
        $idUser = $_GET["idUser"];
        $request = $_POST["ticket"];
        $ticket->createTicket($idUser, $request);
    } elseif (isset($_SESSION["id"])) {
        $idUser = $_SESSION["id"];
        $request = $_POST["ticket"];
        $ticket->createTicket($idUser, $request);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
</head>

<body>
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
    <form method="POST">
        <label for="request">Votre requête : </label>
        <select name="ticket" required>
            <option value="">Choisir</option>
            <option value="0">Déblocage de compte</option>
            <option value="1">Déblocage de quiz</option>
        </select>
        <input type="submit" name="submit" value="Valider">
    </form>
    <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
</body>

</html>