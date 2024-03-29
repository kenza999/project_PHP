<?php

namespace Model\Repository;

use Model\Entity\Competences;
use Service\Session;

class CompetencesRepository extends BaseRepository
{
    Public function addCompetences(Competences $competences){
        try{
        $query = "INSERT INTO competences (NomCompetence, created_at) VALUE (:NomCompetence, NOW())";
        $request = $this->dbConnection->prepare($query);
        
        $request->bindValue(":NomCompetence", $competences->getNomCompetence()); 
        $request = $request->execute();
        if ($request) {
          if ($request == 1) {
              Session::addMessage("success",  "La competence a bien été ajoutée");
              return true;
          }
          Session::addMessage("danger",  "Erreur : la competence n'a pas été enregisté");
              return false;
          }
          Session::addMessage("danger",  "Erreur SQL");
          return null;
        }
          catch(PDOException $e){
            Session::addMessage("danger",  "Erreur SQL");
            return null;
        }
    }


    public function checkCompetenceExist($NomCompetences)
    {
        $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM competences WHERE NomCompetence = :NomCompetence");
    
        $request->bindParam(":NomCompetence", $NomCompetences);
    
        $request->execute(); 
        $count = $request->fetchColumn();
        return $count > 0 ? true : false;
    }
}