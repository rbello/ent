<?php

// Chargement de la configuration
$config = include_once 'config/load.php';

// Niveau d'erreur
error_reporting($config['debug'] ? E_ALL : 0);

// Librairies tiers
require_once 'vendor/autoload.php';

// EntityManager
$entityManager = \Doctrine\DBAL\DriverManager::getConnection($config['connectionParams'], new \Doctrine\DBAL\Configuration());
