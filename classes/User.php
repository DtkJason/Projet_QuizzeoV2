<?php
require __DIR__ . "/../config/ConnectionDB.php";

class User extends Database
{
    public function modifierPseudo($idUser, $newPseudo)
    {
        if (!empty($newPseudo)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET pseudo = :newPseudo WHERE id_utilisateur = $idUser");
            $query->bindParam(":newPseudo", $newPseudo);
            $query->execute();
        }
    }

    public function modifierEmail($idUser, $newEmail)
    {
        if (!empty($newEmail)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET email = :newEmail WHERE id_utilisateur = $idUser");
            $query->bindParam(":newEmail", $newEmail);
            $query->execute();
        }
    }

    public function modifierMDP($idUser, $newMDP)
    {
        if (!empty($newMDP)) {
            $query = $this->bdd->prepare("UPDATE utilisateur SET mdp = :newMDP WHERE id_utilisateur = $idUser");
            $query->bindParam(":newMDP", $newMDP);
            $query->execute();
        }
    }
}
