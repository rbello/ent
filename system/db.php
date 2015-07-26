<?php

// On a besoin de la configuration
$config = require_once 'config.php';

// On fabrique l'EntityManager
$em = \Doctrine\ORM\EntityManager::create(
    
    // Avec les paramètres de connexion donnés dans la configuration
    $config['connectionParams'],
    
    // Configuration avancée
    \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        
        // En fonction de la constante GENERATED_MODELS on va utiliser les modèles générés par Doctrine (/system/Models/),
        // ou bien les modèles de base définis (/models/).
        // Les modèles de base servent pour la génération automatique avec l'utilitaire de Doctrine 'orm:generate-entities'.
        // Les modèles générés servent ensuite pour toute l'execution de l'application.
        defined('GENERATED_MODELS') && GENERATED_MODELS === true ? array(BASE . '/system/Models') : array(BASE . '/models'),
        
        // Dev mode
        $config['debug']
        
    )

);

// On renvoie l'EntityManager
return $em;
