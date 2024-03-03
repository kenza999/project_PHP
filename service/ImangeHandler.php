<?php

namespace Service;

use Service\Session as Sess;

class ImageHandler
{
    public static function handelPhoto($entity)
    {
        $fileType = ["jpg", "jpeg", "png", "gif", "svg", "webp"];
        // Emplacement où vous souhaitez enregistrer le fichier
        $target_dir = UPLOAD_PRODUCTS_IMG;
        // Construire un nom de fichier unique en ajoutant un horodatage au nom d'origine
        $originalFileName = basename($_FILES["photo"]["name"]);
        $timestamp = time(); // Utilisation de l'horodatage actuel
        $uniqueFileName = $timestamp . "_" . $originalFileName;
        $target_file = $target_dir . $uniqueFileName;
        // Obtenir le type de l'image
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image JPEG
        if (!in_array($imageFileType, $fileType)) {
            Sess::addMessage("errors", "Seules les images de types JPEG, png, gif et svg sont autorisées.");
        } else {
            // Vérifier la taille de l'image (par exemple, 1 Mo)
            if ($_FILES["photo"]["size"] > 1000000) {
                Sess::addMessage("errors", "L'image est trop volumineuse. La taille maximale autorisée est de 1 Mo.");
            } else {
                // Déplacer le fichier téléversé vers le répertoire cible
                move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                $entity->setPhoto($uniqueFileName);
                Sess::addMessage("succes", "L'image a été téléversée avec succès.");
            }
        }
    }
}