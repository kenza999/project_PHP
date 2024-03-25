<?php

namespace Model\Entity;

use Model\Entity\Proposals;
use Model\Entity\users;

class clientfreelancerelations extends BaseEntity
{

    private $RelationID;
    private $missionAccepter;
    private $id_user;
    private $ProjectID;
    


    

    /**
     * Get the value of RelationID
     */ 
    public function getRelationID()
    {
        return $this->RelationID;
    }

    /**
     * Set the value of RelationID
     *
     * @return  self
     */ 
    public function setRelationID($RelationID)
    {
        $this->RelationID = $RelationID;

        return $this;
    }

    /**
     * Get the value of MissionName
     */ 
    public function getMissionName()
    {
        return $this->MissionName;
    }

    /**
     * Set the value of MissionName
     *
     * @return  self
     */ 
    public function setMissionName($MissionName)
    {
        $this->MissionName = $MissionName;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of ProjectID
     */ 
    public function getProjectID()
    {
        return $this->ProjectID;
    }

    /**
     * Set the value of ProjectID
     *
     * @return  self
     */ 
    public function setProjectID($ProjectID)
    {
        $this->ProjectID = $ProjectID;

        return $this;
    }
}

