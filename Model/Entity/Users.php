<?php

namespace Model\Entity;

class Users extends BaseEntity
{   
   
    private $username;    
    private $nom;
    private $email;
    private $numero_telephone;
    private $password_hash;
    private $date_de_naissance;
    private $genre;
    private $photo;
    private $description_dutilisateur;
    private $nationalite;
    private $verificationUser;
    private $carte_didentite;
    private $role;
    private $numero_siret;
    private $ville;
    private $code_postal;
    private $adresse;
    private $metier;
    
   
    


    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }


    /**
     * Get the value of password_hash
     */ 
    public function getPassword_hash()
    {
        return $this->password_hash;
    }

    /**
     * Set the value of password_hash
     *
     * @return  self
     */ 
    public function setPassword_hash($password_hash)
    {
        $this->password_hash = $password_hash;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of date_de_naissance
     */ 
    public function getDate_de_naissance()
    {
        return $this->date_de_naissance;
    }

    /**
     * Set the value of date_de_naissance
     *
     * @return  self
     */ 
    public function setDate_de_naissance($date_de_naissance)
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of description_dutilisateur
     */ 
    public function getDescription_dutilisateur()
    {
        return $this->description_dutilisateur;
    }

    /**
     * Set the value of description_dutilisateur
     *
     * @return  self
     */ 
    public function setDescription_dutilisateur($description_dutilisateur)
    {
        $this->description_dutilisateur = $description_dutilisateur;

        return $this;
    }

    /**
     * Get the value of nationalite
     */ 
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set the value of nationalite
     *
     * @return  self
     */ 
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get the value of verificationUser
     */ 
    public function getVerificationUser()
    {
        return $this->verificationUser;
    }

    /**
     * Set the value of verificationUser
     *
     * @return  self
     */ 
    public function setVerificationUser($verificationUser)
    {
        $this->verificationUser = $verificationUser !== null ? $verificationUser : EN_ATTENTE;

        return $this;
    }

    /**
     * Get the value of carte_didentite
     */ 
    public function getCarte_didentite()
    {
        return $this->carte_didentite;
    }

    /**
     * Set the value of carte_didentite
     *
     * @return  self
     */ 
    public function setCarte_didentite($carte_didentite)
    {
        $this->carte_didentite = $carte_didentite;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 

    public function setRole($role)
    {
        $this->role = $role !== null ? $role : ROLE_USER;

        return $this;
    }


    /**
     * Get the value of numero_siret
     */ 
    public function getNumero_siret()
    {
        return $this->numero_siret;
    }

    /**
     * Set the value of numero_siret
     *
     * @return  self
     */ 
    public function setNumero_siret($numero_siret)
    {
        $this->numero_siret = $numero_siret;

        return $this;
    }

    /**
     * Get the value of numero_telephone
     */ 
    public function getNumero_telephone()
    {
        return $this->numero_telephone;
    }

    /**
     * Set the value of numero_telephone
     *
     * @return  self
     */ 
    public function setNumero_telephone($numero_telephone)
    {
        $this->numero_telephone = $numero_telephone;

        return $this;
    }

    /**
     * Get the value of is_deleted
     */ 
    public function getIs_deleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set the value of is_deleted
     *
     * @return  self
     */ 
    public function setIs_deleted($is_deleted)
    {
        $this->is_deleted = $is_deleted;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of code_postal
     */ 
    public function getCode_postal()
    {
        return $this->code_postal;
    }

    /**
     * Set the value of code_postal
     *
     * @return  self
     */ 
    public function setCode_postal($code_postal)
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    /**
     * Get the value of ville
     */ 
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @return  self
     */ 
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of metier
     */ 
    public function getMetier()
    {
        return $this->metier;
    }

    /**
     * Set the value of metier
     *
     * @return  self
     */ 
    public function setMetier($metier)
    {
        $this->metier = $metier;

        return $this;
    }


    /**
     * Get the value of NbUsers
     */ 
   
}
