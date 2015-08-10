#!/usr/bin/php
<?php
if (php_sapi_name() != 'cli') exit(-1);

$hash = @md5(file_get_contents('https://ent-rbello.c9.io/api/GestionSessions/getEtablissements.json'));
if ($hash != 'c509030a4b0d2096bd248827b72fd998') {
    echo "Error: REST GestionSessions::getEtablissements()\n";
}

$hash = @md5(file_get_contents('https://ent-rbello.c9.io/api/GestionSessions/getSessionsByRacineEtablissementAndYear.json?racine=TL&year=2009'));
if ($hash != '6ddbf465c2eeb278930d5f272395b755') {
    echo "Error: REST GestionSessions::getSessionsByRacineEtablissementAndYear('TL', 2009)\n";
}

$hash = @md5(shell_exec('~/workspace/system/cli.php session get-all-racineetablissementandyear TL 2013'));
if ($hash != '5977b94899dfcfe27672e124f2428176') {
    echo "Error: CLI session get-all-racineetablissementandyear TL 2013\n";
}

if (@!simplexml_load_string(file_get_contents('https://ent-rbello.c9.io/api/GestionSessions.wsdl'))) {
    echo "Error: WSDL xml validation\n";
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

if (@!file_get_contents('https://ent-rbello.c9.io/js/ctrl.js')) {
    echo "Error: WWW /js/ctrl.js\n";
}