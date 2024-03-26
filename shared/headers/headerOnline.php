<header>
    <h1>QUIZZEO</h1>
    <?php
    if (isset($_SESSION["role"])) {
        $idRole = $_SESSION["role"];
        if ($idRole == 1) {
            echo "<a href='adminPage.php'>Accueil</a>";
        } elseif ($idRole == 2) {
            echo "<a href='validatorPage.php'>Accueil</a>";
        } elseif ($idRole == 3) {
            echo "<a href='adminQuizPage.php'>Accueil</a>";
        } elseif ($idRole == 4) {
            echo "<a href='createurQuizPage.php'>Accueil</a>";
        } else {
            echo "<a href='userPage.php'>Accueil</a>";
        }
    }

    if (isset($_SESSION["pseudo"])) {
        $pseudo = $_SESSION["pseudo"];
        echo "<span>Connecté(e) en tant que : $pseudo</span>";
    }
    ?>
    <a href="profile.php">Paramètres</a>
    <a href="../../shared/others/disconnect.php">Déconnexion</a>
</header>