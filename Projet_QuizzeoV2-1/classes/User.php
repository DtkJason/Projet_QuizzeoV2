<?php
require __DIR__ . "/../config/Database.php";

class User extends Database
{
    public function editPseudo($idUser, $newPseudo)
    {
        if (!empty($newPseudo)) {
            $query1 = $this->bdd->prepare("SELECT * FROM utilisateur WHERE pseudo = :pseudo");
            $query1->bindParam(":pseudo", $newPseudo);
            $query1->execute();

            if ($query1->rowCount() > 0) {
                echo "Pseudo déjà utilisé";
            } else {
                $query2 = $this->bdd->prepare("UPDATE utilisateur SET pseudo = :newPseudo WHERE id_utilisateur = $idUser");
                $query2->bindParam(":newPseudo", $newPseudo);
                $query2->execute();
                echo "Pseudo modifié";
            }
        }
    }

    public function editEmail($idUser, $newEmail)
    {
        if (!empty($newEmail)) {
            $query1 = $this->bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
            $query1->bindParam(":email", $newEmail);
            $query1->execute();

            if ($query1->rowCount() > 0) {
                echo "Email déjà utilisé";
            } else {
                $query = $this->bdd->prepare("UPDATE utilisateur SET email = :newEmail WHERE id_utilisateur = $idUser");
                $query->bindParam(":newEmail", $newEmail);
                $query->execute();
                echo "Email modifié";
            }
        }
    }

    public function editMDP($idUser, $newMDP)
    {
        if (!empty($newMDP)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET mdp = :newMDP WHERE id_utilisateur = $idUser");
            $query->bindParam(":newMDP", $newMDP);
            $query->execute();
            echo "Mot de passe modifié";
        }
    }

    public function displayProfile($idUser)
    {
        $query = $this->bdd->prepare("SELECT * from utilisateur WHERE id_utilisateur = :idUser");
        $query->bindParam(":idUser", $idUser);
        $query->execute();

        $data = $query->fetch(PDO::FETCH_ASSOC);
        $pseudo = $data["pseudo"];
        $email = $data["email"];
        $apiKey = $data["api_key"];
        $role = $data["id_groupe"];

<<<<<<< HEAD
        echo "<p><h5>Pseudo: $pseudo</h5><a href='../forms/editPseudo.php?idUser=$idUser' class='btn btn-outline-warning'>Modifier</a></p>";
        echo "<p><h5>Email: $email</h5><a href='../forms/editEmail.php?idUser=$idUser' class='btn btn-outline-warning'>Modifier</a></p>";
        echo "<p><h5>Mot de passe: xxxxxxxxxxxx</h5> <a href='../forms/editMDP.php?idUser=$idUser' class='btn btn-outline-warning'>Modifier</a></p>";
        echo "<p><h5>Clé API: $apiKey</h5><a href='../../shared/others/generateNewKey.php?idUser=$idUser&role=$role' class='btn btn-outline-secondary'>Générer</a></p>";
=======
        echo "<span>Pseudo: $pseudo<a href='../forms/editPseudo.php?idUser=$idUser'>Modifier</a></span>";
        echo "<span>Email: $email<a href='../forms/editEmail.php?idUser=$idUser'>Modifier</a></span>";
        echo "<span>Mot de passe: <a href='../forms/editMDP.php?idUser=$idUser'>Modifier</a></span>";
        echo "<span>Clé API: $apiKey<a href='../../shared/others/generateNewKey.php?idUser=$idUser&role=$role'>Générer</a></span>";
>>>>>>> 4efbdef4abe4c95dc985a1506910b11023f1319f
    }

    public function createTicket($idUser, $request)
    {
        if (!empty($request)) {
            $query = $this->bdd->prepare("INSERT INTO ticket(requete, id_utilisateur) VALUES (:requete, :idUser)");
            $query->bindParam(":requete", $request);
            $query->bindParam(":idUser", $idUser);
            $query->execute();
            echo "Votre ticket a été crée";
        }
    }

    public function generateApiKey()
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurCaracteres = strlen($caracteres);
        $apiKey = '';
        for ($i = 0; $i <= 32; $i++) {
            $apiKey .= $caracteres[rand(0, $longueurCaracteres - 1)];
        }
        return $apiKey;
    }

    public function newApiKey($idUser, $apiKey)
    {
        $query = $this->bdd->prepare("UPDATE utilisateur SET api_key = :newKey WHERE id_utilisateur = :idUser");
        $query->bindParam(":idUser", $idUser);
        $query->bindParam(":newKey", $apiKey);
        $query->execute();
    }
}
