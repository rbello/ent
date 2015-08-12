<?php

// Méfiance...
if (php_sapi_name() != 'cli') {
    exit("Error: must be run in CLI\n");
}

$config = include dirname(__FILE__) . '/../config.php';

$db = mysql_connect(
    $config['persistence']['host'],
    $config['persistence']['user'],
    $config['persistence']['password']);

mysql_select_db($config['persistence']['dbname']);

$query = mysql_query("DROP DATABASE {$config['persistence']['dbname']};", $db);
echo 'DROP:   ' . ($query ? 'OK' : mysql_error()) . "\n";

$query = mysql_query("CREATE DATABASE {$config['persistence']['dbname']} CHARACTER SET utf8;", $db);
echo 'CREATE: ' . ($query ? 'OK' : mysql_error()) . "\n";