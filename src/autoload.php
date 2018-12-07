<?php

spl_autoload_register(function ($classname) {
    $tmp = str_replace('\\', DIRECTORY_SEPARATOR, $classname);
    $path = __DIR__ . DIRECTORY_SEPARATOR . $tmp . '.php';
    require $path;
});