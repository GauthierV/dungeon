<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dungeon report</title>
    <style>
    </style>
</head>
<body>


<h1><?= $character->getName(); ?> le <?= $character->getClass(); ?></h1>
<div>
    <label for="hp">PV : <?= $character->getLifeCurrent(); ?> / <?= $character->getLifeMax(); ?></label>
    <progress id="hp" max="<?= $character->getLifeMax(); ?>" value="<?= $character->getLifeCurrent(); ?>"></progress>
</div>

<div>
    <label for="mana">MANA : <?= $character->getEnergyCurrent(); ?> / <?= $character->getEnergyMax(); ?></label>
    <progress id="mana" max="<?= $character->getEnergyMax(); ?>"
              value="<?= $character->getEnergyCurrent(); ?>"></progress>
</div>

<h2>Combat : <?= $character->getAttack(); ?> attack et <?= $character->getDefense(); ?> de défense.</h2>

<p><?= $report ?></p>
<p><?= $character->returnPosition() ?></p>
</body>
</html>