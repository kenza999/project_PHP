<?php

namespace Model\Entity;

abstract class BaseEntity
{
       protected $id;
       protected $created_at;
       protected $updated_at;
       protected $is_deleted;


    public function __toString()
    {
        // retourne le nom de la classe à partir de son namespase 
        // exemple : Model\Entity\Product
        $class = get_called_class();

        // Découpe une chaine de caractèrs dès qu'il rencotre un caractère spécifique ici c'est le "\"
        // Elle retourne ensuite un tableau indexé contenant les élément dans la chaine de caractères
        // Exemple : 
        // ["Model","Entity","Product"]

        $class = explode("\\", $class);
        $table = $class[count($class) - 1];
        // strtolower = met tous les caractères d'un string en minuscule
        return strToLower($table);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get the value of is_deleted
     */ 
    public function getIsDeleted()
    {
        return $this->is_deleted;
    }

    /**
     * Set the value of is_deleted
     *
     * @return  self
     */ 
    public function setIsDeleted($isDeleted)
    {
        $this->is_deleted = $isDeleted;

        return $this;
    }

}



// En résumé, cette classe fournit une structure de base pour les entités de votre modèle de données, en définissant les propriétés et les méthodes communes que chaque entité peut avoir. Les classes d'entités spécifiques peuvent étendre cette classe et ajouter leurs propres propriétés et méthodes spécifiques à leur contexte d'application.