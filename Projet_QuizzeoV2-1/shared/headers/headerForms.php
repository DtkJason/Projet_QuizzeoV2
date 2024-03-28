<header>
    <h1>QUIZZEO</h1>

    <?php
    if (isset($_SESSION["role"])) {
        $idRole = $_SESSION["role"];
        if ($idRole == 1) {
            echo "<a href='../admin/adminPage.php'>Accueil</a>";
        } elseif ($idRole == 2) {
            echo "<a href='../validator/validatorPage.php'>Accueil</a>";
        } elseif ($idRole == 3) {
            echo "<a href='../adminQuiz/adminQuizPage.php'>Accueil</a>";
        } elseif ($idRole == 4) {
            echo "<a href='../creatorQuiz/createurQuizPage.php'>Accueil</a>";
        } else {
            echo "<a href='userPage.php'>Accueil</a>";
        }
    }
    ?>

    <?php
    if (isset($_SESSION["pseudo"])) {
        $pseudo = $_SESSION["pseudo"];
        echo "<span>Connecté(e) en tant que : $pseudo</span>";
    }
    ?>

    <?php
    if (isset($_SESSION["role"])) {
        $idRole = $_SESSION["role"];
        if ($idRole == 1) {
            echo "<a href='../admin/profile.php'>Compte</a>";
        } elseif ($idRole == 2) {
            echo "<a href='../validator/profile.php'>Compte</a>";
        } elseif ($idRole == 3) {
            echo "<a href='../adminQuiz/profile.php'>Compte</a>";
        } elseif ($idRole == 4) {
            echo "<a href='../creatorQuiz/profile.php'>Compte</a>";
        } else {
            echo "<a href='../user/userPage.php'>Compte</a>";
        }
    }
    ?>

    <?php
    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] >= 3) {
            echo "<a href='support.php'>Support</a>";
        }
    }
    ?>

    <a href="../../shared/others/disconnect.php">Déconnexion</a>
</header>