<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Liste des perso</title>
</head>
<body>
<?php foreach ($listPerso as $perso){
    echo '<a href="/perso?name=' . $perso["name"] . '"><p>' . $perso["name"] . ' le ' . $perso["class"] . '</p></a>';
}?>
</body>
</html>