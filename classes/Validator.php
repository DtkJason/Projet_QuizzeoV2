<?php
require "CreatorQuiz.php";

class Validator extends CreatorQuiz
{
    public function setActive($idUser)
    {
        $active = true;
        $query = $this->bdd->prepare("UPDATE utilisateur SET statut_compte = :newStatus WHERE id_utilisateur = $idUser");
        $query->bindParam(":newStatus", $active);
        $query->execute();
        echo "L'utilisateur est maintenant actif";
    }

    public function setInactive($idUser)
    {
        $active = false;
        $query = $this->bdd->prepare("UPDATE utilisateur SET statut_compte = :newStatus WHERE id_utilisateur = $idUser");
        $query->bindParam(":newStatus", $active);
        $query->execute();
        echo "L'utilisateur est maintenant inactif";
    }

    public function editRole($idUser, $newRole)
    {
        if (!empty($newRole)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET id_groupe = :newRole WHERE id_utilisateur = $idUser");
            $query->bindParam(":newRole", $newRole);
            $query->execute();
            echo "Type de compte modifié";
        }
    }

    public function displayUsersValidator($idUser)
    {
        $query = $this->bdd->prepare("SELECT * FROM utilisateur EXCEPT SELECT * FROM utilisateur WHERE id_utilisateur = :idUser");
        $query->bindParam(":idUser", $idUser);
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
}
