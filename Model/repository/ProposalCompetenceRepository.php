<?php

namespace Model\Repository;

use Model\Entity\ProposalCompetence;
use Service\Session;

class ProposalCompetenceRepository extends BaseRepository
{
    
    public function insertProposalCompetence(ProposalCompetence $ProposalCompetence, $idProposal)
    {
        try {
            // Préparation de la requête SQL pour l'insertion
            $sql = "INSERT INTO proposalcompetence (idCompetence, idProposal, created_at) VALUES (:idCompetence, :idProposal, NOW())";
            $request = $this->dbConnection->prepare($sql);
            foreach ($ProposalCompetence->getProposalCompetenceID() as $idCompetence)
                {
                  // Liaison des paramètres à la requête
            $request->bindValue(":idCompetence", $idCompetence, \PDO::PARAM_INT);
            $request->bindValue(":idProposal", $idProposal, \PDO::PARAM_INT);
            $request->execute();
                }
            $proposal = $this->dbConnection->lastInsertId();
            return $proposal;
        } catch (\PDOException $e) {
            // Gestion des erreurs
            Session::addMessage("danger", "Erreur SQL : " . $e->getMessage());
            return false;
        }
    }
    //
    public function competenceFreelancer() 
    {
        try {
        $sql  = "SELECT competences.* ,users.id as users_id, users.username as users_username, users.is_deleted as users_is_deleted, users.created_at as users_created_at, users.updated_at as users_updated_at, users.role FROM competencefreelance JOIN competences ON competencefreelance.competenceID = competences.id JOIN users ON users.id = competencefreelance.freelanceID WHERE competences.id = :id AND users.role = 'ROLE_USER';";
        $request = $this->dbConnection->prepare($sql);
        {
            
        }
    }catch (\PDOException $e) {
        // Gestion des erreurs
        Session::addMessage("danger", "Erreur SQL : " . $e->getMessage());
        return false;
    }
}
}