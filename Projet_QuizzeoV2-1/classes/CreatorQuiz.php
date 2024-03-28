<?php
require "User.php";

class CreatorQuiz extends User

{
    public $date;
    public $idQuiz;
    public function addQuiz($titre, $idUserQuizz)
    {
        $dateQuizz = date("Y-m-d");
        $query1 = $this->bdd->prepare("INSERT INTO quiz(titre, date_creation_quiz, id_utilisateur) VALUES (:titre, :dateQuizz, :idUserQuizz)");
        $query1->bindParam(":titre", $titre);
        $query1->bindParam("dateQuizz", $dateQuizz);
        $query1->bindParam(":idUserQuizz", $idUserQuizz);
        $query1->execute();
    }
    public function getIdQuizz($titre, $idUserQuizz)
    {
        $query1 = $this->bdd->prepare("SELECT * FROM quiz WHERE titre = :titre AND id_utilisateur = :idUserQuizz");
        $query1->bindParam(":titre", $titre);
        $query1->bindParam(":idUserQuizz", $idUserQuizz);
        $query1->execute();

        $data1 = $query1->fetch(PDO::FETCH_ASSOC);

        $this->idQuiz = $data1["id_quiz"];
        return $this->idQuiz;
    }
    // public function addQuestion()
    // {
    // }

    public function addChoix()
    {
    }

    public $idQuestion;

    //Fonction qui permet d'insérer les informations d'une Question dans la base de données
    public function addQuestion($intituleQuestion)
    {
        $query1 = $this->bdd->prepare("INSERT INTO question(intitule_question) VALUES (:intituleQuestion)");
        $query1->bindParam(":intituleQuestion", $intituleQuestion);
        $query1->execute();
    }

    //Fonction qui permet de récupérer l'ID d'une Question
    public function getIdQuestion($intituleQuestion)
    {
        $query1 = $this->bdd->prepare("SELECT * FROM question WHERE intitule_question = :intituleQuestion ");
        $query1->bindParam(":intituleQuestion", $intituleQuestion);
        $query1->execute();

        $data1 = $query1->fetch(PDO::FETCH_ASSOC);

        $this->idQuestion = $data1["id_question"];
        return $this->idQuestion;
    }

    //Fonction qui permet d'associer un Quizz à une Question dans la base de données
    public function addQuizzQuestion($idQuiz, $idQuestion)
    {
        $query1 = $this->bdd->prepare("INSERT INTO quiz_question(id_quiz, id_question) VALUES (:idQuiz, :idQuestion)");
        $query1->bindParam(":idQuiz", $idQuiz);
        $query1->bindParam(":idQuestion", $idQuestion);
        $query1->execute();
    }

    public $idChoix;

    //Fonction qui permet d'insérer les informations d'un Choix dans la base de données
    public function addChoice($reponseChoix, $bonneReponse, $idQuestion)
    {
        $query1 = $this->bdd->prepare("INSERT INTO choix(reponse_choix, bonneReponse_choix, id_question) VALUES (:reponseChoix, :bonneReponse, :idQuestion)");
        $query1->bindParam(":reponseChoix", $reponseChoix);
        $query1->bindParam(":bonneReponse", $bonneReponse);
        $query1->bindParam(":idQuestion", $idQuestion);
        $query1->execute();
    }

    //Fonction qui permet de récupérer la bonne réponse d'une Question
    public function getGoodAnswer($idQuizz, $i)
    {
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
