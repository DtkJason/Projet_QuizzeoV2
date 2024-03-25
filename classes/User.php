<?php
require __DIR__ . "/../config/Database.php";

class User extends Database
{
    public function editPseudo($idUser, $newPseudo)
    {
        if (!empty($newPseudo)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET pseudo = :newPseudo WHERE id_utilisateur = $idUser");
            $query->bindParam(":newPseudo", $newPseudo);
            $query->execute();
        }
    }

    public function editEmail($idUser, $newEmail)
    {
        if (!empty($newEmail)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET email = :newEmail WHERE id_utilisateur = $idUser");
            $query->bindParam(":newEmail", $newEmail);
            $query->execute();
        }
    }

    public function editMDP($idUser, $newMDP)
    {
        if (!empty($newMDP)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET mdp = :newMDP WHERE id_utilisateur = $idUser");
            $query->bindParam(":newMDP", $newMDP);
            $query->execute();
        }
    }
}
