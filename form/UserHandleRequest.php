<?php
namespace Form;

use Service\Session as Sess;
use Model\Entity\Users;
use Model\Entity\CompetenceFreelance;
use Model\Repository\UserRepository;

class UserHandleRequest extends BaseHandleRequest
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository  = new UserRepository;
    }

    public function handleInsertForm(Users $user, CompetenceFreelance $freelance)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            extract($_POST);
            $errors = [];

            // Vérification de la validité du formulaire
            if (empty($username)) {
                $errors[] = "Le pseudo ne peut pas être vide";
            }
            if (strlen($username) < 4) {
                $errors[] = "Le pseudo doit avoir au moins 4 caractères";
            }
            if (strlen($username) > 20) {
                $errors[] = "Le pseudo ne peut avoir plus de 20 caractères";
            }

            if (!strpos($username, " ") === false) {
                $errors[] = "Les espaces ne sont pas autorisés pour le pseudo";
            }

            // Est-ce que le username existe déjà dans la bdd ?
            $userExists = $this->userRepository->checkUserExist($username, $email);
            if ($userExists) {
                $errors[] = "Le pseudo ou l'email existe déjà, veuillez en choisir un nouveau";
            }

            if (!empty($nom)) {
                if (strlen($nom) < 2) {
                    $errors[] = "Le nom doit avoir au moins 2 caractères";
                }
                if (strlen($nom) > 30) {
                    $errors[] = "Le nom ne peut avoir plus de 30 caractères";
                }
            }
            if (!empty($prenom)) {
                if (strlen($prenom) < 2) {
                    $errors[] = "Le prénom doit avoir au moins 2 caractères";
                }
                if (strlen($prenom) > 30) {
                    $errors[] = "Le prénom ne peut avoir plus de 30 caractères";
                }
            }
            if (empty($password_hash)) {
                $errors[] = "Le mot de passe ne peut pas être vide";
            }

            if (empty($errors)) {
                $password_hash = password_hash($password_hash, PASSWORD_DEFAULT);
                $user->setUsername($username);
                $user->setNom($nom ?? null);
                $user->setEmail($email);
                $user->setPassword_hash($password_hash);                
                $user->setCarte_didentite($carte_didentite ?? null);
                $user->setDate_de_naissance($date_de_naissance ?? null);               
                $user->setNumero_siret($numero_siret ?? null);
                $user->setNumero_telephone($numero_telephone?? null);
                $user->setGenre($genre ?? null);
                $user->setPhoto($photo ?? null);
                $user->setDescription_dutilisateur($description_dutilisateur ?? null);
                $user->setNationalite($nationalite ?? null);
                $user->setVerificationUser($verificationUser = "En Attente");
                $user->setRole($role);
                $user->setVille($ville?? null);
                $user->setCode_postal($code_postal?? null);
                $user->setAdresse($adresse?? null);
                $user->setMetier($metier?? null);
                $freelance->setCompetenceID($competences);
                


                
                // if(isset($role)){

                // }
                
                return $this;
            }
            $this->setErrorsForm($errors);
            return $this;
        }
    }

     public function handleCheckFormVerificationUser($user)
     {
     
         // À compléter si nécessaire

     }

    public function handleLogin()
    {
        if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["login"])) {

            extract($_POST);
            $errors = [];
            if (empty($email) || empty($password_hash)) {
                $errors[] = "Veuillez insérer vos coordonnées";
            } else {
                /**
                 * @var Users
                 */
                $user = $this->userRepository->loginUser($email);
                if (empty($user)) {
                        $errors[] = "Il n'y a pas d'utilisateur avec cet email";
                } else {
                    if (!password_verify($password_hash, $user->getPassword_hash())) {
                        $errors[] = "Le mot de passe ne correspond pas";
                    }
                }
            }
            if (empty($errors)) {        
                Sess::authentication($user);
                return $this;
            }
            
            $this->setErrorsForm($errors);
            return $this;
        }
    }
    public function handleEditForm(Users $user){
        if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["Sauvegarde"])) {
            
            extract($_POST);
            $errors = [];
            if (empty($description_dutilisateur)){
                $errors[] = "Veuillez saisir une description de l'utilisateur";
            }if (empty($numero_telephone)){
                $errors[] = "Veuillez saisir un numéro de téléphone";
            }
            if(empty($errors)){
                $user->setDescription_dutilisateur($description_dutilisateur);
                $user->setNumero_telephone($numero_telephone);
               return $this;
            }
            $this->setErrorsForm($errors);
            return $this;
        }
    }
}
