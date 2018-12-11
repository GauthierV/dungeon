<?php

namespace POE\fight;


class FightLog implements \Iterator
{
    private $position = 0;
    private $combatLog = [];

    public function append($logLine)
    {
        array_push($this->combatLog, $logLine);
    }

    public function current()
    {
        return $this->combatLog[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->combatLog[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}