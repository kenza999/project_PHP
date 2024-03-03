<?php

namespace Model;

class Database
{
    // connetion à la base de données
    private $host = "localhost";
    private $db_name = "portfolio_kenza";
    private $username = "root";
    private $password = "";
    private $connetion = null;

    // getter pour la connetion
    public function bddConnect()
    {
        try {
            $pdo = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->connetion = $pdo;

        } catch (\PDOException $exception) {
            echo "Erreur de connetion : " . $exception->getMessage();
        }

        return $this->connetion;
    }
}