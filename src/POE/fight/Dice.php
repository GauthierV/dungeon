<?php

class Dice
{
    public function throwDice(int $sides = 6): int
    {
        return random_int(1, $sides);
    }
}