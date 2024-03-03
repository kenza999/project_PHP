<?php

namespace Controller;

use Model\Entity\Users;
use Model\Repository\UserRepository;
use Form\UserHandleRequest;
use Controller\BaseController;

class UserController extends BaseController
{
    private UserRepository $userRepository;
    private UserHandleRequest $registrationForm;
    private Users $user;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->registrationForm = new UserHandleRequest;
        $this->user = new Users;
    }
    public function list()
    {
    // Vérifier si l'utilisateur est connecté
if ($this->isUserConnected()) {
    switch ($this->getUser()->getRole()) {
        case ROLE_USER:
            // Afficher la vue du tableau de bord pour l'utilisateur
            $this->render("dashboard.html.php", [
                "h1" => "Tableau de bord"
            ]);
            break;
        case ROLE_ENTREPRISE:
            // Afficher la vue du tableau de bord pour l'entreprise
            $this->render("user/dashboard_client.html.php", [
                "h1" => "Tableau de bord"
            ]);
            break;
        case ROLE_ADMIN:
            // Afficher la vue du tableau de bord pour l'administrateur
            $this->render("admin/dashboard_admin.html.php", [
                "h1" => "Tableau de bord"
            ]);
            break;
        default:
            // Rediriger vers la page de connexion si le rôle n'est pas défini
            return redirection(addLink("user", "login"));
    }
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    return redirection(addLink("user", "login"));
}

    }

    public function showRegistrationForm()
    {
        $this->render("registration/form.html.php", [
            "h1" => "Inscription"
        ]);
    }

    public function register()
    {
        $user = $this->user;
        $this->registrationForm->handleInsertForm($user);

        if ($this->registrationForm->isSubmitted() && $this->registrationForm->isValid()) {
            $this->userRepository->insertUser($user);
            $this->setMessage("success", "Inscription réussie. Vous pouvez maintenant vous connecter.");
            return redirection(addLink("User", "login")); // Rediriger vers la page de connexion
        }

        $errors = $this->registrationForm->getErrorsForm();

        $this->render("registration_form.php", [
            "h1" => "Inscription",
            "user" => $user,
            "errors" => $errors
        ]);
    }
         public function show($id)
     {
         if ($id) {
             if (is_numeric($id)) {
                 $user = $this->user;
             } else {
                 $this->setMessage("danger",  "Erreur 404 : cette page n'existe pas");
             }
         } else {
             $this->setMessage("danger",  "Erreur 403 : vous n'avez pas accès à cet URL");
             redirection(addLink("user", "list"));
         }

         $this->render("user/afficheUser.html.php", [
             "user" => $user,
             "h1" => "Fiche user"
         ]);
     }

    public function login()
    {
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
        $this->registrationForm->handleLogin();

        // Vérifier si le formulaire de connexion a été soumis et est valide
        if ($this->registrationForm->isSubmitted() && $this->registrationForm->isValid()) {
            /**
             * @var Users
             */
            $user = $this->getUser();
            $this->setMessage("success", "Bonjour " . $user->getNom() . ", vous êtes connecté");

            // Rediriger l'utilisateur vers le tableau de bord après la connexion réussie
            return redirection(addLink("User", "list")); // Assurez-vous que addLink("dashboard") renvoie l'URL de votre page de tableau de bord
        }

        // Récupérer les erreurs du formulaire s'il y en a
        $errors = $this->registrationForm->getErrorsForm();

        // Afficher le formulaire de connexion avec les erreurs
        return $this->render("security/login.html.php", [
            "h1" => "Entrez vos identifiants de connexion",
            "errors" => $errors
        ]);
    }

    public function logout()
    {
        $this->disconnection();
        $this->setMessage("success", "Vous êtes déconnecté");
        return redirection(addLink("Accueil"));
    }
    
}


//     /**
//      * Summary of edit
//      * @param mixed $id
//      * @return void
//      */
//     public function edit($id)
//     {
//         if (!empty($id) && is_numeric($id) && $this->getUser()) {

//             /**
//              * @var User
//              */
//             $user = $this->getUser();

//             $this->form->handleEditForm($user);

//             if ($this->form->isSubmitted() && $this->form->isValid()) {
//                 $this->userRepository->updateUser($user);
//                 return redirection(addLink("home"));
//             }

//             $errors = $this->form->getEerrorsForm();
//             return $this->render("user/form.html.php", [
//                 "h1" => "Update de l'utilisateur n° $id",
//                 "user" => $user,
//                 "errors" => $errors
//             ]);
//         }
//         return redirection("/errors/404.php");
//     }

//     public function delete($id)
//     {
//         if (!empty($id) && $id && $this->getUser()) {
//             if (is_numeric($id)) {

//                 $user = $this->user;
//             } else {
//                 $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
//             }
//         } else {
//             $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
//         }

//         $this->render("user/form.html.php", [
//             "h1" => "Suppresion de l'user n°$id ?",
//             "user" => $user,
//             "mode" => "suppression"
//         ]);
//     }

//     public function show($id)
//     {
//         if ($id) {
//             if (is_numeric($id)) {
//                 $user = $this->user;
//             } else {
//                 $this->setMessage("danger",  "Erreur 404 : cette page n'existe pas");
//             }
//         } else {
//             $this->setMessage("danger",  "Erreur 403 : vous n'avez pas accès à cet URL");
//             redirection(addLink("user", "list"));
//         }

//         $this->render("user/show.html.php", [
//             "user" => $user,
//             "h1" => "Fiche user"
//         ]);
//     }

//     public function login()
//     {
        
//         if ($this->isUserConnected()) {            
//             /**
//              * @var User
//              */
//             $user = $this->getUser();

//                 $this->setMessage("erreur",  $user->getnom() . " , vous êtes déjà connecté");
//             return redirection(addLink("home"));
//         }

//         $this->form->handleLogin();
        
//         if ($this->form->isSubmitted() && $this->form->isValid()) {
//             /**
//              * @var User
//              */
//             $user = $this->getUser();
//             $this->setMessage("succes", "Bonjour " . $user->getnom() .", vous êtes connecté");
//             redirection(addLink("home"));
//             return redirection(addLink("home"));
//         }

//         $errors = $this->form->getEerrorsForm();

//         return $this->render("security/login.html.php", [
//             "h1" => "Entrez vos identifiants de connexion",
//             "errors" => $errors
            
//         ]);
//     }

//     public function logout()
//     {
//         $this->disconnection();
//         $this->setMessage("success", "Vous êtes déconnecté");
//         redirection(addLink("home"));
//     }
// }