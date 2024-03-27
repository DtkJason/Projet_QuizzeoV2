<?php
require "Validator.php";

class Admin extends Validator
{
    public function addUser($pseudo, $email, $password, $apiKey)
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
                    $query3 = $this->bdd->prepare("INSERT INTO utilisateur(pseudo, email, mdp, api_key, id_groupe) VALUES (:pseudo, :email, :mdp, :apiKey, 5)");
                    $query3->bindParam(":pseudo", $pseudo);
                    $query3->bindParam(":email", $email);
                    $query3->bindParam(":mdp", $passwordHash);
                    $query3->bindParam(":apiKey", $apiKey);
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
            echo "<td><a href='../forms/editPseudo.php?idUser=$id'>Modifer</a></td>";
            echo "<td><p>$email</p></td>";
            echo "<td><a href='../forms/editEmail.php?idUser=$id'>Modifier</a></td>";
            echo "<td><p>motdepasse</p></td>";
            echo "<td><a href='../forms/editMDP.php?idUser=$id'>Modifier</a></td>";

            if ($role == 1) {
                echo "<td><p>Admin</p></td>";
                echo "<td><a href='../forms/typeCompte.php?idUser=$id'>Modifier</a></td>";
            } elseif ($role == 2) {
                echo "<td><p>Validateur</p></td>";
                echo "<td><a href='../forms/typeCompte.php?idUser=$id'>Modifier</a></td>";
            } elseif ($role == 3) {
                echo "<td><p>Admin Quiz</p></td>";
                echo "<td><a href='../forms/typeCompte.php?idUser=$id'>Modifier</a></td>";
            } elseif ($role == 4) {
                echo "<td><p>Créateur Quiz</p></td>";
                echo "<td><a href='../forms/typeCompte.php?idUser=$id'>Modifier</a></td>";
            } else {
                echo "<td><p>Utilisateur</p></td>";
                echo "<td><a href='../forms/typeCompte.php?idUser=$id'>Modifier</a></td>";
            }

            if ($status == 0) {
                echo "<td><span>Inactif</span></td>";
                echo "<td><a href='../forms/statutCompte.php?idUser=$id'>Modifier</a></td>";
            } else {
                echo "<td><span>Actif</span></td>";
                echo "<td><a href='../forms/statutCompte.php?idUser=$id'>Modifier</a></td>";
            }

            if ($activity == 0) {
                echo "<td><span>Déconnecté(e)</span></td>";
            } else {
                echo "<td><span>Connecté(e)</span></td>";
            }
            echo "</tr>";
        }
    }

    public function displayTickets()
    {
        $query = $this->bdd->prepare("SELECT * FROM ticket");
        $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $row) {
            $idTicket = $row["ticket"];

            if ($row["requete"] == 1) {
                $request = "Déblocage de compte";
            } elseif ($row["requete"] == 2) {
                $request = "Déblocage de quiz";
            }

            if ($row["en_cours"] == 0) {
                $enCours = "Disponible";
            } elseif ($row["en_cours"] == 1) {
                $enCours = "En cours";
            }

            if ($row["resolu"] == 0) {
                $status = "Non résolu";
            } elseif ($row["resolu"] == 1) {
                $status = "Résolu";
            }

            $idUser = $row["id_utilisateur"];

            echo "<tr>";
            echo "<td>$idTicket</td>";
            echo "<td>$request</td>";
            echo "</tr>";
        }
    }
}
