<?php

error_reporting(E_ALL);

require_once "vendor/autoload.php";

include_once "config/load.php";

$entityManager = EntityManager::create($conn, $config);

?>
