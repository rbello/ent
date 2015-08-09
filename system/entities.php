<?php

spl_autoload_register(function ($class) {
    if (substr($class, 0, 7) == 'Models') return;
    $class = substr($class, 7);
    if (file_exists(__DIR__."/../models/{$class}.php")) {
        require_once __DIR__."/../models/{$class}.php";
    }
});