<?php
/*
Title: MVC Template
Discription: MVC
Author: Harisan Nades
Date: 10-09-2020
Copyright ©2020
*/

// Include autoloader for libraries
require_once "../app/autoloader.php";
session_name("GamePlayParty");
session_start();

// Init Core library
$core = new Core();
