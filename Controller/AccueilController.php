<?php
namespace Controller;

use Controller\BaseController;

class AccueilController extends BaseController{
    public function list()
    {
        $this->render("Accueil.html.php", ["h1" => "Accueil"]);
    }
}