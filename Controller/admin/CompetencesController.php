<?php

namespace Controller\Admin;

use Model\Entity\Competences;
use Model\Repository\CompetencesRepository;
use Form\CompetencesHandleRequest;
use Controller\BaseController;

class CompetencesController extends BaseController{
    
    private CompetencesRepository $competencesRepository;
    private CompetencesHandleRequest $form;
    private Competences $competences;

    public function __construct(){
        $this->competences = new Competences();
        $this->competencesRepository = new CompetencesRepository();
        $this->form = new CompetencesHandleRequest();
    }
    public function addCompetences(){
        $competences = new competences;
      $this->form->handleInsertForm($competences);
      if($this->form->isSubmitted() && $this->form->isValid()) {
    $this->competencesRepository->addCompetences($competences); 
    }
    $errors = $this->form->getErrorsForm();
    return $this->renderAdminTemplate("admin/Competences/form.html.php", [
        "h1" => "Ajouter une nouvelle competence",
        "competences" => $competences,
        "errors" => $errors
        ]);
    }
    public function findAll(){

        $competences = new competences;
        $listeCompetences = $this->competencesRepository->findAll($competences);

        return $this->renderAdminTemplate("admin/Competences/index.html.php", [
            "h1" => "Liste des competences",
            "listeCompetences" => $listeCompetences
        ]);
    }
    public function delete($id)
    {
        if (!empty($id)){
            if (is_numeric($id)) {

                $competences = $this->competencesRepository->findById("competences",$id);
                if(!empty($competences)) {
                   $this->competencesRepository->remove($competences); 
                   return redirection(addLink("admin","Competences", "findAll"));

                   $this->setMessage("success", "La competence a été supprimée avec succès.");
            } else {
                $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
            }
        } else {
            $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
        }

        $this->renderAdminTemplate("admin/Competences/index.html.php", [
            "h1" => "Suppresion de la competence n°$id ?",
            "Competences" => $competences,
            "mode" => "suppression"
        ]);
    }
   }
   
}