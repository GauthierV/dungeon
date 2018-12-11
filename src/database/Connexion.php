<?php

namespace POE\database;

class Connexion
{
    protected $connexion;

    private static $instance;

    private function __construct()
    {
        $user = "root";
        $pass = "dawan";
        $this->connexion = new \PDO('mysql:host=localhost;dbname=dungeon', $user, $pass);
        $this->connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): self
    {
        if (!self::$instance instanceof self){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getDb(): \PDO{
        return $this->connexion;
    }
}