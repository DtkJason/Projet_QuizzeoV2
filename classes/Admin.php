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
}
