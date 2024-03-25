<?php

namespace Model\Entity;

use Model\Entity\competencefreelance;
use Model\Entity\Users;

class competences extends BaseEntity{
    private $competenceID;
    private $nom_competence;

    /**
     * Get the value of competenceID
     */ 
    public function getCompetenceID()
    {
        return $this->competenceID;
    }

    /**
     * Set the value of competenceID
     *
     * @return  self
     */ 
    public function setCompetenceID($competenceID)
    {
        $this->competenceID = $competenceID;

        return $this;
    }

    /**
     * Get the value of nom_competence
     */ 
    public function getNom_competence()
    {
        return $this->nom_competence;
    }

    /**
     * Set the value of nom_competence
     *
     * @return  self
     */ 
    public function setNom_competence($nom_competence)
    {
        $this->nom_competence = $nom_competence;

        return $this;
    }
}