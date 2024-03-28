<header>


    <?php
    if (isset($_SESSION["role"])) {
        if ($_SESSION["role"] >= 3) {
            echo "<a href='support.php'>Support</a>";
        }
    }
    ?>

    <a href=""></a>
    <div class="row topnav">
        <div class="col-6">
            <img class="logoo" src="../../img/quizzeo1.png" alt="">
        </div>
        <div class="col">
            <?php
            // if (isset($_SESSION["role"])) {
            //     $idRole = $_SESSION["role"];
            //     if ($idRole == 1) {
            //         echo "<a href='adminPage.php'>Accueil</a>";
            //     } elseif ($idRole == 2) {
            //         echo "<a href='validatorPage.php'>Accueil</a>";
            //     } elseif ($idRole == 3) {
            //         echo "<a href='adminQuizPage.php'>Accueil</a>";
            //     } elseif ($idRole == 4) {
            //         echo "<a href='createurQuizPage.php'>Accueil</a>";
            //     } else {
            //         echo "<a href='userPage.php'>Accueil</a>";
            //     }
            // }
            ?>
        </div>
        <div class="col-4">

        </div>
        <div class="col logreg">
            <div class="dropdown">
                <span class="tooltiptext">Setings</span>

                <img class="user dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" src="../../img/user.png" alt="">

                <ul class="dropdown-menu">
                    <li><?php
                        if (isset($_SESSION["pseudo"])) {
                            $pseudo = $_SESSION["pseudo"];
                            echo "<p>Connecté(e) : $pseudo</p>";
                        }
                        ?></li>

                    <li><a class="dropdown-item" href="profile.php">Compte</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="../../shared/others/disconnect.php">Deconnexion</a></li>
                </ul>
            </div>



        </div>
    </div>
</header>