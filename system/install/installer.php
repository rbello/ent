<?php

// Méfiance...
if (php_sapi_name() != 'cli') {
    exit("Error: must be run in CLI\n");
}

// On utilisera les modèles générés
define('GENERATED_MODELS', true);

// Initialisation
include dirname(__FILE__) . '/../init.php';
echo "Running {$config['host']}\n";

/**
 * Fonction générique pour charger un fichier XMl.
 */
function load_xml($path) {
    $xml = @file_get_contents($path);
    if (!$xml) {
        exit("Error: file not found ($path)\n");
    }
    $xml = substr($xml, 1); // TODO Fix à retirer quand la génération des fichiers XML ne produira plus cette erreur
    $xml = simplexml_load_string($xml);
    if ($xml === false) {
        echo "Error: failed loading XML\n";
        foreach (libxml_get_errors() as $error) {
            echo " * {$error->message}\n";
        }
        exit();
    }
    return $xml;
}

// On charge les produits
$xml = load_xml(BASE . 'system/install/data/Modules-X.xml');

//include BASE . 'models/Produit.php';
include BASE . 'system/Models/Produit.php';

foreach ($xml->produit as $produit) {
    
    $model = new  \Models\Produit();
    $model->setId($produit['id']);
    $model->setReferentiel($produit['referentiel']);
    $model->setDate($produit['date']);
    
    $em->persist($model);
    
    /*$model = new  \Models\Produit($produit['id']);
    $model->name = $produit['name'];
    $model->referentiel = $produit['referentiel'];
    $model->date = $produit['date'];
    
    $em->persist($model);
    $em->flush();
    
    foreach ($produit->ue as $ue) {
        
        $submodel = new \Models\UE($ue['id']);
        $submodel->name = $ue['name'];
        $submodel->axePeda = $ue['axePeda'];
        $submodel->ects = intval($ue['ects']);
        $submodel->product = $model;
        
        $em->persist($submodel);
        
    }*/
    
    $em->flush();
    
}
