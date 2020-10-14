<?php
/*
 * Public index, load files and make session ready
 *
 * © 2020 Team PodaPunde
 * 
 */


// Include autoloader for libraries
require_once "../app/autoloader.php";
session_name("GamePlayParty");
session_start();

// Init Core library
$core = new Core();
