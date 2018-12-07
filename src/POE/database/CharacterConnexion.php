<?php
/**
 * Created by PhpStorm.
 * User: stagiaire
 * Date: 07/12/18
 * Time: 16:05
 */

namespace POE\database;


class CharacterConnexion
{
    protected $connexion;

    public function __construct(Connexion $connect)
    {
        $this->connexion = $connect->getDb();
    }
}