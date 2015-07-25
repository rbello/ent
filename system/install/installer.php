<?php

if (php_sapi_name() != 'cli') {
    exit("Error: must be run in CLI\n");
}

include dirname(__FILE__) . '/../init.php';
echo "Running {$config['host']}\n";

$xml = @file_get_contents(BASE . 'system/install/data/Modules-X.xml');
if (!$xml) {
    exit("Error: Modules file not found\n");
}
$xml = substr($xml, 1);
$xml = simplexml_load_string($xml);

if ($xml === false) {
    echo "Error: failed loading XML\n";
    foreach (libxml_get_errors() as $error) {
        echo " * {$error->message}\n";
    }
    exit();
}

include BASE . 'system/entities.php';
include BASE . 'system/Models/Produit.php';


foreach ($xml->produit as $produit) {
    
    $model = new  \Models\Produit();
    $model->setId($produit['id']);
    $model->setName($produit['name']);
    $model->setReferentiel($produit['referentiel']);
    $em->persist($model);
    
}

$em->flush();
