<?php

namespace POE;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use POE\database\CharacterLoader;
use POE\entity\Character;
use POE\fight\Combat;

class Dungeon
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $manager;

    public function __construct(EntityManager $entityManager)
    {
        $this->manager = $entityManager;
    }


    public function fight()
    {
//        $loader = new CharacterLoader();
//        $char2 = $loader->load($char2);
        $char1 = $this->manager->find(Character::class,1);
        $char2 = $this->manager->find(Character::class, 2);
        $combat = new Combat($char1, $char2);
        echo $combat->fight();
    }

    public function charCreated($nom, $class)
    {
        $char = new Character();
        return $char->createChar($nom, $class, $this->manager);
    }

    public function reportSituation($name)
    {
//        $loader = new CharacterLoader();
//        $character = $loader->load($name);
        $character = $this->manager->getRepository(Character::class)->findOneBy(["name"=>$name]);
        $report = $character->move(0, 2);

        ob_start();
        include __DIR__ . "/../template/reportSituation.html.php";
        include __DIR__ . "/../template/map.html.php";
        $output = ob_get_clean();
        return $output;
    }

    public function createChar()
    {
        ob_start();
        include __DIR__ . "/../template/createChar.html";
        $output = ob_get_clean();
        return $output;
    }

    public function listePerso()
    {
        $listPerso = \POE\entity\Character::getChars($this->manager);
        ob_start();
        include __DIR__ . "/../template/listePerso.html.php";
        $output = ob_get_clean();
        return $output;
    }
}