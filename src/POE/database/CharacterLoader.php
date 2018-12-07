<?php

namespace POE\database;

class CharacterLoader
{
    private $connexion;

    public function __construct(Connexion $connect)
    {
        $this->connexion = $connect->getDb();
    }

    public function load($name){



        $statement = $this->connexion->prepare("SELECT * FROM characters WHERE name = :name");

        $statement->setFetchMode(\PDO::FETCH_CLASS, Character::class);

        $statement->bindValue("name", $name);

        $statement->execute();

        $character = $statement->fetch();

        return $character;
//        $character = new Character("titi", "mage");
//        return $character;
    }
}