<?php

include __DIR__ . "/../template/navbar.html";
include __DIR__ . "/../vendor/autoload.php";

require __DIR__ . "/../src/bootstrap.php";

$logger = new Monolog\Logger("main");

$handlers = [new Monolog\Handler\StreamHandler(__DIR__ . '/../test.log')];

$logger->setHandlers($handlers);

$logger->info("Déamarrage de l'appli");

$dungeon = new POE\Dungeon($entityManager);


// quand on tape l'url /perso et en get ?(nom de perso) ça retourne son état
if (strpos($_SERVER['REQUEST_URI'], "/perso") === 0){
    echo $dungeon->reportSituation($_GET["name"]);
//    $document = $dungeon->reportSituation($_GET["name"]);
//    echo $document;
}


//echo $_SERVER['REQUEST_URI'];

if ($_SERVER['REQUEST_URI'] == "/creationPerso"){
    echo $dungeon->createChar();
}

if ($_SERVER['REQUEST_URI'] == "/charCreated"){
//    $char = new \POE\entity\Character();
    $response = $dungeon->charCreated($_POST['nom'], $_POST['class']);
    echo "<h3> " . $response . "</h3>";
}

if ($_SERVER['REQUEST_URI'] == "/"){
    echo $dungeon->listePerso();
}

if ($_SERVER['REQUEST_URI'] == "/fight"){
    echo $dungeon->fight();
    $logger->info("Fin du combat entre TOTO et JCVD");
}



