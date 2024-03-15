<?php
/**
 * Summary of namespace Controller
 */
namespace Controller;

use Model\Entity\Proposals;
use Form\ProposalsHandleRequest;
use Model\Repository\ProposalsRepository;
use Service\CartManager;

/**
 * Summary of CartController
 */
class CartController extends BaseController
{
    private ProposalsRepository $proposalsRepository;
    private ProposalsHandleRequest $proposalsForm;
    private CartManager $cartManager;

    public function __construct()
    {
        $this->proposalsRepository = new ProposalsRepository;
        $this->proposalsForm = new ProposalsHandleRequest;
        $this->cartManager = new CartManager;
    }

    /**
     * Summary of addToCart
     * @param mixed $id
     * @return void
     */
    public function addToCart($id)
    {   
        $nb = $this->cartManager->addProposals($id);
        echo $nb;        
    }

    /**
     * Summary of addMission
     * @param mixed $id
     * @return void
     */
    public function addMission($id)
    {
        $mission = $this->proposalsRepository->findMissionById($id);
        if ($mission) {
            $this->cartManager->addMission($mission);
            $this->render("dashboard.html.php", [
                "missions" => $this->cartManager->getMissions(),
            ]);
        } else {
            // Gérer le cas où la mission n'existe pas
            echo "Mission not found";
        }
    }

    /**
     * Summary of show
     * @return void
     */
    public function show()
    {        
        $this->render("cart/show.html.php", [            
            "h1" => "Fiche cart"
        ]);        
    }

    /**
     * Summary of edit
     * @param mixed $id
     * @return void
     */
    public function edit($id)
    {
        
    }

    /**
     * Summary of delete
     * @param mixed $id
     * @return void
     */
    public function delete($id)
    {
        
    }
}
