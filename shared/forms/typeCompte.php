<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier type de compte</title>
</head>

<body>
    <form method="POST">
        <label for="type">Type de compte</label>
        <select name="type">
            <option value="">Choisir</option>
            <option value="1">Administrateur</option>
            <option value="2">Validateur</option>
            <option value="3">Administrateur Quiz</option>
            <option value="4">Créateur Quiz</option>
            <option value="5">Utilisateur</option>
        </select>
        <input type="submit" value="Valider">
    </form>
</body>

</html>