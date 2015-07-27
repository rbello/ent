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

$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '{$config['persistence']['dbname']}'";

$query = mysql_query($sql, $db);

while ($row = mysql_fetch_assoc($query)) {
    echo "Truncate: {$row['TABLE_NAME']}\n";
    //$sql = "TRUNCATE TABLE `{$row['TABLE_NAME']}`";
    $sql = "DELETE FROM `{$row['TABLE_NAME']}` WHERE 1";
    mysql_query($sql, $db);
}

echo "OK\n";