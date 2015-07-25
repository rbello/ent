<?php

// Emplacement du système
define('BASE', realpath(dirname(__FILE__) . '/../') . '/');

// Chargement de la configuration
$config = include_once BASE . 'system/config.php';

// Niveau d'erreur
error_reporting($config['debug'] ? E_ALL : 0);

// Librairies tiers
require_once BASE . 'system/lib/autoload.php';

// Entity manager
$em = require_once BASE . 'system/db.php';