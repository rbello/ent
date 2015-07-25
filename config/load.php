<?php

// Configuration par défaut
$config = include 'config/config.default.php';

// Surchargée par la configuration pour ce serveur
$file = "config/config.{$_SERVER['SERVER_NAME']}.php";
if (file_exists($file)) {
    $config = array_merge($config, include $file);

}

return $config;