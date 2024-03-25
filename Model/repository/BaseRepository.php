<?php

namespace Model\Repository;

use Model\Database;
use Model\Entity\BaseEntity;
use Service\Session as Sess;

class BaseRepository
{
        protected $dbConnection;

    public function __construct()
    {
        $db = new Database;
        $this->dbConnection = $db->bddConnect();
    }
    public function findAll(BaseEntity $table): ?array
    {
        $request = $this->dbConnection->query("SELECT * FROM $table WHERE is_deleted != 1");
        if ($request) {
            $class = "Model\Entity\\" . ucfirst($table);  // ucfirst : majuscule au début de la chaine de caractères
            return $request->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return null;
    }

    public function findById($tableName, $id)
    {
        // Construction de la requête SELECT
        $query = "SELECT * FROM $tableName WHERE id = :id";
        
        $request = $this->dbConnection->prepare($query);
        $request->bindValue(':id', $id);

        try {
            $request->execute();
            $class = "Model\Entity\\" . ucfirst($tableName);

            if ($request->rowCount() == 1) {
                $request->setFetchMode(\PDO::FETCH_CLASS, $class);
                
                return $request->fetch();
            } else if ($request->rowCount() > 1) {
                // ucfirst : majuscule au début de la chaine de caractères
                $result = $request->fetchAll(\PDO::FETCH_CLASS, $class);
                return $result;
            }
        } catch (\PDOException $exception) {
            echo "Erreur de connetion : " . $exception->getMessage();
        }
    }
    public function findByAttributes($tableName, $attributes = [])
    {
        if (!is_array($attributes)) {
            return false; // Retourne false si le tableau d'attributs est vide ou incorrect.
        }
        // Construction de la requête SELECT
        $query = "SELECT * FROM $tableName WHERE ";

        $conditions = [];
        $values = [];

        foreach ($attributes as $column => $value) {
            $conditions[] = "$column = :$column";
            $values[":$column"] = $value;
        }

        $query .= implode(' AND ', $conditions);
        $request = $this->dbConnection->prepare($query);

        foreach ($values as $key => $val) {
            $request->bindValue($key, $val);
        }

        try {
            $request->execute();
            $class = "Model\Entity\\" . ucfirst($tableName);

            if ($request->rowCount() == 1) {
                $request->setFetchMode(\PDO::FETCH_CLASS, $class);
                return $request->fetch();
            } else if ($request->rowCount() > 1) {
                // ucfirst : majuscule au début de la chaine de caractères
                $result = $request->fetchAll(\PDO::FETCH_CLASS, $class);
                return $result;
            }
        } catch (\PDOException $exception) {
            echo "Erreur de connetion : " . $exception->getMessage();
        }
    }

    public function setIsDeletedTrueById(BaseEntity $tableName)
    {
        $tableName->setIsDeleted(true);
        $tableNameString = (string) $tableName;
        $sql = "UPDATE $tableNameString 
                SET is_deleted = :isDeleted WHERE id = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $tableName->getId());
        $request->bindValue(":isDeleted", $tableName->getIsDeleted());
        $request = $request->execute();
        var_dump($request);
        if ($request) {
            if ($request == 1) {
                 Sess::addMessage("success",  "La mise à jour de l'utilisateur a bien été éffectuée");
                return true;
            }
                 
            Sess::addMessage("danger",  "Erreur : l'utilisateur n'a pas été mise à jour");
            return false;
        }
        Sess::addMessage("danger",  "Erreur SQL");
        return null;

    }
    public function remove(BaseEntity $tableName)
    {
        $sql = "DELETE FROM $tableName WHERE id = :id";
        $request = $this->dbConnection->prepare($sql);
        $request->bindValue(":id", $tableName->getId());
        $request = $request->execute();
        if ($request) {
            if ($request == 1) {
                Sess::addMessage("success",  "La mise à jour de l'utilisateur a bien été éffectuée");
                return true;
            }
            Sess::addMessage("danger",  "Erreur : l'utilisateur n'a pas été mise à jour");
            return false;
        }
        Sess::addMessage("danger",  "Erreur SQL");
        return null;
    }
}