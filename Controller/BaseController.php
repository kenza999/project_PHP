<?php

namespace Controller;

use Service\Session as Sess;


abstract class BaseController
{
    public function render($fichier, array $parametres = [])
    {
        extract($parametres);

        include "public/header.html.php";
        include "views/$fichier";
        include "public/footer.html.php";
    }
    public function renderAdminTemplate($fichier, array $parametres = [])
    {
        extract($parametres);

        include "public/headerAdmin.html.php";
        include "views/$fichier";
        include "public/footer.html.php";
        include "public/navAdmin.html.php";
    }

    public function getUser()
    {
        $user = Sess::getUserConnected();

        // il faut vérifier si id utilisateur de url est bien le même id que l'utilsateur connecté

        if (!$user) {
            redirection("/errors/403.php");
        }
        return $user;
    }

    public function isUserConnected()
    {
        return Sess::isConnected();
    }

    public function getAdmin()
    {
        $user = Sess::isAdmin();

        if (!$user) {
            redirection("/errors/403.php");
        }
        return $user;
    }
    // public function getUser()
    // {
    //     $user = Sess::isUser();

    //     if (!$user) {
    //         redirection("/errors/403.php");
    //     }
    //     return $user;
    // }
    public function getEntreprise()
    {
        $user = Sess::isEntreprise();

        if (!$user) {
            // redirection("/errors/403.php");
        }
        return $user;
    }
    

    /**
     * Summary of setMessage
     *
     * @param  mixed $type
     * @param  mixed $message
     * @return void
     */
    public function setMessage($type, $message)
    {
        Sess::addMessage($type, $message);
    }

    public function disconnection()
    {
        Sess::disconnected();
    }
    public function remove($value)
    {
        Sess::delete($value);
    }

    public function redirectToRoute(array $linkInfo){
        $controller = $linkInfo[0];
        $method = $linkInfo[1]?? null;
        $id = $linkInfo[2]?? null;
        redirection(addLink($controller, $method, $id));
    }
}