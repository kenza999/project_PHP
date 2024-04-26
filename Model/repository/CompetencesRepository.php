<?php

namespace Model\Repository;

use Model\Entity\Competences;
use Service\Session;

class CompetencesRepository extends BaseRepository
{
    /**
     * Ajoute une nouvelle compétence à la base de données.
     *
     * @param Competences $competences L'objet compétence à ajouter.
     * @return bool Retourne true si l'ajout a réussi, false sinon.
     */
    public function addCompetences(Competences $competences)
    {
        try {
            $query = "INSERT INTO competences (NomCompetence, created_at) VALUES (:NomCompetence, NOW())";
            $request = $this->dbConnection->prepare($query);
            
            $request->bindValue(":NomCompetence", $competences->getNomCompetence());
            
            if ($request->execute()) {
                Session::addMessage("success", "La compétence a bien été ajoutée");
                return true;
            } else {
                Session::addMessage("danger", "Erreur : la compétence n'a pas été enregistrée");
                return false;
            }
        } catch (\PDOException $e) {
            $this->dbConnection->rollBack();
            Session::addMessage("danger", "Erreur SQL : " . $e->getMessage());
            return false;
        }
    }

    /**
     * Vérifie si une compétence existe déjà dans la base de données.
     *
     * @param string $NomCompetences Le nom de la compétence à vérifier.
     * @return bool Retourne true si la compétence existe déjà, false sinon.
     */
    public function checkCompetenceExist($NomCompetences)
    {
        $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM competences WHERE NomCompetence = :NomCompetence");
        
        $request->bindValue(":NomCompetence", $NomCompetences);
        
        $request->execute();
        $count = $request->fetchColumn();
        
        return $count > 0;
    }
}
