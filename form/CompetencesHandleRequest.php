<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Competences;
use Model\Repository\CompetencesRepository;

class CompetencesHandleRequest extends BaseHandleRequest
{
    private CompetencesRepository $competencesRepository;

    public function __construct()
    {
        $this->competencesRepository  = new CompetencesRepository ;
    }

    public function handleInsertForm(Competences $competences)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            extract($_POST);
            $errors = [];

            $competenceExists = $this->competencesRepository->checkCompetenceExist($NomCompetence);

            if ($competenceExists){

                $errors[] = "Competence existe deja, veuillez en choisir une autre";
            }
            // Vérification de la validité du formulaire
            if (empty($NomCompetence)) {
                $errors[] = "La competence ne peut pas être vide";
            }
            if (empty($errors)) {

                $competences->setNomCompetence($NomCompetence);

                return $this;

            }
            $this->setErrorsForm($errors);

            return $this;

        }
    }
 }

        