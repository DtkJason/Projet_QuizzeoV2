<?php
require __DIR__ . "/../config/Database.php";

class Authentification extends Database
{
    public function register($pseudo, $email, $password, $apiKey)
    {
        if (!empty($pseudo) && !empty($email) && !empty($password) && !empty($apiKey)) {
            $query1 = $this->bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
            $query1->bindParam(":pseudo", $pseudo);
            $query1->execute();

            $query2 = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $query2->bindParam(":email", $email);
            $query2->execute();

            if ($query1->rowCount() > 0) {
                echo "Pseudo déjà utilisé";
            } else {
                if ($query2->rowCount() > 0) {
                    echo "Email déjà utilisé";
                } else {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $query3 = $this->bdd->prepare("INSERT INTO utilisateur(pseudo, email, mdp, api_key, id_groupe) VALUES (:pseudo, :email, :mdp, :apiKey, 5)");
                    $query3->bindParam(":pseudo", $pseudo);
                    $query3->bindParam(":email", $email);
                    $query3->bindParam(":mdp", $passwordHash);
                    $query3->bindParam(":apiKey", $apiKey);
                    $query3->execute();
                    echo "Inscription réussie !";
                }
            }
        } else {
            echo "Remplir tous les champs";
        }
    }

    public function login($email, $password)
    {
        $query1 = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
        $query1->bindParam(":email", $email);
        $query1->execute();

        $userData = $query1->fetch(PDO::FETCH_ASSOC);

        if ($query1->rowCount() === 1) {
            $mdp = $userData["mdp"];
            if (password_verify($password, $mdp)) {
                return $userData;
            } else {
                return false;
            }
        }
    }

    public function setOnline($idUser)
    {
        $online = true;
        $query = $this->bdd->prepare("UPDATE utilisateur SET statut_activite = :statut WHERE id_utilisateur = $idUser");
        $query->bindParam(":statut", $online);
        $query->execute();
    }

    public function setOffline($idUser)
    {
        $online = false;
        $query = $this->bdd->prepare("UPDATE utilisateur SET statut_activite = :statut WHERE id_utilisateur = $idUser");
        $query->bindParam(":statut", $online);
        $query->execute();
    }
}
