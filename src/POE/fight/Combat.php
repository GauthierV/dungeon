<?php

namespace POE\fight;

use POE\database\Character;

class Combat
{

    private $attaquant;
    private $defender;
//
    public function __construct(Character $char1, Character $char2)
    {
        $this->attaquant = $char1;
        $this->defender = $char2;
    }

    public function fight(){
        $dmg = $this->attack();
        ob_start();
        include __DIR__ . "/../../../template/combat.html.php";
        $output = ob_get_clean();
        return $output;
    }

    public function attack(){
        $att = $this->attaquant->getAttack();
        $def = $this->defender->getDefense();
        $dice = new Dice();
        $dmg = $att * $dice->throwDice(2);
        return $dmg;
    }

}