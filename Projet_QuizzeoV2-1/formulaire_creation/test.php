<?php
include 'traitement.php'; // Inclure le fichier de connexion

// Instancier la classe Database pour obtenir la connexion à la base de données
$database = new Database();
$connexion = $database->getConnection();

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changer_statut'])) {
    $id_quizz = $_POST['id_quizz']; // Récupérer l'ID du quizz à modifier

    // Définir le nouveau statut (vous pouvez changer cette valeur selon vos besoins)
    $nouveau_statut = 1;

    // Préparer et exécuter la requête de mise à jour
    $sql = "UPDATE quizz SET statut_quizz = $nouveau_statut WHERE id = $id_quizz";

    if ($connexion->exec($sql) !== false) {
        echo "Le statut du quizz a été mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour du statut du quizz.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Changer le statut du quizz</title>
</head>
<body>
    <h2>Changer le statut du quizz</h2>
    <form method="post" action="traitement_changer_statut.php">
        <input type="hidden" name="id_quizz" value="1"> <!-- Remplacer 1 par l'ID du quizz -->
        <input type="submit" name="changer_statut" value="Changer le statut du quizz">
    </form>
</body>
</html>
