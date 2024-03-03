<?php

/**
La fonction 'chargeClass' sera donc appelé quand une class sera requise.
L'argument sera le nom de la class requise.

 */
function chargeClass($className)
{
    // On remplace les \ qui sont dans le nom de la class à charger par des / qui est le séparateur de dossier
    // utilisé dans la plupart des systèmes d'exploitation
    // ⚠ RAPPEL : dans les namespaces, on ne peut utiliser que les \

    $filePath = str_replace("\\", "/", $className);
    $newClassName = str_replace("Controller/", "", $filePath);
    
    $root = __DIR__ . "/../" . $filePath . ".php";
    // d_die($className." ok");
    // if (!file_exists($root)) {
    //     $root = __DIR__ . "/../controller/admin/" . $filePath . ".php";
    // }
    if (file_exists($root)) {
        require $root;
    } else {
        throw new Exception("La class $className n'a pas été trouvée.");
    }
}

/** 
La fonction spl_autoload_register permet de définir la fonction qui sera 
exécutée à chaque fois qu'une class sera requise par le code (par exemple,
quand on utilise le mot-clé 'new' pour instancier un objet)
 */
spl_autoload_register("chargeClass");