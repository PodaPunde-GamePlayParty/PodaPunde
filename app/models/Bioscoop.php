<?php
/*
 * Database management for the products
 *
 * © 2020 Team PodaPunde
 * 
 */

// Create class Bioscoop
class Bioscoop {

	private $database;

	public function __construct() {
		$this->database = new Database;
	}

	// Return cinemas
	public function getBioscopen() {

		$query  = "SELECT * ";
		$query .= "FROM cinemas ";

		$this->database->prepare($query);
		return $this->database->getArray(); // Array
	}

}
