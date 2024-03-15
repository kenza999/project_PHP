<?php

namespace Controller\Admin;

use Model\Entity\Users;
use Model\Repository\UserRepository;
use Form\UserHandleRequest;
use Controller\BaseController;

class UserController extends BaseController{

    private $userRepository;
    private $form;
    private $user;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->form = new UserHandleRequest;
        $this->user = new Users;
    }

    public function dashboard_admin()
    {
    // Vérifier si l'utilisateur est connecté
if ($this->isUserConnected()) {
    switch ($this->getUser()->getRole()) {
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
    
    public function list()
     {
         $users = $this->userRepository->findAll($this->user);

          $this->render("admin/index.html.php", [
              "h1" => "Liste des utilisateurs",
             "users" => $users
         ]);
    }
    // affiche un utilisateur selon son id
    public function new()
    {
        $user = $this->user;
        $this->form->handleInsertForm($user);

        if ($this->form->isSubmitted() && $this->form->isValid()) {
            $this->userRepository->insertUser($user);
            return redirection(addLink("login"));
        }

        $errors = $this->form->getErrorsForm();

        return $this->render("user/form.html.php", [
            "h1" => "Ajouter un nouvel utilisateur",
            "user" => $user,
            "errors" => $errors
        ]);
    }
    public function checkUser() {
        $user = $this->userRepository->getUserVerification();
        $this->render("admin/verificationUser.html.php", [
            "h1" => "Verification de l'utilisateur",
            "user" => $user
        ]);
    }

    public function edit($id)
    {
        if (!empty($id) && is_numeric($id) && $this->getUser()) {

            $user = $this->getUser();

            $this->form->handleForm($user);

            if ($this->form->isSubmitted() && $this->form->isValid()) {
                $this->userRepository->updateUser($user);
                return redirection(addLink("home"));
            }

            $errors = $this->form->getErrorsForm();
            return $this->render("user/form.html.php", [
                "h1" => "Update de l'utilisateur n° $id",
                "user" => $user,
                "errors" => $errors
            ]);
        }
        return redirection("/errors/404.php");
    }

    public function isAdmin($id)
{
    // Vérifier si l'utilisateur connecté a le droit de supprimer un utilisateur
    if ($this->getAdmin()) {
        // Supprimer l'utilisateur de la base de données
        if (!empty($id) && is_numeric($id)) {
            if ($this->userRepository->setIsDeletedTrueById("users")) {
                $this->setMessage("success", "L'utilisateur a été supprimé avec succès.");
            } else {
                $this->setMessage("danger", "Une erreur s'est produite lors de la suppression de l'utilisateur.");
            }
        } else {
            $this->setMessage("danger", "L'utilisateur à supprimer n'a pas été trouvé.");
        }
    } else {
        $this->setMessage("danger", "Vous n'avez pas les autorisations nécessaires pour supprimer un utilisateur.");
    }

    // Rediriger vers la liste des utilisateurs après la suppression
    return redirection(addLink("admin", "user", "verificationUser"));
}

    // public function delete($id)
    // {
    //         // Vérifier si l'utilisateur connecté a le droit de supprimer un utilisateur
    // if ($this->isAdmin()) {
    //     // Supprimer l'utilisateur de la base de données
    //     if (!empty($id) && is_numeric($id)) {
    //         if ($this->userRepository->deleteUser($id)) {
    //             $this->setMessage("success", "L'utilisateur a été supprimé avec succès.");
    //         } else {
    //             $this->setMessage("danger", "Une erreur s'est produite lors de la suppression de l'utilisateur.");
    //         }
    //     } else {
    //         $this->setMessage("danger", "L'utilisateur à supprimer n'a pas été trouvé.");
    //     }
    // } else {
    //     $this->setMessage("danger", "Vous n'avez pas les autorisations nécessaires pour supprimer un utilisateur.");
    // }
    //     $this->render("registration_form.html.php", [
    //         "h1" => "Suppresion de l'user n°$id ?",
    //         "user" => $user,
    //         "mode" => "suppression"
    //     ]);
    // }


    public function show($id)
    {
        if ($id) {
            if (is_numeric($id)) {
                $user = new UserRepository;
                $userfind = $user->findById("users", $id);
    
                if (empty($userfind)) {
                    $this->setMessage("danger",  "Erreur : Ce User n'existe pas");
                }
    
                $this->render("admin/afficheUser.html.php", [
                    "userfind" => $userfind, // Utilisez le nom correct de la variable
                    "h1" => "Fiche user"
                ]);
                
            }
        }
    }
}