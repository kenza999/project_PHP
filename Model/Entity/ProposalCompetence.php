<?php

namespace Model\Entity;

use Model\Entity\Competences;
use Model\Entity\CompetenceFreelance;
use Model\Entity\Users;

class ProposalCompetence extends BaseEntity{

    private $proposalCompetenceID;
    private $idCompetence;
    private $idProposal;
    

    /**
     * Get the value of proposalCompetenceID
     */ 
    public function getProposalCompetenceID()
    {
        return $this->proposalCompetenceID;
    }

    /**
     * Set the value of proposalCompetenceID
     *
     * @return  self
     */ 
    public function setProposalCompetenceID($proposalCompetenceID)
    {
        $this->proposalCompetenceID = $proposalCompetenceID;

        return $this;
    }

    /**
     * Get the value of idCompetence
     */ 
    public function getIdCompetence()
    {
        return $this->idCompetence;
    }

    /**
     * Set the value of idCompetence
     *
     * @return  self
     */ 
    public function setIdCompetence($idCompetence)
    {
        $this->idCompetence = $idCompetence;

        return $this;
    }

    /**
     * Get the value of idProposal
     */ 
    public function getIdProposal()
    {
        return $this->idProposal;
    }

    /**
     * Set the value of idProposal
     *
     * @return  self
     */ 
    public function setIdProposal($idProposal)
    {
        $this->idProposal = $idProposal;

        return $this;
    }
}