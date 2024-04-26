<?php

namespace Model\Repository;

use Model\Entity\Users;
use Model\Entity\Proposals;
use Model\Entity\clientfreelancerelations;
use Service\Session;

// système de gestion de propositions
        class ProposalsRepository extends BaseRepository {
            // Récupère toutes les propositions de la base de données
public function getAllProposals() {

                $user = new Users;
                // Définir la requête SQL pour sélectionner les propositions
                $request = $this->dbConnection->prepare("
                    SELECT * 
                    FROM proposals 
                    LEFT JOIN clientfreelancerelations ON proposals.id = clientfreelancerelations.ProjectID 
                    WHERE clientfreelancerelations.id_user = :id_user OR clientfreelancerelations.id_user IS NULL
                ");
                $request->bindValue(':id_user', $_SESSION["user"]->getId());
                $request->execute();
                $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Proposals"); 
                return $request->fetchAll  ();
                // return $request->fetchAll(); // Utilisation de fetchAll() pour récupérer toutes les propositions
            }

    // Ajoute une nouvelle proposition à la base de données
    public function addProposal(Proposals $proposal) {

        $proposal->setId_client($_SESSION["user"]->getId());

        $query = "INSERT INTO proposals (missionName, missionEnd, description, budget, missionDuration, missionStart, remoteWork, location, id_client, created_at) VALUES (:missionName, :missionEnd, :description, :budget, :missionDuration, :missionStart, :remoteWork, :location, :id_client, NOW())";


        $request = $this->dbConnection->prepare($query);
        
        $request->bindValue(":missionName", $proposal->getMissionName()); 
        $request->bindValue(":description", $proposal->getDescription());
        $request->bindValue(":budget", $proposal->getBudget());
        $request->bindValue(":missionDuration", $proposal->getMissionDuration());
        $request->bindValue(":missionStart", $proposal->getMissionStart());
        $request->bindValue(":missionEnd", $proposal->getMissionEnd());
        $request->bindValue(":remoteWork", $proposal->getRemoteWork());
        $request->bindValue(":location", $proposal->getLocation());
        $request->bindValue(":id_client", $proposal->getId_client());

        $request = $request->execute();
        $idProposal = $this->dbConnection->lastInsertId();


      if ($request) {
        if ($request == 1) {
            Session::addMessage("success",  "La proposition a bien été ajoutée");
            return $idProposal;
        }
        Session::addMessage("danger",  "Erreur : le produit n'a pas été enregisté");
            return false;
        }
        Session::addMessage("danger",  "Erreur SQL");
        return null;
    
    }
 
    // Met à jour une proposition existante

     public function updateProposal(Proposals $proposal) {
        
         $sql = "UPDATE proposals SET missionName = :missionName, description = :description, budget = :budget,missionDuration = :missionDuration, missionStart = :missionStart, missionEnd = :missionEnd, remoteWork = :remoteWork, location = :location WHERE id = :id";
         $request = $this->dbConnection->prepare($sql);

       
        $request->bindValue(":missionName", $proposal->getMissionName()); 
        $request->bindValue(":description", $proposal->getDescription());
        $request->bindValue(":budget", $proposal->getBudget());
        $request->bindValue(":missionDuration", $proposal->getMissionDuration());
        $request->bindValue(":missionStart", $proposal->getMissionStart());
        $request->bindValue(":missionEnd", $proposal->getMissionEnd());
        $request->bindValue(":remoteWork", $proposal->getRemoteWork());
        $request->bindValue(":location", $proposal->getLocation());
        $request->bindValue(":id", $proposal->getId());

        $request = $request->execute();
        if ($request) {
            if ($request == 1) {
                Session::addMessage("success",  "La mise à jour de la proposition a bien été éffectuée");
                return true;
            }
            Session::addMessage("danger",  "Erreur : la proposition n'a pas été mise à jour");
            return false;

            Session::addMessage("danger", "Erreur SQL");
            return null;
    }
}
 




    // Supprime une proposition de la base de données


//     public function deleteProposal($id) {
//         $query = "DELETE FROM proposals WHERE id = :id";
//         $request = $this->dbConnection->prepare($sql);
//         $request->bindParam(':id', $id);
//         return $request->execute();
//     }
 
//      public static function getMissions()
// {
//     return $_SESSION["missions"] ?? [];
// }

    // Accepte une mission et l'ajoute à la relation client-freelancer
    // public function acceptMission(Proposals $proposal) {
    //     // Définir la requête SQL pour insérer une nouvelle relation client-freelancer
    //     $query = "INSERT INTO clientfreelancerelations (id_user, ProjectID, missionAccepter) VALUES (:id_user, :ProjectID, NOW())"; 
    //     $request = $this->dbConnection->prepare($query);
        
    //     $request->bindValue(':id_user', $_SESSION["user"]->getId());
    //     $request->bindValue(':ProjectID', $proposal->getId());
        
    //     // Exécuter la requête
    //     $result = $request->execute();
        
    //     // Gérer les messages de session en fonction du résultat de l'opération
    //     if ($result) {
    //         Session::addMessage("success",  "La mission a été acceptée avec succès.");
    //         return true;
    //     } else {
    //         Session::addMessage("danger",  "Erreur lors de l'acceptation de la mission.");
    //         return false;
    //     }
    // }
}
