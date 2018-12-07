<?php

namespace POE\database;

class Connexion
{
    protected $connexion;

    public function __construct()
    {
        $user = "root";
        $pass = "dawan";
        $this->connexion = new \PDO('mysql:host=localhost;dbname=dungeon', $user, $pass);
        $this->connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getDb(): \PDO
    {
        return $this->connexion;
    }
}