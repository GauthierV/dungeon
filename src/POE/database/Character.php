<?php

namespace POE\database;


class Character
{
    private $name;
    private $class;
    private $x_position;
    private $y_position;
    private $attack;
    private $life_max;
    private $life_current;
    private $energy_max;
    private $energy_current;
    private $defense;

    const TYPES = [
        'warrior' => [
            'life_max' => 70,
            'energy_max' => 12,
            'attack' => 15,
            'defense' => 12
        ],
        'mage' => [
            'life_max' => 50,
            'energy_max' => 20,
            'attack' => 10,
            'defense' => 8
        ],
        'rogue' => [
            'life_max' => 45,
            'energy_max' => 18,
            'attack' => 18,
            'defense' => 7
        ],
        'healer' => [
            'life_max' => 40,
            'energy_max' => 30,
            'attack' => 7,
            'defense' => 6
        ]
    ];


    public function __construct()
    {

    }


    public static function getChars()
    {
        $connect = new Connexion();
        $return = [];
        $connexion = $connect->getDb();
        $result = $connexion->query("SELECT name, class FROM characters");

        foreach ($result as $r) {
            array_push($return, $r);
        };
        return $return;
    }


    public function createChar($nom, $class)
    {
        if (!key_exists($class, self::TYPES)) {
            throw new \Exception('Class of character ' . $class . ' does not exist');
        }

        $this->setName($nom);
        $this->setClass($class);
        $this->setXPosition(1);
        $this->setYPosition(1);
        $this->setLifeMax(self::TYPES[$class]['life_max']);
        $this->setLifeCurrent(self::TYPES[$class]['life_max']);
        $this->setEnergyMax(self::TYPES[$class]['energy_max']);
        $this->setEnergyCurrent(self::TYPES[$class]['energy_max']);
        $this->setAttack(self::TYPES[$class]['attack']);
        $this->setDefense(self::TYPES[$class]['defense']);;

        $connect = new Connexion();
        $connexion = $connect->getDb();

        $statement = $connexion->prepare(
            "INSERT INTO characters (name, life_max, energy_max, energy_current, attack, defense, life_current, class, x_position, y_position)
            VALUES(:name, :life_max, :energy_max, :energy_current, :attack, :defense, :life_current, :class, :x_position, :y_position)");

        foreach ($this as $key => $value) {
            $statement->bindValue($key, $value);
        }

        try {
            $statement->execute();
        } catch (\PDOException $exception) {
            return "Échec lors de l'ajout : de " .$this->getName() . ". Erreur : " . $exception->getMessage();
        }

        return "Le personnage " . $this->getName() . " de classe " . $this->getClass() . " a été créé.";
    }


    public function returnChar()
    {
        return "Votre perso s'appel " . $this->name . ", c'est un " . $this->class . ".";
    }


    public function move($x, $y)
    {
        $this->x_position += $x;
        $this->y_position += $y;
        $moveReport = "Votre personnage a bougé en x de " . $x . " et en y de " . $y . ".";
        return $moveReport;
    }


    // getters setters

    public function getName()
    {
        return $this->name;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function returnPosition()
    {
        return "Votre perso est en position x:" . $this->x_position . " et en y:" . $this->y_position . ".";
    }

    public function getXY()
    {
        return $this->x_position . $this->y_position;
    }

    public function getXPosition()
    {
        return $this->x_position;
    }

    public function getYPosition()
    {
        return $this->y_position;
    }

    public function getLifeMax()
    {
        return $this->life_max;
    }

    public function getLifeCurrent()
    {
        return $this->life_current;
    }

    public function getEnergyMax()
    {
        return $this->energy_max;
    }

    public function getEnergyCurrent()
    {
        return $this->energy_current;
    }

    function getDefense()
    {
        return $this->defense;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setClass($class): void
    {
        $this->class = $class;
    }

    public function setXPosition($x_position): void
    {
        $this->x_position = $x_position;
    }

    public function setYPosition($y_position): void
    {
        $this->y_position = $y_position;
    }

    public function setAttack($attack): void
    {
        $this->attack = $attack;
    }

    public function setLifeMax($life_max): void
    {
        $this->life_max = $life_max;
    }

    public function setLifeCurrent($life_current): void
    {
        $this->life_current = $life_current;
    }

    public function setEnergyMax($energy_max): void
    {
        $this->energy_max = $energy_max;
    }

    public function setEnergyCurrent($energy_current): void
    {
        $this->energy_current = $energy_current;
    }

    public function setDefense($defense): void
    {
        $this->defense = $defense;
    }

}