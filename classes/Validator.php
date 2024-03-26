<?php
require "CreatorQuiz.php";

class Validator extends CreatorQuiz
{
    public function setActive($idUser)
    {
        $active = true;
        $query = $this->bdd->prepare("UPDATE utilisateur SET statut_compte = :newStatus WHERE id_utilisateur = $idUser");
        $query->bindParam(":newRole", $active);
        $query->execute();
    }

    public function setInactive($idUser)
    {
        $active = false;
        $query = $this->bdd->prepare("UPDATE utilisateur SET statut_compte = :newStatus WHERE id_utilisateur = $idUser");
        $query->bindParam(":newRole", $active);
        $query->execute();
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
}
