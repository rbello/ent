<?php

// Chargement de la configuration
$config = include_once __DIR__ . '/config.php';

// Niveau d'erreur
error_reporting($config['debug'] ? E_ALL : 0);

// Librairies tierses
require_once BASE . 'system/autoload.php';
require_once BASE . 'system/lib/autoload.php';

// Authentication
require_once BASE . 'system/auth.php';

// Entity manager
$em = require_once BASE . 'system/db.php';

// Tools
require_once BASE . 'system/tools.php';