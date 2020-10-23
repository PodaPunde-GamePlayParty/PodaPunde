<?php
/*
 * Configuration file
 *
 * © 2020 Team PodaPunde
 * 
 */


// Database
define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","gameplayparty");

// Sitename
define ("SITENAME","GamePlayParty");
define ("APPVERSION","0.0.1");

// Folderpaths
define("APPROOT", dirname(dirname(__FILE__)));
define("URLROOT", "http://localhost/projecten/gameplayparty/PodaPunde");
define("IMAGEROOT", "http://localhost/projecten/gameplayparty/PodaPunde/public/graph/");

// Authorities
define ("VISITOR", "0");
define ("UN_VERIFIED_CINEMA", "1");
define ("VERIFIED_CINEMA", "2");
define ("ADMINISTRATOR", "3");

// Const
define("DELETE_TIME_ACCOUNT", "0000-00-00 00:01:00"); // yyyy-mm-dd hh:mm:ss

//  Salt
define ("SALTHEADER", "PLOP23B453J");
define ("SALTTRAILER", "FDSFS9434VH");
