<?php

/* ⚠ Il faut inclure le fichier autoload AVANT d'exécuter la fonction session_start() sinon il y aura
        une error si on essaye de stocker un objet dans la variable superglobale $_SESSION */
require "autoload.php";
session_start();
include __DIR__ . "/functions.inc.php";
define("ROOT", "/projet-freelance_tech/");
define("ROLE_USER", "ROLE_USER");
define("ROLE_ADMIN", "ROLE_ADMIN"); 
define("ROLE_ENTREPRISE", "ROLE_ENTREPRISE"); 
define("INSERTED", "Enregistrer"); 
define("UPDATED", "Modifier"); 
define("DELETED", "Spprimr"); 
define("UPLOAD_PRODUCTS_IMG", "uploads/Photo/");
define("EN_ATTENTE", "En Attente");
define("REFUSED", "Refusé");
define("ACCEPTED", "Accepté");
