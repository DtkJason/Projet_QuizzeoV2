<?php
class Database {
    private $host = "localhost";
    private $dbName = "projet_quizzeo";
    private $username = "root";
    private $password = "";
    private $bdd;

    public function __construct() {
        $this->bdd = null;

        try {
            $this->bdd = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=utf8", $this->username, $this->password);
            // Définir le mode d'erreur PDO sur Exception
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->bdd;
    }
}

#-----------------------------------------------------------------------


?>