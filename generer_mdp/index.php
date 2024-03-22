<!DOCTYPE html>
<html>
<head>
    <title>Générateur de mots de passe sécurisés</title>
</head>
<body>
    <p>Longueur du mot de passe :</p>
    <input type="number" id="passwordLength" min="6" max="50" value="12">
    <button onclick="generatePassword()">Générer le mot de passe</button>
    <br>
    <br>
    <input type="text" id="passwordOutput" readonly>

    <script src="script.js"></script>

</body>
</html>
