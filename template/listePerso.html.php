<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des perso</title>
</head>
<body>
<?php foreach ($listPerso as $perso){
    echo '<a href="/perso?name=' . $perso->getName() . '"><p>' . $perso->getName() . ' le ' . $perso->getClass() . '</p></a>';
}?>
</body>
</html>