<?php

namespace Model\Entity;

class Proposals extends BaseEntity
{

    private $missionName;
    private $description;
    private $date;
    private $budget;
    private $missionDuration;
    private $missionStart;
    private $missionEnd;
    private $location;
    private $skillsRequired;
    private $remoteWork;
    private $id_client;
    


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of missionName
     */ 
    public function getMissionName()
    {
        return $this->missionName;
    }

    /**
     * Set the value of missionName
     *
     * @return  self
     */ 
    public function setMissionName($missionName)
    {
        $this->missionName = $missionName;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of budget
     */ 
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set the value of budget
     *
     * @return  self
     */ 
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get the value of missionDuration
     */ 
    public function getMissionDuration()
    {
        return $this->missionDuration;
    }

    /**
     * Set the value of missionDuration
     *
     * @return  self
     */ 
    public function setMissionDuration($missionDuration)
    {
        $this->missionDuration = $missionDuration;

        return $this;
    }

    /**
     * Get the value of missionStart
     */ 
    public function getMissionStart()
    {
        return $this->missionStart;
    }

    /**
     * Set the value of missionStart
     *
     * @return  self
     */ 
    public function setMissionStart($missionStart)
    {
        $this->missionStart = $missionStart;

        return $this;
    }

    /**
     * Get the value of missionEnd
     */ 
    public function getMissionEnd()
    {
        return $this->missionEnd;
    }

    /**
     * Set the value of missionEnd
     *
     * @return  self
     */ 
    public function setMissionEnd($missionEnd)
    {
        $this->missionEnd = $missionEnd;

        return $this;
    }

    /**
     * Get the value of location
     */ 
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set the value of location
     *
     * @return  self
     */ 
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get the value of skillsRequired
     */ 
    public function getSkillsRequired()
    {
        return $this->skillsRequired;
    }

    /**
     * Set the value of skillsRequired
     *
     * @return  self
     */ 
    public function setSkillsRequired($skillsRequired)
    {
        $this->skillsRequired = $skillsRequired;

        return $this;
    }

    /**
     * Get the value of remoteWork
     */ 
    public function getRemoteWork()
    {
        return $this->remoteWork;
    }

    /**
     * Set the value of remoteWork
     *
     * @return  self
     */ 
    public function setRemoteWork($remoteWork)
    {
        $this->remoteWork = $remoteWork;

        return $this;
    }

    /**
     * Get the value of id_client
     */ 
    public function getId_client()
    {
        return $this->id_client;
    }

    /**
     * Set the value of id_client
     *
     * @return  self
     */ 
    public function setId_client($id_client)
    {
        $this->id_client = $id_client;

        return $this;
    }
}

