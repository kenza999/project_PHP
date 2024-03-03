<?php

namespace Model\Repository;

use Model\Entity\Users;
use Service\Session;
use Service\User;

class UserRepository extends BaseRepository
{
    public function findByNom($nom)
    {
        $request = $this->dbConnection->prepare("SELECT * FROM users WHERE nom = :nom");
        $request->bindParam(":nom", $nom);

        if ($request->execute()) {
            if ($request->rowCount() == 1) {
                $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Users");
                return $request->fetch();
            } else {
                return false;
            }
        } else {
            return null;
        }
    }
    public function checkUserExist($nom, $email)
{
    $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM users WHERE email = :email ");

    $request->bindParam(":email", $email);

    $request->execute(); 
    $count = $request->fetchColumn();
    return $count > 1 ? true : false;
}

public function insertUser(Users $user)
{
    try{

    
    $sql = "INSERT INTO users (username, nom, email, password_hash, carte_didentite, date_de_naissance, genre, photo, description_dutilisateur, nationalite, verificationUser, role, numero_telephone, numero_siret) VALUES (:username, :nom, :email, :password_hash, :carte_didentite, :date_de_naissance, :genre, :photo, :description_dutilisateur, :nationalite,  :verificationUser, :role, :numero_telephone , :numero_siret)";
    $request = $this->dbConnection->prepare($sql);
    $request->bindValue(":username", $user->getUsername());
    $request->bindValue(":nom", $user->getNom());
    $request->bindValue(":email", $user->getEmail());
    $request->bindValue(":password_hash", $user->getPassword_hash());
    $request->bindValue(":carte_didentite", $user->getCarte_didentite());
    $request->bindValue(":date_de_naissance", $user->getDate_de_naissance());
    $request->bindValue(":numero_telephone", $user->getNumero_telephone());
    $request->bindValue(":numero_siret", $user->getNumero_siret());
    $request->bindValue(":genre", $user->getGenre());
    $request->bindValue(":photo", $user->getPhoto());
    $request->bindValue(":description_dutilisateur", $user->getDescription_dutilisateur());
    $request->bindValue(":nationalite", $user->getNationalite());
    $request->bindValue(":role", $user->getRole());  
    $request->bindValue(":verificationUser", $user->getVerificationUser());
    
    
    $result = $request->execute();
    if ($result) {
        if ($result == 1){
            Session::addMessage("success", "Le nouvel utilisateur a bien été enregistré");
            return true;
        }
        Session::addMessage("danger", "Erreur : l'utilisateur n'a pas été enregistré");
        return false;
    }
    Session::addMessage("danger", "Erreur SQL");
    return null;
    }catch (PDOException $e){
        die($e->getMessage());
    }
}

public function updateUser(Users $user)
{
    $sql = "UPDATE users SET username = :username, nom = :nom, email = :email, password_hash = :password_hash, carte_didentite = :carte_didentite, date_de_naissance = :date_de_naissance, genre = :genre, photo = :photo, description_dutilisateur = :description_dutilisateur, nationalite = :nationalite, role = :role WHERE id = :id";
    $request = $this->dbConnection->prepare($sql);
    $request->bindValue(":username", $user->getUsername());
    $request->bindValue(":nom", $user->getNom());
    $request->bindValue(":email", $user->getEmail());
    $request->bindValue(":password_hash", $user->getPassword_hash());
    $request->bindValue(":carte_didentite", $user->getCarte_didentite());
    $request->bindValue(":date_de_naissance", $user->getDateDeNaissance());
    $request->bindValue(":genre", $user->getGenre());
    $request->bindValue(":photo", $user->getPhoto());
    $request->bindValue(":description_dutilisateur", $user->getDescriptionDutilisateur());
    $request->bindValue(":nationalite", $user->getNationalite());
    $request->bindValue(":id", $user->getId());
    $request->bindValue(":role", $user->getRole());
    $request = $request->execute();
    if ($request) {
        if ($request == 1) {
            Session::addMessage("success",  "La mise à jour de l'utilisateur a bien été éffectuée");
            return true;
        }
        Session::addMessage("danger",  "Erreur : l'utilisateur n'a pas été mise à jour");
        return false;
    }
    Session::addMessage("danger",  "Erreur SQL");
    return null;
}



// Ce code est une méthode nommée loginUser définie dans une classe UserRepository. 
// Cette méthode est utilisée pour vérifier si un utilisateur existe dans la base de données 
// en fonction de son adresse e-mail. 

public function loginUser($email) {        
    $request = $this->dbConnection->prepare("SELECT * FROM users WHERE email = :email");
    $request->bindParam(":email", $email);

    if ($request->execute()) {
        if ($request->rowCount() == 1) {
            // Utilisation de fetchObject pour obtenir un objet de type Users
            return $request->fetchObject("Model\Entity\Users");
        } else {
            return false;
        }
    } else {
        return null;
    }
}
public function getUserVerification(){
    try {
        $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE verificationUser = 'En attente'");
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Users");
        return $row;
    } catch (PDOException $e) {
        // Gérer l'erreur ou la logger
        error_log("Erreur lors de la récupération des users non lues : " . $e->getMessage());
    }
}
public function checkUser(){
    try {
    $sql = $this->dbConnection->prepare ("UPDATE users SET verificationUser = 'En attente' WHERE users.id = :id;");
    $sql->bindValue(':id', $user->getid());
    $sql->execute();
} catch (PDOException $e) {
    // Gérer l'erreur ou la logger
    error_log("Erreur lors de la récupération des users non lues : " . $e->getMessage());
}
}
}





// Ce code est une méthode nommée loginUser définie dans une classe UserRepository. 
// Cette méthode est utilisée pour vérifier si un utilisateur existe dans la base de données 
// en fonction de son adresse e-mail. 

// public function loginUser($email) {        
//     // $request = $this->dbConnection->prepare("SELECT * FROM users WHERE email = :email");: Cette ligne prépare une requête SQL pour sélectionner tous les champs de la table users où l'e-mail correspond à celui fourni en paramètre.
//     $request = $this->dbConnection->prepare("SELECT * FROM users WHERE email = :email");
//     // Cette ligne lie la valeur de la variable $email au paramètre nommé :email dans la requête préparée. Cela permet d'éviter les attaques par injection SQL en utilisant une requête préparée avec des paramètres liés
//     $request->bindParam(":email", $email);
//     // if ($request->execute()) {: Cette ligne exécute la requête préparée. Si l'exécution réussit, cela signifie que la requête a été exécutée avec succès.
//     if ($request->execute()) {
//         if ($request->rowCount() == 1){
//         // Cette ligne vérifie le nombre de lignes retournées par la requête. Si une seule ligne est retournée, cela signifie qu'un utilisateur avec cet e-mail existe dans la base de données. 
//             $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Users");
//             // Cette ligne configure le mode de récupération des résultats de la requête. Dans ce cas, les résultats seront récupérés en tant qu'objet de la classe Model\Entity\Users
//             return $request->fetch();
//         } else {
//             return false;
//         }
//     } else {
//         return null;
//     }
// }


