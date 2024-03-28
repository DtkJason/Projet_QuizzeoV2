<?php
require __DIR__ . "/../../classes/Admin.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_SESSION["role"])) {
    if ($_SESSION["role"] != 1) {
        header("Location: ../login.php");
        exit();
    }
}

if (isset($_POST["submit"])) {
    $quizz = new CreatorQuiz();
    $newQuizz = $quizz->addQuiz($_POST["titre"], $_SESSION["id"]);
    $idQuizz = $quizz->getIdQuizz($_POST["titre"], $_SESSION["id"]);

    $question = new CreatorQuiz();
    $choix = new CreatorQuiz();
    $a = 1;
    do {
        if (isset($_POST["Question" . $a]) && isset($_POST["diff" . $a])) {
            $newQuestion = $question->addQuestion($_POST["Question" . $a]);
            $idQuestion = $question->getIdQuestion($_POST["Question" . $a]);
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


    echo 'alert("Quizz créé !")';
    echo '</script>';
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/log.css">
    <link rel="stylesheet" href="../../css/home.css">
    <link rel="stylesheet" href="../../css/nav.css">
    <title>Page Admin</title>
</head>

<body>
<<<<<<< HEAD
    <div class="box">
        <div class="row head">
            <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
        </div>
        <div class="row content">


            <div class="row mh-100 space">

                <div class="col-2 sidenv">
                    <h2>Page Admin</h2>
                    <ul class=" nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Creer Quiz</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <p>Vous êtes sur la page Admin</p>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            <h3>creer quizz</h3>
                            <br>
                            <div class="elementquiz">

                                <form method="POST">
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


                                    <!-- <select name="statut_quizz" id="statut_quizz" value="statut_quizz">
                                        <option name="statut_quizz" id="statut_quizz" value="1">Brouillon</option>
                                        <option name="statut_quizz" id="statut_quizz" value="2">Lancé</option>
                                        <option name="statut_quizz" id="statut_quizz" value="3">Terminé</option>
                                    </select> -->

                                    <br><br>
                                    <input type="submit" name="submit" id="valider" value="valider">





                                </form>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
                    </div>
                </div>
=======
    <?php require __DIR__ . "/../../shared/headers/headerOnline.php"; ?>
    <h1>Page Admin</h1>
    <p>Vous êtes sur la page Admin</p>
    <div class="row">
        <div class="col-2"></div>
        <div class="col">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                    <h1>Gérer les membres</h1>
                    <table>
                        <thead>
                            <tr>
                                <td>
                                    <p>ID</p>
                                </td>
                                <td>
                                    <p>Pseudo</p>
                                </td>
                                <td></td>
                                <td>
                                    <p>Email</p>
                                </td>
                                <td></td>
                                <td>
                                    <p>Mot de passe</p>
                                </td>
                                <td></td>
                                <td>
                                    <p>Type de compte</p>
                                </td>
                                <td></td>
                                <td>
                                    <p>Statut du compte</p>
                                </td>
                                <td></td>
                                <td>
                                    <p>Activité</p>
                                </td>
                            </tr>
                            <?php
                            $admin = new Admin();
                            if (isset($_SESSION["id"])) {
                                $idUser = $_SESSION["id"];
                            }
                            $admin->displayUsersAdmin($idUser);
                            ?>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
>>>>>>> 4efbdef4abe4c95dc985a1506910b11023f1319f
            </div>
        </div>
        <!-- <div class="row footer">
        </div> -->
        <?php require __DIR__ . "/../../shared/footer/footer.php"; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="quiz1.js"></script>
</body>

</html>