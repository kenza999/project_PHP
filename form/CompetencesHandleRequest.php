<?php

namespace Form;

use Model\Entity\Competences;
use Model\Repository\CompetencesRepository;
use Service\Session;

class CompetencesHandleRequest
{
    private CompetencesRepository $competencesRepository;

    public function __construct()
    {
        $this->competencesRepository = new CompetencesRepository();
    }

    /**
     * Traite le formulaire d'ajout de compétences.
     * 
     * @param Competences $competences L'entité compétence à ajouter.
     * @return bool Retourne true si l'ajout a réussi, false sinon.
     */
    public function handleInsertForm(Competences $competences)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Assainissement des entrées
            // cette ligne de code récupère la valeur du champ NomCompetence du formulaire soumis via POST, nettoie la chaîne pour la sécurité en supprimant les balises et caractères spéciaux potentiellement dangereux, et stocke le résultat dans la variable $NomCompetence. C'est une pratique courante pour traiter de manière sécurisée les données des formulaires en PHP.
            $NomCompetence = filter_input(INPUT_POST, 'NomCompetence', FILTER_SANITIZE_STRING);

            // Initialisation du tableau d'erreurs
            $errors = [];

            // Vérification de l'existence de la compétence
            $competenceExists = $this->competencesRepository->checkCompetenceExist($NomCompetence);

            if ($competenceExists) {
                $errors[] = "Compétence existe déjà, veuillez en choisir une autre.";
            }

            // Vérification de la validité du nom de la compétence
            if (empty($NomCompetence)) {
                $errors[] = "Le nom de la compétence ne peut pas être vide.";
            }

            if (empty($errors)) {
                // Aucune erreur, on peut procéder à l'ajout
                $competences->setNomCompetence($NomCompetence);

                // Tentative d'ajout de la compétence
                if ($this->competencesRepository->addCompetences($competences)) {
                    Session::addMessage('success', 'La compétence a été ajoutée avec succès.');
                    return true;
                } else {
                    Session::addMessage('danger', 'Un problème est survenu lors de l\'ajout de la compétence.');
                    return false;
                }
            } else {
                // Des erreurs ont été trouvées, on les enregistre dans la session
                foreach ($errors as $error) {
                    Session::addMessage('danger', $error);
                }
                return false;
            }
        }
        // Si la méthode n'est pas POST, on ne fait rien
        return false;
    }
}
