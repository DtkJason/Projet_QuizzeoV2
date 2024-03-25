<?php
require "Validator.php";

class Admin extends Validator
{
    public function editUserPseudo($role, $idUser, $newPseudo)
    {
        if ($role == 1) {
            if (!empty($newPseudo)) {
                $query = $this->bdd->prepare("UPDATE utilisateur SET pseudo = :newPseudo WHERE id_utilisateur = $idUser");
                $query->bindParam(":newPseudo", $newPseudo);
                $query->execute();
            }
        }
    }
    public function editUserEmail($role, $idUser, $newEmail)
    {
        if ($role == 1) {
            if (!empty($newPseudo)) {
                $query = $this->bdd->prepare("UPDATE utilisateur SET email = :newEmail WHERE id_utilisateur = $idUser");
                $query->bindParam(":newEmail", $newEmail);
                $query->execute();
            }
        }
    }
    public function editUserMDP($role, $idUser, $newMDP)
    {
        if ($role == 1) {
            if (!empty($newMDP)) {
                $passwordHash = password_hash($newMDP, PASSWORD_DEFAULT);
                $query = $this->bdd->prepare("UPDATE utilisateur SET mdp = :newMDP WHERE id_utilisateur = $idUser");
                $query->bindParam(":newMDP", $passwordHash);
                $query->execute();
            }
        }
    }

    public function addUser($pseudo, $email, $password)
    {
        if (!empty($pseudo) && !empty($email) && !empty($password)) {
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
                    $query3 = $this->bdd->prepare("INSERT INTO utilisateur(pseudo, email, mdp, id_groupe) VALUES (:pseudo, :email, :mdp, 5)");
                    $query3->bindParam(":pseudo", $pseudo);
                    $query3->bindParam(":email", $email);
                    $query3->bindParam(":mdp", $passwordHash);
                    $query3->execute();
                }
            }
        } else {
            echo "Remplir tous les champs";
        }
    }

    public function displayUsers()
    {
        $query = $this->bdd->prepare("SELECT * FROM utilisateur");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $row) {
            $id = $row["id_utilisateur"];
            $pseudo = $row["pseudo"];
            $email = $row["email"];
            $role = $row["id_groupe"];
            $status = $row["statut_compte"];
            $activity = $row["statut_activite"];

            echo "<tr>";
            echo "<td><p>$id</p></td>";
            echo "<td><p>$pseudo</p></td>";
            echo "<td><p>$email</p></td>";

            if ($role == 1) {
                echo "<td><p>Admin</p></td>";
            } elseif ($role == 2) {
                echo "<td><p>Validateur</p></td>";
            } elseif ($role == 3) {
                echo "<td><p>Admin Quiz</p></td>";
            } elseif ($role == 4) {
                echo "<td><p>Créateur Quiz</p></td>";
            } else {
                echo "<td><p>Utilisateur</p></td>";
            }

            if ($status == 0) {
                echo "<td><span>Inactif</span></td>";
            } else {
                echo "<td><span>Actif</span></td>";
            }

            if ($activity == 0) {
                echo "<td><span>Déconnecté(e)</span></td>";
            } else {
                echo "<td><span>Connecté(e)</span></td>";
            }
            echo "</tr>";
        }
    }
}
