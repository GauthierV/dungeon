<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Combat</title>
</head>
<body>
<h2>Combat entre <?= $this->perso1->getName() ?> et <?= $this->perso2->getName() ?></h2>



<?php //foreach ($this->combatLog as $log){
//    echo "<p>" . $log . "</p>";
//} ?>

<?php
while ($this->valid()){
    echo "<p>" . $this->combatLog[$this->position] . "</p>";
    $this->next();
}
?>


<!--<p>Quel action voulez vous faire?</p>-->
<!--<form action="/attack">-->
<!--    <button type="submit">Attack</button>-->
<!--</form>-->
<!--<form action="/Fuire">-->
<!--    <button type="submit">Fuire</button>-->
<!--</form>-->
</body>
</html>