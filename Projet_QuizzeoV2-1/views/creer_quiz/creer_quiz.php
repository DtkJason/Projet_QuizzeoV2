<?php
include 'traitement.php';

#-----------------------------------------------------------------------------------------------------------------
#---------------------------------------Fonction pour ajouter des questions---------------------------------------
#-----------------------------------------------------------------------------------------------------------------

class Question {
    private $bdd;

    public function __construct() {
        $database = new Database();
        $this->bdd = $database->getConnection();
    }

    // Fonction qui permet d'insérer les informations d'une Question dans la base de données
    public function addQuestion($intituleQuestion, $difficulteQuestion)
    {
        $dateQuestion = date("Y-m-d");
        $query1 = $this->bdd->prepare("INSERT INTO question(intitule_question, difficulte_question, date_creation_question) VALUES (:intituleQuestion, :difficulteQuestion, :dateQuestion)");
        $query1->bindParam(":intituleQuestion", $intituleQuestion);
        $query1->bindParam(":difficulteQuestion", $difficulteQuestion);
        $query1->bindParam(":dateQuestion", $dateQuestion);
        $query1->execute();
    }

    // Fonction qui permet de récupérer l'ID d'une Question
    public function getIdQuestion($intituleQuestion, $difficulteQuestion)
    {
        $query1 = $this->bdd->prepare("SELECT * FROM question WHERE intitule_question = :intituleQuestion AND difficulte_question = :difficulteQuestion");
        $query1->bindParam(":intituleQuestion", $intituleQuestion);
        $query1->bindParam(":difficulteQuestion", $difficulteQuestion);
        $query1->execute();

        $data1 = $query1->fetch(PDO::FETCH_ASSOC);

        $idQuestion = $data1["id_question"];
        return $idQuestion;
    }

    // Fonction qui permet d'associer un Quizz à une Question dans la base de données
    public function addQuizzQuestion($idQuizz, $idQuestion)
    {
        $query1 = $this->bdd->prepare("INSERT INTO quizz_question(id_quizz, id_question) VALUES (:idQuizz, :idQuestion)");
        $query1->bindParam(":idQuizz", $idQuizz);
        $query1->bindParam(":idQuestion", $idQuestion);
        $query1->execute();
    }
}



//----------------------------------------------------------------------------------------------------------------------------
#--------------------------------Fonction pour ajouter des choix--------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------


// Classe qui permet de gérer les Choix
class choix {
  private $bdd;

  public function __construct($bdd) {
    $database = new Database();
    $this->bdd = $database->getConnection();
  }

  // Fonction qui permet d'insérer les informations d'un Choix dans la base de données
  public function addChoice($reponseChoix, $bonneReponse, $idQuestion) {
      $query1 = $this->bdd->prepare("INSERT INTO choix(reponse_choix, bonneReponse_choix, id_question) VALUES (:reponseChoix, :bonneReponse, :idQuestion)");
      $query1->bindParam(":reponseChoix", $reponseChoix);
      $query1->bindParam(":bonneReponse", $bonneReponse);
      $query1->bindParam(":idQuestion", $idQuestion);
      $query1->execute();
  }

  // Fonction qui permet de récupérer la bonne réponse d'une Question
  public function getGoodAnswer($idQuizz, $i) {
      $query1 = $this->bdd->prepare("SELECT * FROM quizz_question WHERE id_quizz = :idQuizz");
      $query1->bindParam(":idQuizz", $idQuizz);
      $query1->execute();
      $data1 = $query1->fetchAll(PDO::FETCH_ASSOC);

      $j = 1;
      foreach ($data1 as $row) {
          ${"idQuestion" . $j} = $row["id_question"];
          $array[] = ${"idQuestion" . $j};
      }

      $questionPos = $i - 1;
      $bool = true;

      $query2 = $this->bdd->prepare("SELECT * FROM choix WHERE id_question = :idQuestion AND bonneReponse_choix = :bool");
      $query2->bindParam(":idQuestion", $array[$questionPos]);
      $query2->bindParam(":bool", $bool);
      $query2->execute();
      $data2 = $query2->fetchAll(PDO::FETCH_ASSOC);

      foreach ($data2 as $row) {
          $goodAnswer = $row["reponse_choix"];
      }
      return $goodAnswer;
  }
}

#-----------------------------------------------------------------------------------------------------------------
#--------------------------Insérer le Titre et le statut du Quizz-------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
  $titre = isset($_POST['titre']) ? $_POST['titre'] : null;
  $statut_quizz = isset($_POST['statut_quizz']) ? $_POST['statut_quizz'] : null;

  if ($titre !== null && $statut_quizz !== null) {
      // Préparer et exécuter la requête d'insertion
      $sql = "INSERT INTO quizz (titre, statut_quizz) VALUES (:titre, :statut_quizz)";
      $stmt = $connexion->prepare($sql);
      $stmt->bindParam(':titre', $titre);
      $stmt->bindParam(':statut_quizz', $statut_quizz);


      if ($stmt->execute()) {
          echo "Les informations sont enregistrés";
      } else {
          echo ".";
      }
  } else {
      echo "Veuillez remplir tous les champs du formulaire.";
  }



#-----------------------------------------------------------------------------------------------------------------
#--------------------------Insérer la questions et les réponses---------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------


  
  $question = new Question();
  $choix = new Choix();
  $a = 1;
  do {
    if (isset($_POST["Question" . $a]) && isset($_POST["diff" . $a])) {
      $newQuestion = $question->addQuestion($_POST["Question" . $a], $_POST["diff" . $a]);
      $idQuestion = $question->getIdQuestion($_POST["Question" . $a], $_POST["diff" . $a]);
      if (isset($_POST["BRepons" . $a])) {
        $goodAnswer = $choix->addChoice($_POST["BRepons" . $a], true, $idQuestion);
      }
      for ($i = 1; $i <= 3; $i++) {
        $newChoix = $choix->addChoice($_POST["MRepons" . $i . "-" . $a], false, $idQuestion);
      }
      $question->addQuizzQuestion($idQuizz, $idQuestion);
    }
    $a++;
  } while (isset($_POST["Question" . $a]));

  echo '<script type="text/javascript">';
  echo 'alert("Quizz créé !")';
  echo '</script>';
}



#-----------------------------------------------------------------------------------------------------------------
#--------------------------------------------Fin de la partie SQL-------------------------------------------------
#-----------------------------------------------------------------------------------------------------------------
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

    <div class="elementquiz">
         
        <form method="POST" action="creer_quiz.php">
            <div id="field">
                <label>Titre</label>
                <input type="text" name="titre" id="titre" required="">
            </div>


            <div id="nformi"></div>
          

            <div>
                <br>
                <div class="controlss">
                  <button class="ajout" onclick="ajout()">Ajouter une question</button>
                  <button class="suppr" onclick="suppr()">Supprimer une question</button>
                  <br>
                </div>
            </div>
            <br>


            <select name="statut_quizz" id="statut_quizz" value="statut_quizz">
              <option name="statut_quizz" id="statut_quizz" value="1">Brouillon</option>
              <option name="statut_quizz" id="statut_quizz" value="2">Lancé</option>
              <option name="statut_quizz" id="statut_quizz" value="3">Terminé</option>
            </select>

            <br><br>
            <input type="submit" name="submit" id="valider" value="valider">





        </form>

    </div>

    <script src="quiz1.js"></script>

</body>
</html>
