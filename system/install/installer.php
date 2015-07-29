<?php

// Méfiance...
if (php_sapi_name() != 'cli') {
    exit("Error: must be run in CLI\n");
}

error_reporting(E_ALL);

// On utilisera les modèles générés
//define('GENERATED_MODELS', true);

// On n'insert pas toutes les données, juste un peu histoire de tester
$test_limit_data = false;

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
    //$xml = substr($xml, 1); // TODO Fix à retirer quand la génération des fichiers XML ne produira plus cette erreur
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

$format = "d/m/Y";

// 1 - On charge les produits, les UE et les modules
require_once BASE . 'models/Produit.php';
include '.install-products.php';
$repoProduit = $em->getRepository('\\Models\\Produit');

// 2 - On charge les étudiants 
require_once BASE . 'models/Etudiant.php';
include '.install-students.php';

// 3 - On charge les établissements et les sessions
require_once BASE . 'models/Etablissement.php';
#include '.install-etablissements.php';

// 4 - On charge les inscriptions
include '.install-inscriptions.php';