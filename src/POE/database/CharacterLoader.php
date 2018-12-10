<?php

namespace POE\database;

class CharacterLoader
{

    public function load($name){

        $connexion = Connexion::getInstance()->getDb();

        $statement = $connexion->prepare("SELECT * FROM characters WHERE name = :name");

        $statement->setFetchMode(\PDO::FETCH_CLASS, Character::class);

        $statement->bindValue("name", $name);

        $statement->execute();

        $character = $statement->fetch();

        return $character;
    }
}