<?php
namespace Controller;

use Controller\BaseController;
use Model\Repository\ProposalsRepository;
use Form\ProposalsHandleRequest;
use Model\Entity\Users;
use Model\Entity\ClientFreelanceRelations;
use Model\Entity\Proposals;
use Model\Entity\Competences;
use Model\Repository\CompetencesRepository;
use Model\Repository\ProposalCompetenceRepository;

class ProposalController extends BaseController
{
    private ProposalsRepository $proposalsRepository;
    private ProposalsHandleRequest $form;
    private Users $user;
    private ClientFreelanceRelations $clientFreelanceRelations;
    private Proposals $proposals;
    private Competences $competences;
    private CompetencesRepository $competencesRepository;
    private ProposalCompetenceRepository $proposalCompetenceRepository;
  
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
    }

    public function listProposals()
    {
        $proposals = $this->proposalsRepository->getAllProposals(null, null);
        
        $this->render("listProposals.html.php", [
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
            
            $this->render("proposal/show.html.php", [
                "proposal" => $proposal,
                "h1" => "Fiche proposition"
            ]);
        } else {
            error("404.php");
        }
    }

    public function addProposals()
    {
            $proposal = $this->proposals;
            
            $this->form->handleInsertForm($proposal);

            if ($this->form->isSubmitted() && $this->form->isValid()) {

            $this->proposalsRepository->addProposal($proposal);
            $this->setMessage("success", "Proposition ajoutée");
            return redirection(addLink("User"));


            }
                $errors = $this->form->getErrorsForm();
            

            $this->render("client\addProposals.html.php", [
                "h1" => "Ajouter une proposition",
                "proposal" => $proposal,
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
}





// /**
//  * Summary of namespace Controller
//  */

// namespace Controller;


// use Controller\BaseController;
// use Model\Entity\Proposals;
// use Model\Entity\users;
// use Model\Entity\clientfreelancerelations;
// use Form\ProposalsHandleRequest;
// use Model\Repository\ProposalsRepository;
// use Model\Repository\UsersRepository;
// use Service\ImageHandler;

// /**
//  * Summary of ProductController
//  */

// class ProposalsController extends BaseController
// {
//     private ProposalsRepository $proposalsRepository;
//     private ProposalsHandleRequest $form;
//     private Proposals $proposals;
//     private Users $User;
//     private clientfreelancerelations $clientfreelancerelations;
//     // private UserRepository $UserRepository;
  
    
//     public function __construct()
//     {
//         $this->proposalsRepository = new ProposalsRepository;
//         $this->form = new ProposalsHandleRequest;
//         $this->proposals = new Proposals;
//         $this->User = new Users;
//         $this->clientfreelancerelations = new clientfreelancerelations;
//         // $this->UserRepository = new UserRepository;
//     }


//     public function listProposals()
//     {
//         // Traitement pour afficher la liste des propositions
//         $User = $this->User;
//         $client = $this->clientfreelancerelations;
//         $proposals = $this->proposalsRepository->getAllProposals();

//         $this->render("listProposals.html.php", [
//             "h1" => "Liste des propositions",
//             "proposals" => $proposals
//         ]);
//     }
//     public function new(){
        
//     }
//     public function show($id)
//     {
//         if (!empty($id) && is_numeric($id)) {
//             $proposalRepository = new ProposalRepository();
//             $proposal = $proposalRepository->findById('proposal', $id);
            
//             if (empty($proposal)) {
//                 $this->setMessage("danger", "La proposition #$id n'existe pas");
//                 redirection(addLink("Accueil"));
//             }
            
//             $this->render("proposal/show.html.php", [
//                 "proposal" => $proposal,
//                 "h1" => "Fiche proposition"
//             ]);
//         } else {
//             error("404.php");
//         }
//     }
// }


