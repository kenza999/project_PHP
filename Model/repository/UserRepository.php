<?php

namespace Model\Repository;

use Model\Entity\Users;
use Service\Session;


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
    public function checkUserExist($email)
{
    $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM users WHERE email = :email ");

    $request->bindParam(":email", $email);

    $request->execute(); 
    $count = $request->fetchColumn();
    return $count > 1 ? true : false;
}

public function insertUser(Users $user)
{
    try {
        $sql = "INSERT INTO users (username, nom, email, password_hash, carte_didentite, date_de_naissance, genre, photo, description_dutilisateur, nationalite, verificationUser, role, numero_telephone, numero_siret, adresse, ville, code_postal, metier, created_at) VALUES (:username, :nom, :email, :password_hash, :carte_didentite, :date_de_naissance, :genre, :photo, :description_dutilisateur, :nationalite,  :verificationUser, :role, :numero_telephone , :numero_siret, :adresse, :ville, :code_postal, :metier, NOW())";
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
    $request->bindValue(":adresse", $user->getAdresse());
    $request->bindValue(":ville", $user->getVille());
    $request->bindValue(":code_postal", $user->getCode_postal());
    $request->bindValue(":metier", $user->getMetier());
    
    $result = $request->execute();
    
    $Freelance = $this->dbConnection->lastInsertId();
 
    return $Freelance;
    
    }catch (PDOException $e){
        die($e->getMessage());
    }
}

public function updateUser(Users $user)
{
    // Préparation de la requête SQL pour mettre à jour un utilisateur
    $sql = "UPDATE users SET numero_telephone = :numero_telephone, description_dutilisateur = :description_dutilisateur WHERE id = :id";
    $stmt = $this->dbConnection->prepare($sql);

    // Liaison des paramètres à la requête pour éviter les injections SQL
    $stmt->bindValue(":numero_telephone", $user->getNumero_telephone(), \PDO::PARAM_INT);
    $stmt->bindValue(":description_dutilisateur", $user->getDescription_dutilisateur(), \PDO::PARAM_STR);
    $stmt->bindValue(":id", $user->getId(), \PDO::PARAM_INT);

    // Exécution de la requête
    $result = $stmt->execute();

    // Vérification du résultat de la requête
    if ($result) {
        if ($stmt->rowCount() > 0) {
            Session::addMessage("success", "La mise à jour de l'utilisateur a bien été effectuée");
            return true;
        } else {
            Session::addMessage("danger", "Aucune information n'a été modifiée.");
            return false;  // Aucun enregistrement modifié
        }
    } else {
        Session::addMessage("danger", "Erreur SQL lors de la mise à jour de l'utilisateur.");
        return null;  // Échec de l'exécution de la requête
    }
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
        $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE verificationUser = 'En attente' AND is_deleted != 1");
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Users");
        return $row;
    } catch (PDOException $e) {
        // Gérer l'erreur ou la logger
        error_log("Erreur lors de la récupération des users non lues : " . $e->getMessage());
    }
}
public function checkUser(Users $user){
    try {
    $sql = $this->dbConnection->prepare ("UPDATE users SET verificationUser = 'Accepté' WHERE users.id = :id;");
    $sql->bindValue(':id', $user->getid());
    $sql->execute();
    $row = $sql->fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Users");
    var_dump($row);
        return $row;
} catch (PDOException $e) {
    // Gérer l'erreur ou la logger
    error_log("Erreur lors de la récupération des users non lues : " . $e->getMessage());
}
}
public function afficheFreelance(Users $user) {
    try{
        $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE role = 'ROLE_USER' ");
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Users");
        return $row;
    }catch (PDOException $e) {
        // Gérer l'erreur ou la logger
        error_log("Erreur lors de la récupération des users non lues : " . $e->getMessage());
    }
}

public function searchProfiles(Users $user){
    try{
        $stmt = $this->dbConnection->prepare("SELECT * FROM users WHERE metier LIKE '%:Metier%' OR  role = 'ROLE_USER'  ");
        
        $stmt->execute();
        $row = $stmt->fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Users");
        return $row;
    }catch (PDOException $e) {
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


