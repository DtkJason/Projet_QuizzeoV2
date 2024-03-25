<header>
    <h1>QUIZZEO</h1>
    <?php 
    if(isset($_SESSION["pseudo"])) {
        $pseudo = $_SESSION["pseudo"];
        echo "<span>Connecté(e) en tant que : $pseudo</span>";
    }
    ?>
    <a href="../../shared/others/disconnect.php">Déconnexion</a>
</header>