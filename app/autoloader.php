<?php
/*
* Autoloader
*
* (C) 2020 Dyon van Raaij
*
*/

// Autoload core libraries
spl_autoload_register(function($class){
	require_once "libraries/" . $class . ".php";
});

// Load config
require_once "config/config.php";
require_once "include/functions.php";
