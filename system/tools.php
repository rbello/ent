<?php

/**
 * API factory, with singleton principe.
 */
function api($className) {
    $className = "\\API\\{$className}";
    if (!isset($GLOBALS['__API__']))
        $GLOBALS['__API__'] = array();
    if (!isset($GLOBALS['__API__'][$className]))
        $GLOBALS['__API__'][$className] = new $className();
    return $GLOBALS['__API__'][$className];
}

/**
 * Run a code an catch exceptions and error reportings.
 */
function capture(\Closure $try, \Closure $catch) {
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