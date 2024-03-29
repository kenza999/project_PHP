<?php

namespace Model\Entity;

use Model\Entity\CompetenceFreelance;
use Model\Entity\Users;

class Competences extends BaseEntity{
    
    private $NomCompetence;

 
    /**
     * Get the value of NomCompetence
     */ 
    public function getNomCompetence()
    {
        return $this->NomCompetence;
    }

    /**
     * Set the value of NomCompetence
     *
     * @return  self
     */ 
    public function setNomCompetence($NomCompetence)
    {
        $this->NomCompetence = $NomCompetence;

        return $this;
    }
}