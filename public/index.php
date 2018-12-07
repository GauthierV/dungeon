<?php

include __DIR__ . "/../template/navbar.html";
//echo $_SERVER['REQUEST_URI'];
include __DIR__ . "/../src/autoload.php";

$dungeon = new POE\Dungeon();


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
    $char = new \POE\database\Character();
    $response = $char->createChar($_POST['nom'], $_POST['class']);
    echo "<h3> " . $response . "</h3>";
}

if ($_SERVER['REQUEST_URI'] == "/"){
    $listChars = \POE\database\Character::getChars();
    echo $dungeon->listePerso($listChars);
}

if ($_SERVER['REQUEST_URI'] == "/fight"){
    echo $dungeon->fight();
}



