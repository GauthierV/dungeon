<?php

namespace POE\entity;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use POE\database\Connexion;

/**
 * Class Character
 * @ORM\Entity()
 * @ORM\Table(name="characters")
 */
class Character
{

    /**
     * L'identifiant en BDD
     * @var  int
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     */
    private $id;
    /**
     * Le nom du personnage
     * @var string
     * @ORM\Column(type="string")
     */
    private $name;
    /**
     * La classe du personnage
     * @var string
     * @ORM\Column(type="string")
     */
    private $class;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $x_position;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $y_position;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $attack;
    /**
     * @var int
     * @ORM\Column(type="integer", name="life_max")
     */
    private $maxLife;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $life_current;
    /**
     * @var int
     * @ORM\Column(type="integer", name="energy_max")
     */
    private $maxEnergy;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    private $energy_current;
    /**
     * @var int
     * @ORM\Column(type="integer")
     */
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


    public static function getChars(EntityManager $manager)
    {
//        $connect = Connexion::getInstance();
//        $return = [];
//        $connexion = $connect->getDb();
//        $result = $connexion->query("SELECT name, class FROM characters");

        return $manager->getRepository(Character::class)->findAll();
//
//        foreach ($result as $r) {
//            array_push($return, $r);
//        };
//        return $return;
    }


    public function createChar($nom, $class, EntityManager $entity)
    {
        if (!key_exists($class, self::TYPES)) {
            throw new \Exception('Class of character ' . $class . ' does not exist');
        }



        $this->setName($nom);
        $this->setClass($class);
        $this->setXPosition(1);
        $this->setYPosition(1);
        $this->setMaxLife(self::TYPES[$class]['life_max']);
        $this->setLifeCurrent(self::TYPES[$class]['life_max']);
        $this->setMaxEnergy(self::TYPES[$class]['energy_max']);
        $this->setEnergyCurrent(self::TYPES[$class]['energy_max']);
        $this->setAttack(self::TYPES[$class]['attack']);
        $this->setDefense(self::TYPES[$class]['defense']);;

//        $connexion = Connexion::getInstance()->getDb();
//        $statement = $connexion->prepare(
//            "INSERT INTO characters (name, life_max, energy_max, energy_current, attack, defense, life_current, class, x_position, y_position)
//            VALUES(:name, :life_max, :energy_max, :energy_current, :attack, :defense, :life_current, :class, :x_position, :y_position)");
//
//        foreach ($this as $key => $value) {
//            if ($key == "connexion") {
//                continue;
//            }
//            $statement->bindValue($key, $value);
//        }
//
//        try {
//            $statement->execute();
//        } catch (\PDOException $exception) {
//            return "Échec lors de l'ajout : de " . $this->getName() . ". Erreur : " . $exception->getMessage();
//        }

        try {
            $entity->persist($this);
        } catch (ORMException $e) {
            return $e->getMessage();
        }

        try {
            $entity->flush();
        } catch (OptimisticLockException $e) {
            return $e->getMessage();
        } catch (ORMException $e) {
            return $e->getMessage();
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

    public function getMaxLife()
    {
        return $this->maxLife;
    }

    public function getLifeCurrent()
    {
        return $this->life_current;
    }

    public function getMaxEnergy()
    {
        return $this->maxEnergy;
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

    public function setMaxLife($maxLife): void
    {
        $this->maxLife = $maxLife;
    }

    public function setLifeCurrent($life_current): void
    {
        $this->life_current = $life_current;
    }

    public function setMaxEnergy($maxEnergy): void
    {
        $this->maxEnergy = $maxEnergy;
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