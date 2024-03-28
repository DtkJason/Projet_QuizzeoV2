<?php
include 'traitement.php';

$database = new Database();
$connexion = $database->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $sondageTitle = isset($_POST['sondageTitle']) ? $_POST['sondageTitle'] : null;


  if ($sondageTitle !== null) {
      // Préparer et exécuter la requête d'insertion
      $sql = "INSERT INTO sondage (sondageTitle ) VALUES (:sondageTitle)";
      $stmt = $connexion->prepare($sql);
      $stmt->bindParam(':sondageTitle', $sondageTitle);

      
      if ($stmt->execute()) {
          echo "Les informations sont enregistrés";
      } else {
          echo ".";
      }
  } else {
      echo "Veuillez remplir tous les champs du formulaire.";
  }
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>



<body>
    <div class="container">
        <h2>Création d'un Sondage</h2>


        <form id="sondageForm" action="creer_sondage.php" method="post">


            <label for="sondageTitle">Titre du Sondage :</label><br>
            <input type="text" id="sondageTitle" name="sondageTitle" required><br><br>
            

            <div id="questionsContainer">
                <!-- Les questions seront ajoutées ici dynamiquement -->
            </div>


            <button type="button" id="addQuestionBtn">Ajouter une Question</button><br><br>
            <button type="submit" id="submit" name="submit">Créer le Sondage</button>
            
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
