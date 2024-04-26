<?php

namespace Controller;

use Model\Entity\Users;
use Model\Repository\UserRepository;
use Form\UserHandleRequest;
use Controller\BaseController;

class UserController extends BaseController
{
    private UserRepository $userRepository;
    private UserHandleRequest $form;
    private Users $user;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->form = new UserHandleRequest;
        $this->user = new Users;
    }

     
    public function new()
    {
        $user = $this->user;
        $this->form->handleInsertForm($user);

        if ($this->form->isSubmitted() && $this->form->isValid()) {

            $this->userRepository->insertUser($user);
            return redirection(addLink("Accueil"));
        }

        $errors = $this->form->getErrorsForm();

        return $this->render("user/form.html.php", [
            "h1" => "Ajouter un nouvel utilisateur",
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
        $this->form->handleLogin();

        // Vérifier si le formulaire de connexion a été soumis et est valide
        if ($this->form->isSubmitted() && $this->form->isValid()) {
            /**
             * @var Users
             */
            $user = $this->getUser();
            $this->setMessage("success", "Bonjour " . $user->getNom() . ", vous êtes connecté");

            // Rediriger l'utilisateur vers le tableau de bord après la connexion réussie
            return redirection(addLink("User", "list")); // Assurez-vous que addLink("dashboard") renvoie l'URL de votre page de tableau de bord
        }

        // Récupérer les erreurs du formulaire s'il y en a
        $errors = $this->form->getErrorsForm();
        return $this->render("security/login.html.php", [

        // Afficher le formulaire de connexion avec les erreurs
            "h1" => "Entrez vos identifiants de connexion",
            "errors" => $errors
        ]);
    }
    public function delete($id)
     {
        //  commence par vérifier si l'id n'est pas vide et est numérique
         if (!empty($id) && $id && $this->getUser()) {
             if (is_numeric($id)) {

                 $user = $this->user; 
                 if(!empty($user)) {
                    $this->userRepository->setIsDeleteTrueById($user); 
             } else {
                 $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
             }
         } else {
             $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
         }

         $this->render("Accueil.html.php", [
             "h1" => "Suppresion de l'user n°$id ?",
             "user" => $user,
             "mode" => "suppression"
         ]);
     }
    }
 public function profile()
{
    
            if ($this->isUserConnected()) {

                $user = $this->getUser();
            if (empty($user)) {
                $this->setMessage("danger", "L'utilisateur n'existe pas");
                redirection(addLink("Accueil"));
            }
            $this->form->handleEditForm($user);

            if ($this->form->isSubmitted() && $this->form->isValid()) {
                $this->userRepository->updateUser($user);
                return redirection(addLink("Accueil"));
            }

      }
            $errors = $this->form->getErrorsForm();
            $this->render("profile.html.php", [
            "h1" => "Update de l'utilisateur ",
            "user" => $user,
            "h1" => "Fiche user"
     ]);
}

public function siret()
{
    
            if ($this->isUserConnected()) { 
                $user = $this->getUser();
             if (empty($user)) {
         $this->setMessage("danger", "L'utilisateur n'existe pas");
            redirection(addLink("Accueil"));
      }
      }
            $this->render("siret.html.php", [
            "user" => $user,
            "h1" => "Fiche user"
     ]);
}

public function factures(){

        if($this->isUserConnected()){
            $user = $this->getUser();
            if (empty($user)) {
                $this->setMessage("danger", "L'utilisateur n'existe pas");
                redirection(addLink("Accueil"));
        }
        }
            $this->render("freelance/factures.html.php", [
                "user" => $user,
                "h1" => "Fiche user"
        ]);  
}


public function logout()
    {
        $this->disconnection();
        $this->setMessage("success", "Vous êtes déconnecté");
        return redirection(addLink("Accueil"));
    }
}