<?php
//Démarrage de la session
session_start();

class ConnectionDB
{
    public $host = "localhost";
    public $user = "root";
    public $name = "tpquizz";
    public $bdd;

    public function __construct()
    {
        $this->bdd = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user);
    }
}

class Authentification extends ConnectionDB
{
    public $idUser;
    public $role;
    public $valid;



    //Fonction qui permet la vérification de l'existence de l'utilisateur et de le connecter s'il existe
    public function login($email, $password)
    {
        //Requête qui permet de vérifier si l'email existe dans la base de données
        $query1 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $query1->bindParam(":email", $email);
        $query1->execute();
        $row = $query1->fetch(PDO::FETCH_ASSOC);

        //Email existant
        if ($row == true) {
            $query2 = $this->bdd->prepare("UPDATE utilisateurs SET user_status = 1 WHERE email = :email");
            $query2->bindParam(":email", $email);

            $query2->execute();

            if (password_verify($password, $row["mdp"]) == true) {
                $this->idUser = $row["id_utilisateur"];
                $this->role = $row["role_user"];
                $this->valid = $row["vali_dation"];
                // echo $this->role;
                if ($this->role == 2) {
                    header("Location: validator.php");
                } else {
                    if ($this->valid != 1) {
                        header("Location: noaccess.php");
                    } else {
                        header("Location: index.php");
                    }
                    // header("Location: index.php");
                }
                // echo $this->role;
            } else {
                //Mot de passe incorrect
                echo '<script type="text/javascript">';
                echo 'alert("Mot de passe incorrect")';
                echo '</script>';
            }
        } else {
            //Utilisateur inexistant
            echo '<script type="text/javascript">';
            echo 'alert("Utilisateur inexistant")';
            echo '</script>';
        }
    }
    //Fonction qui permet de récupérer l'id de l'utilisateur concerné
    public function getIdUser()
    {
        return $this->idUser;
    }
    //Fonction qui permet de récupérer le rôle de l'utilisateur concerné
    public function getRoleUser()
    {
        return $this->role;
    }


    //Fonction qui permet la vérification de l'existence de l'utilisateur saisi, et de son insertion dans le cas contraire
    public function registration($name, $fname, $age, $email, $password, $confirmpassword)
    {
        if (!empty($name) && !empty($fname) && !empty($age) && !empty($email) && !empty($password) && !empty($confirmpassword)) {
            //Requête qui permet vérifier si le nouvel utilisateur existe dans la base de données
            $query1 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
            $query1->bindParam(":email", $email);
            $query1->execute();

            //Condition qui permet de vérifier si l'utilisateur choisi existe
            if ($query1->rowCount() > 0) {
                //Utilisateur déjà existant
                echo '<script type="text/javascript">';
                echo 'alert("Pseudo ou email est déjà utilisé")';
                echo '</script>';
            } else {
                //Vérification des mots de passe
                if ($password == $confirmpassword) {
                    //Requête qui permet d'insérer les informations du nouvel utilisateur
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $query2 = $this->bdd->prepare("INSERT INTO utilisateurs(nom, prenom, age, email, mdp) VALUES (:nom, :prenom, :age, :email, :mdp)");
                    $query2->bindParam(":nom", $name);
                    $query2->bindParam(":prenom", $fname);
                    $query2->bindParam(":age", $age);
                    $query2->bindParam(":email", $email);
                    $query2->bindParam(":mdp", $passwordHash);
                    $query2->execute();

                    header("Location: login.php?reg=1");
                } else {
                    //Les mots de passe ne sont pas identiques
                    echo '<script type="text/javascript">';
                    echo 'alert("Les mots de passe ne correspondent pas")';
                    echo '</script>';
                }
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Veuillez compléter tous les champs !")';
            echo '</script>';
        }
    }
}

class Administration extends ConnectionDB
{
    //Fonction qui permet d'afficher tous les membres
    public function displayUsers()
    {
        //Requête qui permet de récupérer toutes les données de la table utilisateurs
        $query1 = $this->bdd->prepare("SELECT * FROM utilisateurs");
        $query1->execute();
        //Stockage des informations de la table utilisateur récupérées dans un tableau associatif
        $data1 = $query1->fetchAll(PDO::FETCH_ASSOC);

        //Création des titres du tableau
        echo "<table class='boardo'>";
        echo "<thead>";
        echo "<tr>";
        echo "<td>ID</td>";
        echo "<td>Nom</td>";
        echo "<td>Prénom</td>";
        echo "<td>Age</td>";
        echo "<td>Email</td>";
        echo "<td>Validation</td>";
        echo "<td>Status d'inscription</td>";
        echo "<td>Status de l'user</td>";
        echo "<td></td>";
        echo "</tr>";
        echo "</thead>";

        //Boucle qui permet l'affichage de chaque utilisateur
        foreach ($data1 as $row) {
            $idUser = $row["id_utilisateur"];
            $userName = $row["nom"];
            $userFname = $row["prenom"];
            $userAge = $row["age"];
            $uservalidation = $row["vali_dation"];
            $userEmail = $row["email"];
            $userStatus = $row["user_status"];

            // $query2 = $this->bdd->prepare("SELECT * FROM entreprise WHERE id_entreprise = :idCompany");
            // $query2->bindParam(":idCompany", $userCompanyID);
            // $query2->execute();
            // $data2 = $query2->fetchAll(PDO::FETCH_ASSOC);

            // foreach ($data2 as $row) {
            //     $userCompany = $row["nom_entreprise"];
            //     $userCompanyAddress = $row["adresse"];
            //     $companySectorID = $row["id_secteur"];

            //     $query3 = $this->bdd->prepare("SELECT * FROM secteur WHERE id_secteur = :sectorIDCompany");
            //     $query3->bindParam(":sectorIDCompany", $companySectorID);
            //     $query3->execute();
            //     $data3 = $query3->fetchAll(PDO::FETCH_ASSOC);

            //     foreach ($data3 as $row) {
            //         $sectorName = $row["nom_secteur"];
            //     }
            // }

            //Affichage des données dans le tableau
            echo "<tr>";
            echo "<td>" . $idUser . "</td>";
            echo "<td>" . $userName . "</td>";
            echo "<td>" . $userFname . "</td>";
            echo "<td>" . $userAge . "</td>";
            echo "<td>" . $userEmail . "</td>";
            echo "<td>" . $uservalidation . "</td>";
            if ($uservalidation == 0) {
                echo "<td><button class='btn btn-danger' type='button' disabled>
            <span class='spinner-grow spinner-grow-sm' aria-hidden='true'></span>
            <span role='status'>Loading...</span>
          </button></td>";
            } elseif ($uservalidation == 2) {
                echo "<td><button class='btn btn-secondary' type='button' disabled>Refusé
          </button></td>";
            } else {
                echo "<td><button class='btn btn-warning' type='button' disabled>Validé
          </button></td>";
            }
            if ($userStatus != 0) {
                echo "<td><button class='btn btn-success' type='button' disabled>Online
          </button></td>";
            } else {
                echo "<td><button class='btn btn-secondary' type='button' disabled>Offline
          </button></td>";
            }



            // echo "<td><a href='editMember.php?id=$idUser'>Modifier</a></td>";

            // echo "<td><a href='deleteMember.php?id=$idUser'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    public function deleteMember($idUser)
    {
        //Requête qui permet de vérifier si l'utilisateur choisi existe dans la base de données
        $query1 = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = :idUser");
        $query1->bindParam(":idUser", $idUser);
        $query1->execute();

        //Si l'utilisateur existe
        if ($query1->rowCount() > 0) {
            //Requête qui permet de supprimer l'utilisateur choisi
            $query2 = $this->bdd->prepare("DELETE FROM utilisateurs WHERE id_utilisateur = :idUser");
            $query2->bindParam(":idUser", $idUser);
            $query2->execute();

            header("Location: index.php");
        } else {
            //Utilisateur inexistant
            echo "Utilisateur inexistant";
        }
    }

    public function editName($newName, $idUser)
    {
        if (isset($newName)) {
            //Requête qui permet de modifier le pseudo de l'utilisateur choisi
            $query1 = $this->bdd->prepare("UPDATE utilisateurs SET nom = :newNom WHERE id_utilisateur = $idUser");
            $query1->bindParam(":newNom", $newName);
            $query1->execute();
            echo '<script type="text/javascript">';
            echo 'alert("Nom modifié")';
            echo '</script>';
        } else {
            //Absence de saisie de donnée
            echo "Veuillez compléter le champs que vous souhaitez modifier !";
        }
    }

    public function editFname($newFname, $idUser)
    {
        if (isset($newFname)) {
            //Requête qui permet de modifier le pseudo de l'utilisateur choisi
            $query1 = $this->bdd->prepare("UPDATE utilisateurs SET prenom = :newPrenom WHERE id_utilisateur = $idUser");
            $query1->bindParam(":newPrenom", $newFname);
            $query1->execute();
            echo '<script type="text/javascript">';
            echo 'alert("Prénom modifié")';
            echo '</script>';
        } else {
            //Absence de saisie de donnée
            echo "Veuillez compléter le champs que vous souhaitez modifier !";
        }
    }

    public function editAge($newAge, $idUser)
    {
        if (isset($newAge)) {
            //Requête qui permet de modifier le pseudo de l'utilisateur choisi
            $query1 = $this->bdd->prepare("UPDATE utilisateurs SET age = :newAge WHERE id_utilisateur = $idUser");
            $query1->bindParam(":newAge", $newAge);
            $query1->execute();
            echo '<script type="text/javascript">';
            echo 'alert("Age modifié")';
            echo '</script>';
        } else {
            //Absence de saisie de donnée
            echo "Veuillez compléter le champs que vous souhaitez modifier !";
        }
    }

    public function editEmail($newEmail, $idUser)
    {
        if (isset($newEmail)) {
            //Requête qui permet de modifier l'email de l'utilisateur choisi
            $query1 = $this->bdd->prepare("UPDATE utilisateurs SET email = :newemail WHERE id_utilisateur = $idUser");
            $query1->bindParam(":newemail", $newEmail);
            $query1->execute();
            echo '<script type="text/javascript">';
            echo 'alert("Email modifié")';
            echo '</script>';
        } else {
            //Absence de saisie de donnée
            echo "Veuillez compléter le champs que vous souhaitez modifier !";
        }
    }

    public function editCompany($newCompanyID, $idUser)
    {
        if (isset($newCompanyID)) {
            //Requête qui permet de modifier le pseudo de l'utilisateur choisi
            $query1 = $this->bdd->prepare("UPDATE utilisateurs SET id_entreprise_user = :newCompanyID WHERE id_utilisateur = $idUser");
            $query1->bindParam(":newCompanyID", $newCompanyID);
            $query1->execute();
            echo '<script type="text/javascript">';
            echo 'alert("Entreprise modifié")';
            echo '</script>';
        } else {
            //Absence de saisie de donnée
            echo "Veuillez compléter le champs que vous souhaitez modifier !";
        }
    }

    public function editPassword($newPass, $confirmPass, $idUser)
    {
        //Vérification de l'existence des données saisies
        if (isset($newPass) && isset($confirmPass)) {
            //Vérification des mots de passe
            if ($newPass == $confirmPass) {
                $passwordHash = password_hash($newPass, PASSWORD_DEFAULT);
                //Requête qui permet de modifier le mot de passe de l'utilisateur choisi
                $query1 = $this->bdd->prepare("UPDATE utilisateurs SET mdp = :newpassword WHERE id_utilisateur = $idUser");
                $query1->bindParam(":mdp", $passwordHash);
                $query1->execute();
                echo '<script type="text/javascript">';
                echo 'alert("Mot de passe modifié")';
                echo '</script>';
            } else {
                //Les mots de passe ne sont pas identiques
                echo "Les mots de passe ne correspondent pas";
            }
        } else {
            //Absence d'une saisie de donnée
            echo "Veuillez compléter le champs que vous souhaitez modifier !";
        }
    }

    // ----------------------------

    public function editvalidation($newValid, $idUser)
    {

        //Requête qui permet de modifier le pseudo de l'utilisateur choisi
        $query1 = $this->bdd->prepare("UPDATE utilisateurs SET vali_dation = :newvalid WHERE id_utilisateur = $idUser");
        $query1->bindParam(":newvalid", $newValid);
        $query1->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Compte Validé")';
        echo '</script>';
    }

    function deconexion($idUser)
    {

        //Requête qui permet de modifier le pseudo de l'utilisateur choisi
        $query2 = $this->bdd->prepare("UPDATE utilisateurs SET user_status = 0 WHERE id_utilisateur = $idUser");


        $query2->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Deco")';
        echo '</script>';
    }
}
