#!/usr/bin/php
<?php
if (php_sapi_name() != 'cli') exit(-1);

$hash = @md5(file_get_contents('https://ent-rbello.c9.io/api/GestionSessions/getEtablissements.json'));
if ($hash != 'c509030a4b0d2096bd248827b72fd998') {
    echo "Error: REST GestionSessions::getEtablissements() -> unexpected result\n";
}

$hash = @md5(file_get_contents('https://ent-rbello.c9.io/api/GestionSessions/getSessionsByRacineEtablissementAndYear.json?racine=TL&year=2009'));
if ($hash != '6ddbf465c2eeb278930d5f272395b755') {
    echo "Error: REST GestionSessions::getSessionsByRacineEtablissementAndYear('TL', 2009) -> unexpected result\n";
}

$hash = @md5(shell_exec('~/workspace/system/cli.php session get-all-racineetablissementandyear TL 2013'));
if ($hash != '5977b94899dfcfe27672e124f2428176') {
    echo "Error: CLI session get-all-racineetablissementandyear TL 2013 -> unexpected result\n";
}

if (@!simplexml_load_string(file_get_contents('https://ent-rbello.c9.io/api/GestionSessions.wsdl'))) {
    echo "Error: SOAP wsdl file -> xml validation failure\n";
}

try {
    $client = new SoapClient('https://ent-rbello.c9.io/api/GestionSessions.wsdl', array("trace" => 1, "exception" => 1));
    $result = @$client->getSessionByID(848037);
    if (!is_object($result)) throw new \Exception('Result is not an object');
    if (!isset($result->id) || $result->id !== 848037) throw new \Exception('Field access error');
}
catch (\Exception $ex) {
    echo "Error: SOAP call GestionSessions::getSessionByID() -> {$ex->getMessage()}\n";
}
finally {
    unset($result);
}

try {
    $result = @$client->getSessionsByRacineEtablissementAndYear('TL', 2014);
    if (!is_array($result)) throw new \Exception('Result is not an array');
    if (sizeof($result) != 7) throw new \Exception('Expected 7 results');
}
catch (\Exception $ex) {
    echo "Error: SOAP call GestionSessions::getSessionsByRacineEtablissementAndYear() -> {$ex->getMessage()}\n";
}
finally {
    unset($client, $result);
}

if (@!file_get_contents('https://ent-rbello.c9.io/')) {
    echo "Error: WWW /index.html\n";
}

if (@!file_get_contents('https://ent-rbello.c9.io/css/style.css')) {
    echo "Error: WWW /css/style.css\n";
}

if (@!file_get_contents('https://ent-rbello.c9.io/res/google-map/google-map.html')) {
    echo "Error: WWW /res/google-map/google-map.html\n";
}

if (@!file_get_contents('https://ent-rbello.c9.io/res/google-apis/google-maps-api.html')) {
    echo "Error: WWW /res/google-apis/google-maps-api.html\n";
}

if (@!file_get_contents('https://ent-rbello.c9.io/js/ctrl.js')) {
    echo "Error: WWW /js/ctrl.js\n";
}