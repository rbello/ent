#!/usr/bin/php
<?php
if (php_sapi_name() != 'cli') exit();

// Init system
include __DIR__ . '/../system/init.php';
require_once __DIR__ . '/cli/CommandHandler.php';

class X extends \PHPonCLI\CommandHandler {
    
    /** 
	 * @return null|string|int|mixed
	 */
	public function getCurrentUserID() {
	    return null;
	}
	
	/**
	 * @param string|int|mixed $userID
	 * @param string $object
	 * @param string $permission
	 * @param string $action
	 * @return boolean
	 */
	public function checkPermission($userID, $object, $permission, $action) {
		if ($userID == null) {
			return false;
		}
	    return false;
	}
    
}

$cli = new X();

$groups = array();

foreach (glob(__DIR__ . '/../api/*.php') as $file) {
	
	$classname = substr(basename($file), 0, -4);
	require_once $file;
	$instance = new $classname();
	$class = new \Wingu\OctopusCore\Reflection\ReflectionClass($classname);
	//$ann = $class->getReflectionDocComment()->getAnnotationsCollection();
	
	$cli->addObject($instance);

}

$cli->exec($GLOBALS['argv']);