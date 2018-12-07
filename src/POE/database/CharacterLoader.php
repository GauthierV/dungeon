<?php

namespace POE\database;

class CharacterLoader extends CharacterConnexion
{

    public function load($name){

        $statement = $this->connexion->prepare("SELECT * FROM characters WHERE name = :name");

        $statement->setFetchMode(\PDO::FETCH_CLASS, Character::class);

        $statement->bindValue("name", $name);

        $statement->execute();

        $character = $statement->fetch();

        return $character;
    }
}