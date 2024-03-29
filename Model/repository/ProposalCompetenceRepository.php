<?php

namespace Model\Repository;

use Model\Entity\Competences;
use Model\Entity\ProposalCompetence;
use Service\Session;

class ProposalCompetenceRepository extends BaseRepository
{
    public function insertProposalCompetence( $idProposal, $idCompetence){
        $ProposalCompetence = new ProposalCompetence;

        $ProposalCompetence->setIdProposal($idProposal)
                           ->setIdCompetence($idCompetence);
        try{
            $sql = "INSERT INTO 'proposalcompetence' (idCompetence, idProposal, created_at) VALUES (:idCompetence, :idProposal, NOW())";

            $request = $this->dbConnection->prepare($sql);

            $request->bindValue(":idCompetence", $idCompetence);
            $request->bindValue(":idProposal", $idProposal);

            $request = $request->execute();

        }catch (\PDOException $e) {
       // En cas d'erreur, annulez

       $this->dbConnection->rollBack();
       echo "Erreur : " . $e->getMessage();
   }
    }

}