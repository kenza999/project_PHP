<?php

namespace Model\Repository;

use Model\Entity\CompetenceFreelance;
use Service\Session;

class CompetenceFreelanceRepository extends BaseRepository{
    public function insertCompetenceFreelance(CompetenceFreelance $competence, $idUser){
    // Insertion des compétences dans la table competenceFreelance
     $var = $this->dbConnection->prepare("INSERT INTO competenceFreelance (competenceID, FreelanceID, created_at) VALUES (:competenceID, :FreelanceID, NOW()");

      foreach ($competence->getCompetenceID() as $competences )
      { 
        $var->bindParam(':competenceID', $competences); 
        $var->bindParam(':FreelanceID', $idUser);
        $var->execute();
     }
    }
}