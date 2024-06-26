<?php

namespace Controller;

use Model\Entity\Users;
use Model\Repository\UserRepository;
use Form\UserHandleRequest;
use Service\ImageHandler;
use Controller\BaseController;
use Model\Entity\Competences;
use Model\Repository\CompetencesRepository;
use Model\Repository\CompetenceFreelanceRepository;
use Model\Entity\CompetenceFreelance;


class AccueilController extends BaseController{

    private UserRepository $userRepository;
    private UserHandleRequest $registrationForm;
    private Users $user;
    private Competences $competences;
    private CompetencesRepository $competencesRepository;
    private CompetenceFreelance $competenceFreelance;
    private CompetenceFreelanceRepository $competenceFreelanceRepository;

    public function __construct()
    {
        $this->user = new Users();
        $this->userRepository = new UserRepository();
        $this->registrationForm = new UserHandleRequest();
        $this->competences = new Competences();
        $this->competencesRepository = new CompetencesRepository();
        $this->competenceFreelance = new CompetenceFreelance();
        $this->competenceFreelanceRepository = new CompetenceFreelanceRepository();
    }
    public function list()
    {
        $competences = new competences;
        $listeCompetences = $this->competencesRepository->findAll($competences);
        // Vérifier si l'utilisateur est déjà connecté
         if ($this->isUserConnected()) {
             /**
              * @var Users
              */
             $user = $this->getUser();

             $this->setMessage("erreur",  $user->getNom() . " , vous êtes déjà connecté");
             return redirection(addLink("User", "list"));
         }

        // Gérer la soumission du formulaire de connexion
         if ($this->registrationForm->handleLogin()) {

        // Vérifier si le formulaire de connexion a été soumis et est valide
         if ($this->registrationForm->isSubmitted() && $this->registrationForm->isValid()) {
             /**
              * @var Users
              */
             $user = $this->getUser();
             $this->setMessage("success", "Bonjour " . $user->getNom() . ", vous êtes connecté");

            //  Rediriger l'utilisateur vers le tableau de bord après la connexion réussie
             return redirection(addLink("User", "list")); // Assurez-vous que addLink("dashboard") renvoie l'URL de votre page de tableau de bord
         }}else{
            $user = $this->user;

            $this->registrationForm->handleInsertForm($user, $this->competenceFreelance);
    
            if ($this->registrationForm->isSubmitted() && $this->registrationForm->isValid()) {
                ImageHandler::handelPhoto($user);

                $iDuser = $this->userRepository->insertUser($user);
                $this->competenceFreelanceRepository->insertCompetenceFreelance($this->competenceFreelance, $iDuser);
                return redirection(addLink("Accueil"));
            }
         }
       
        // Récupérer les erreurs du formulaire s'il y en a
        $errors = $this->registrationForm->getErrorsForm();

        
        return $this->render("Accueil.html.php", [

        // Afficher le formulaire de connexion avec les erreurs
            "h1" => "Entrez vos identifiants de connexion",
            "errors" => $errors,
            "listeCompetences"=>$listeCompetences
        ]);
    }
    public function index()
    {
        // Vérifie si un utilisateur est déjà connecté
        if ($this->isUserConnected()) {
            $user = $this->getUser();
            $this->setMessage("erreur", $user->getNom() . " , vous êtes déjà connecté");
            return $this->redirect($this->addLink("User", "list"));
        }

        // Soumission du formulaire de connexion
        if ($this->registrationForm->handleLogin()) {
            if ($this->registrationForm->isSubmitted() && $this->registrationForm->isValid()) {
                $user = $this->getUser();
                $this->setMessage("success", "Bonjour " . $user->getNom() . ", vous êtes connecté");
                return $this->redirect($this->addLink("Accueil"));
            }
        } else {
            $user = new Users(); // Instancie un nouvel utilisateur
            $this->registrationForm->handleInsertForm($user);

            if ($this->registrationForm->isSubmitted() && $this->registrationForm->isValid()) {
                $this->userRepository->insertUser($user);
                $this->setMessage("success", "Inscription réussie. Vous pouvez maintenant vous connecter.");
                return $this->redirect($this->addLink("Accueil"));
            }
        }

        // Récupère les erreurs du formulaire s'il y en a
        $errors = $this->registrationForm->getErrorsForm();

        return $this->render("Accueil.html.php", [
            "h1" => "Entrez vos identifiants de connexion",
            "errors" => $errors,
            "listeCompetences" => $listeCompetences
        ]);
    }
}
