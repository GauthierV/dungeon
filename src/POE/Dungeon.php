<?php

namespace POE;

use POE\database\CharacterLoader;
use POE\database\Connexion;
use POE\fight\Combat;

class Dungeon
{

    public function  fight(){
        $loader = new CharacterLoader(new Connexion());
        $char1 = $loader->load("Toto");
        $char2 = $loader->load("Jean-Mich");
        $combat = new Combat($char1, $char2);
        echo $combat->fight();
    }

    public function reportSituation($name)
    {
        $loader = new CharacterLoader(new Connexion());
        $character = $loader->load($name);
        $report = $character->move(0, 2);

        ob_start();
        include __DIR__ . "/../../template/reportSituation.html.php";
        include __DIR__ . "/../../template/map.html.php";
        $output = ob_get_clean();
        return $output;
    }

    public function createChar()
    {
        ob_start();
        include __DIR__ . "/../../template/createChar.html";
        $output = ob_get_clean();
        return $output;
    }

    public function listePerso($list)
    {
        $listPerso = $list;
        ob_start();
        include __DIR__ . "/../../template/listePerso.html.php";
        $output = ob_get_clean();
        return $output;
    }
}