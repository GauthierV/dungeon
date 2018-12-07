<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Map 1</title>
<!--    <link rel="stylesheet" href="map.css">-->
    <style>
        /*body {*/
            /*margin: 40px;*/
        /*}*/

        .wrapper {
            display: grid;
            grid-template-columns: 100px 100px 100px;
            grid-template-rows: 100px 100px 100px;
            grid-gap: 10px;
            background-color: #fff;
            color: #444;
        }

        .box {
            border: solid .2em black;
            /*background-color: #444;*/
            color: black;
            border-radius: 5px;
            padding: 20px;
            font-size: 150%;
        }
    </style>
</head>
<body>


<div class="wrapper">
    <div class="box" id="x1y1"><?php if ($character->getXY() == "11"){echo $character->getName();}?></div>
    <div class="box" id="x2y1"><?php if ($character->getXY() == "21"){echo $character->getName();}?></div>
    <div class="box" id="x3y1"><?php if ($character->getXY() == "31"){echo $character->getName();}?></div>
    <div class="box" id="x1y2"><?php if ($character->getXY() == "12"){echo $character->getName();}?></div>
    <div class="box" id="x2y2"><?php if ($character->getXY() == "22"){echo $character->getName();}?></div>
    <div class="box" id="x3y2"><?php if ($character->getXY() == "32"){echo $character->getName();}?></div>
    <div class="box" id="x1y3"><?php if ($character->getXY() == "13"){echo $character->getName();}?></div>
    <div class="box" id="x2y3"><?php if ($character->getXY() == "23"){echo $character->getName();}?></div>
    <div class="box" id="x3y3"><?php if ($character->getXY() == "33"){echo $character->getName();}?></div>
</div>



</body>
</html>
