<?php

namespace Service;

use Model\Repository\ProposalsRepository;
use Model\Entity\Proposals;
use Service\Session;

class MissionManager
{
    private ProposalsRepository $proposalsRepository;

    public function __construct()
    {
        $this->proposalsRepository = new ProposalsRepository;
    }
    public static function getMissions()
    {
        return $_SESSION["missions"] ?? [];
    }
    
    // Méthode pour ajouter une mission
    public function addMission($id) {
        // Récupérer la proposition de mission à partir de l'ID
        $proposal = $this->proposalsRepository->findById('proposal', $id);

        // Vérifier si la proposition de mission existe
        if ($proposal) {
            // Ajouter la proposition de mission au tableau de missions en session
            $missions = $_SESSION["missions"] ?? [];
            $missions[] = $proposal;
            $_SESSION["missions"] = $missions;
            
            return true;
        } else {
            // Retourner false si la proposition de mission n'existe pas
            return false;
        }
    }
}
