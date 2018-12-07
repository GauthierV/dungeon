<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Combat</title>
</head>
<body>
<h2>Combat entre <?= $this->attaquant->getName() ?> et <?= $this->defender->getName() ?></h2>

<?php if ($dmg !== 0) {
    echo "<p>" . $this->attaquant->getName() . "  attaque " . $this->defender->getName() . " et lui inflige " . $dmg . " dégats.</p>";
} else {
    echo "<p>" . $this->attaquant->getName() . "  rate lamentablement et inflige " . $dmg . " dégat à " . $this->defender->getName() . ".</p>";
} ?>
<p>Il reste <?= $this->defender->getLifeCurrent() - $dmg ?> HP à <?= $this->defender->getName() ?>.</p>
<!--<p>Quel action voulez vous faire?</p>-->
<!--<form action="/attack">-->
<!--    <button type="submit">Attack</button>-->
<!--</form>-->
<!--<form action="/Fuire">-->
<!--    <button type="submit">Fuire</button>-->
<!--</form>-->
</body>
</html>