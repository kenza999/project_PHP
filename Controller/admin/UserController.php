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

    public function delete($id)
    {
        if (!empty($id) && $id && $this->getUser()) {
            if (is_numeric($id)) {

                $user = $this->user;
            } else {
                $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
            }
        } else {
            $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
        }

        $this->render("user/form.html.php", [
            "h1" => "Suppresion de l'user n°$id ?",
            "user" => $user,
            "mode" => "suppression"
        ]);
    }
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