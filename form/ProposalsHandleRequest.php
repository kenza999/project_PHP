<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Proposals;
use Model\Repository\ProposalsRepository;

class ProposalsHandleRequest extends BaseHandleRequest
{
    private $proposalsRepository;

    public function __construct()
    {
        $this->proposalsRepository  = new ProposalsRepository;
    }

    public function handleInsertForm(Proposals $proposal)
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
            if (empty($date)) {
                $errors[] = "La date ne peut pas être vide";
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
                $proposals->setMissionName($missionName);
                $proposals->setDescription($description);
                $proposals->setDate($date);
                $proposals->setBudget($budget);
                $proposals->setMissionDuration($missionDuration);
                $proposals->setMissionStart($missionStart);
                $proposals->setMissionEnd($missionEnd);
                $proposals->setLocation($location);
                $proposals->setSkillsRequired($skillsRequired);
                
                // Insérer la proposition dans la base de données
                $this->proposalsRepository->addProposals($proposals);
    
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
                $errors[] = "Le nom ne peut pas être vide";
            }
            if (strlen($missionName) < 4) {
                $errors[] = "Le nom doit avoir au moins 4 caractères";
            }
            if (strlen($missionName) > 20) {
                $errors[] = "Le nom ne peut avoir plus de 20 caractères";
            }
    
            if (!strpos($reference, " ") === false) {
                $errors[] = "Les espaces ne sont pas autorisés pour la référence";
            }
    
            if (!(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK)) {
                $errors[] = "Veuillez sélectionner une image à télécharger pour continuer.";
            }
            // Vérification si la référence existe déjà
            $productExists = $this->productRepository->findByAttributes($product, ['reference' =>$reference]);
            
            if ($productExists) {
                $errors[] = "La référence existe déjà, veuillez en choisir une nouvelle";
            }
            if (!is_numeric($price)) {
                $errors[] = "Le prix doit avoir une valeur numérique";
            }
            if (empty($price)) {                
                $errors[] = "Le prix ne peut pas être vide";
            }
            if (!is_numeric($stock)) {
                $errors[] = "Le stock doit avoir une valeur numérique";
            }
            if (empty($stock)) {                
                $errors[] = "Le stock ne peut pas être vide";
            }
            if (empty($cat_id)) {
                $errors[] = "La catégorie ne peut pas être vide";
            }
            if (empty($errors)) {
                $proposals->setMissionName($missionName);
                $proposals->setDescription($description);
                $proposals->setDate($date);
                $proposals->setBudget($budget);
                $proposals->setMissionDuration($missionDuration);
                $proposals->setMissionStart($missionStart);
                $proposals->setMissionEnd($missionEnd);
                $proposals->setLocation($location);
                $proposals->setSkillsRequired($skillsRequired);
                
                // Insérer la proposition dans la base de données
                $this->proposalsRepository->addProposal($proposals);
    
                return $this;
            }
    
            $this->setErrorsForm($errors);
            return $this;
        }
    }
    
}