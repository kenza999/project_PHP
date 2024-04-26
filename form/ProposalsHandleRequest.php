<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Proposals;
use Model\Repository\ProposalsRepository;
use Model\Entity\ProposalCompetence;

class ProposalsHandleRequest extends BaseHandleRequest
{
    private $proposalsRepository;

    public function __construct()
    {
        $this->proposalsRepository  = new ProposalsRepository;
    }

    public function handleInsertForm(Proposals $proposals, ProposalCompetence $proposalcompetence)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            extract($_POST);
            $errors = [];
            // Vérification de la validité du formulaire
            if (empty($missionName)) {
                $errors[] = "Le nom de la mission ne peut pas être vide";
            }
            if (empty($description)) {
                $errors[] = "La description ne peut pas être vide";
            }
            if (!is_numeric($budget)) {
                $errors[] = "Le budget doit avoir une valeur numérique";
            }
            if (empty($budget)) {                
                $errors[] = "Le budget ne peut pas être vide";
            }
            if (!is_numeric($missionDuration)) {
                $errors[] = "La durée de la mission doit avoir une valeur numérique";
            }
            if (empty($missionDuration)) {                
                $errors[] = "La durée de la mission ne peut pas être vide";
            }
            if (empty($missionStart)) {
                $errors[] = "La date de début de la mission ne peut pas être vide";
            }
            if (empty($missionEnd)) {
                $errors[] = "La date de fin de la mission ne peut pas être vide";
            }
            if (empty($location)) {
                $errors[] = "La localisation ne peut pas être vide";
            }
            // if (empty($skillsRequired)) {
            //     $errors[] = "Les compétences requises ne peuvent pas être vides";
            // }
    
    
            if (empty($errors)) {
                $proposals->setRemoteWork($remoteWork);
                $proposals->setMissionName($missionName);
                $proposals->setDescription($description);
                $proposals->setBudget($budget);
                $proposals->setMissionDuration($missionDuration);
                $proposals->setMissionStart($missionStart);
                $proposals->setMissionEnd($missionEnd);
                $proposals->setLocation($location);
                // $proposals->setSkillsRequired($skillsRequired);
                $proposalcompetence->setProposalCompetenceID($competences);
    
                return $this;
            }
    
            $this->setErrorsForm($errors);
            return $this;
        }
    }
    
    public function handleEditForm(Proposals $proposals)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
            extract($_POST);
            $errors = [];
            // Vérification de la validité du formulaire
            if (empty($missionName)) {
                $errors[] = "Le nom de la mission ne peut pas être vide";
            }
            if (empty($description)) {
                $errors[] = "La description ne peut pas être vide";
            }
            if (!is_numeric($budget)) {
                $errors[] = "Le budget doit avoir une valeur numérique";
            }
            if (empty($budget)) {                
                $errors[] = "Le budget ne peut pas être vide";
            }
            if (!is_numeric($missionDuration)) {
                $errors[] = "La durée de la mission doit avoir une valeur numérique";
            }
            if (empty($missionDuration)) {                
                $errors[] = "La durée de la mission ne peut pas être vide";
            }
            if (empty($missionStart)) {
                $errors[] = "La date de début de la mission ne peut pas être vide";
            }
            if (empty($missionEnd)) {
                $errors[] = "La date de fin de la mission ne peut pas être vide";
            }
            if (empty($location)) {
                $errors[] = "La localisation ne peut pas être vide";
            }
            if (empty($skillsRequired)) {
                $errors[] = "Les compétences requises ne peuvent pas être vides";
            }
    
    
            if (empty($errors)) {
                $proposals->setRemoteWork($remoteWork);
                $proposals->setMissionName($missionName);
                $proposals->setDescription($description);
                $proposals->setBudget($budget);
                $proposals->setMissionDuration($missionDuration);
                $proposals->setMissionStart($missionStart);
                $proposals->setMissionEnd($missionEnd);
                $proposals->setLocation($location);
                $proposals->setSkillsRequired($skillsRequired);
                
    
                return $this;
            }
    
            $this->setErrorsForm($errors);
            return $this;
        }
    }
    
}