<?php

require_once 'config.php';

// EntityManager
$em = \Doctrine\ORM\EntityManager::create(
    $config['connectionParams'],
    \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        array(BASE . '/models'),
        $config['debug']
    )
);

return $em;
