<?php

namespace Model\Entity;

use Model\Entity\users;
use Model\Entity\competences;

class CompetenceFreelance extends BaseEntity{
    private $competenceFreelanceID;
    private $competenceID;
    private $freelanceID;
    

    /**
     * Get the value of competenceFreelanceID
     */ 
    public function getCompetenceFreelanceID()
    {
        return $this->competenceFreelanceID;
    }

    /**
     * Set the value of competenceFreelanceID
     *
     * @return  self
     */ 
    public function setCompetenceFreelanceID($competenceFreelanceID)
    {
        $this->competenceFreelanceID = $competenceFreelanceID;

        return $this;
    }

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
     * Get the value of freelanceID
     */ 
    public function getFreelanceID()
    {
        return $this->freelanceID;
    }

    /**
     * Set the value of freelanceID
     *
     * @return  self
     */ 
    public function setFreelanceID($freelanceID)
    {
        $this->freelanceID = $freelanceID;

        return $this;
    }
}