<?php
namespace Controller\Admin;

use Controller\BaseController;
use Model\Repository\ProposalsRepository;
use Form\ProposalsHandleRequest;
use Model\Entity\Users;
use Model\Entity\ClientFreelanceRelations;
use Model\Entity\Proposals;
use Model\Entity\Competences;
use Model\Repository\CompetencesRepository;
use Model\Repository\ProposalCompetenceRepository;
use Model\Entity\ProposalCompetence;

class ProposalsController extends BaseController
{
    private ProposalsRepository $proposalsRepository;
    private ProposalsHandleRequest $form;
    private Users $user;
    private ClientFreelanceRelations $clientFreelanceRelations;
    private Proposals $proposals;
    private Competences $competences;
    private CompetencesRepository $competencesRepository;
    private ProposalCompetenceRepository $proposalCompetenceRepository;
    private ProposalCompetence $proposalcompetence;
  
    public function __construct()
    {
        $this->proposalsRepository = new ProposalsRepository;
        $this->form = new ProposalsHandleRequest;
        $this->user = new Users;
        $this->clientFreelanceRelations = new ClientFreelanceRelations;
        $this->proposals = new Proposals;
        $this->competences = new Competences;
        $this->competencesRepository = new CompetencesRepository;
        $this->proposalCompetenceRepository = new ProposalCompetenceRepository;
        $this->proposalcompetence = new ProposalCompetence;
    }
    public function listProposals()
    {
        $proposals = $this->proposalsRepository->findAll($this->proposals);
        
        $this->renderAdminTemplate("admin/Proposals/listProposals.html.php", [
            "h1" => "Liste des propositions",
            "proposals" => $proposals
        ]);
    }


    public function new()
    {
        // Votre code pour la création d'une nouvelle proposition
    }

    public function show($id)
    {
        if (!empty($id) && is_numeric($id)) {
            $proposalRepository = new ProposalsRepository(); // Correction ici
            $proposal = $proposalRepository->findById('proposals', $id);
            
            if (empty($proposal)) {
                $this->setMessage("danger", "La proposition #$id n'existe pas");
                redirection(addLink("Accueil"));
            }
            
            $this->render("admin/proposal/show.html.php", [
                "proposal" => $proposal,
                "h1" => "Fiche proposition"
            ]);
        } else {
            error("404.php");
        }
    }

    public function addProposals()
    {
        $competences = new competences;
        $listeCompetences = $this->competencesRepository->findAll($competences);
            $proposal = $this->proposals;
            
            $this->form->handleInsertForm($proposal , $this->proposalcompetence);

            if ($this->form->isSubmitted() && $this->form->isValid()) {

            $idProposal = $this->proposalsRepository->addProposal($proposal);
            $this->proposalCompetenceRepository->insertProposalCompetence($this->proposalcompetence,$idProposal);

            $this->setMessage("success", "Proposition ajoutée");
            return redirection(addLink("User"));


            }
                $errors = $this->form->getErrorsForm();
            

            $this->render("client\addProposals.html.php", [
                "h1" => "Ajouter une proposition",
                "proposal" => $proposal,
                "listeCompetences" => $listeCompetences,
                "errors" => $errors,
                "mode" => "insert"

            ]);
   
    }
    // MISE A JOUR PROPOSAL
    public function editProposal($id){
        if (!empty($id) && is_numeric($id)) {
            $proposal = $this->proposalsRepository->findById('proposals', $id);
            
            $this->form->handleEditForm($proposal);

            if ($this->form->isSubmitted() && $this->form->isValid()) {
                $this->proposalsRepository->updateProposal($proposal);
            }

            $errors = $this->form->getErrorsForm();

            $this->render("client\addProposals.html.php", [
                "h1" => "Update Proposal n° $id",
                "proposal" => $proposal,
                "errors" => $errors,
                "mode" => "update",
            ]);
            if (empty($proposal)) {
                $this->setMessage("danger", "La proposition #$id n'existe pas");
                redirection(addLink("Accueil"));
            }
        } else {
            error("404.php");
        }
    }
    // voir une proposition de mission 
    public function viewProposal($id){
        if (!empty($id) && is_numeric($id)) {
            $proposal = $this->proposalsRepository->findById('proposals', $id);
            
            if (empty($proposal)) {
                $this->setMessage("danger", "La proposition #$id n'existe pas");
                redirection(addLink("Accueil"));
            }
            
            $this->renderAdminTemplate("admin/Proposals/viewProposal.html.php", [
                "h1" => "Fiche proposition",
                "proposal" => $proposal
            ]);
        } else {
            error("404.php");
        }
    }
public function delete($id) {
    if (!empty($id) && is_numeric($id)) {
        $proposal = $this->proposalsRepository->findById('proposals', $id);

        if (empty($proposal)) {
            $this->setMessage("danger", "La proposition #$id n'existe pas");
            redirection(addLink("Accueil"));
        }

        $this->proposalsRepository->remove($proposal);

        $this->setMessage("success", "Proposition supprimée");
        return redirection(addLink("User"));
    } else {
        error("404.php");
    }
}
}


