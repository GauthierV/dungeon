<?php

namespace POE\database;

class Connexion
{
    private $dbh;

    public function __construct()
    {
        $user = "root";
        $pass = "dawan";
        $this->dbh = new \PDO('mysql:host=localhost;dbname=dungeon', $user, $pass);
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getDb(): \PDO
    {
        return $this->dbh;
    }
}