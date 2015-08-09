<?php

// Chargement de la configuration
$config = include_once __DIR__ . '/config.php';

// Niveau d'erreur
error_reporting($config['debug'] ? E_ALL : 0);

// Librairies tierses
require_once BASE . 'system/entities.php';
require_once BASE . 'system/lib/autoload.php';

// Authentication
require_once BASE . 'system/auth.php';

// Entity manager
$em = require_once BASE . 'system/db.php';

function capture(\Closure $try, \Closure $catch) {
    return cap($try, $catch);
}
function cap(\Closure $try, \Closure $catch) {
    // Setup handlers for catching error reporting
    set_error_handler(function ($errno, $errstr, $errfile, $errline, $errcontext) use ($catch) {
        $errstr = trim($errstr);
        if (preg_match('/(.+)must be(.+)given/i', $errstr)) {
            $ex = new InvalidArgumentException($errstr, $errno);
        }
        else {
            $ex = new Exception($errstr, $errno);
        }
        $catch($ex);
    }, E_ALL | E_STRICT);
    // Run the $try function
    try {
        return $try();
    }
    // Catch all exceptions
    catch (\Exception $ex) {
        return $catch($ex);
    }
    finally {
        restore_error_handler();
    }
}