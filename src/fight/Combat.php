<?php

namespace POE\fight;

use POE\database\Character;

class Combat
{

    private $perso1;
    private $perso2;
    private $position = 0;
    private $combatLog = [];

    public function __construct(Character $char1, Character $char2)
    {
        $this->perso1 = $char1;
        $this->perso2 = $char2;
    }

    public function fight()
    {
        $fightLog = new FightLog();
        $perso1Life = $this->perso1->getLifeCurrent();
        $perso2Life = $this->perso2->getLifeCurrent();
        $perso1Name = $this->perso1->getName();
        $perso2Name = $this->perso2->getName();
        $turn = 1;
        $nbTour = 1;
        while ($perso1Life > 0 && $perso2Life > 0) {
            if ($turn == 1) {
                $dmg = $this->attack(1);
                $perso2Life -= $dmg;
                $turn += 1;
                $report = "Tour " . $nbTour . ". " . $perso1Name . " attaque " . $perso2Name . " et lui inflige " . $dmg . " dégats. Il reste " . $perso2Life . " HP à " . $perso2Name . ".";
            } else {
                $dmg = $this->attack(2);
                $perso1Life -= $dmg;
                $turn -= 1;
                $report = "Tour " . $nbTour . ". " . $perso2Name . " attaque " . $perso1Name . " et lui inflige " . $dmg . " dégats. Il reste " . $perso1Life . " HP à " . $perso1Name . ".";
            }
            $fightLog->append($report);
            $nbTour += 1;
        }
        if ($turn == 2) {
            $report = $perso1Name . " a tué " . $perso2Name . ".";
            $fightLog->append($report);
        } else {
            $report = $perso2Name . " a tué " . $perso1Name . ".";
            $fightLog->append($report);
        }
        ob_start();
        include __DIR__ . "/../../template/combat.html.php";
        $output = ob_get_clean();
        return $output;
    }

    public function attack($turn)
    {
        $dmg = 0;

        if ($turn = 1) {
            $att = $this->perso1->getAttack();
            $def = $this->perso2->getDefense();
        } else {
            $att = $this->perso2->getAttack();
            $def = $this->perso1->getDefense();
        }
        $dice = new Dice();
        $chance = 70 + ($att - $def);
        $roll = $dice->throwDice(100);
        if ($chance > $roll) {
            $roll2 = $dice->throwDice(12);
            $dmg = round($att / 5 * $roll2);
            return $dmg;
        } else {
            return $dmg;
        }
    }
//
//    public function current()
//    {
//        return $this->combatLog[$this->position];
//    }
//
//    public function next()
//    {
//        ++$this->position;
//    }
//
//    public function key()
//    {
//        return $this->position;
//    }
//
//    public function valid()
//    {
//        return isset($this->combatLog[$this->position]);
//    }
//
//    public function rewind()
//    {
//        --$this->position;
//    }
}