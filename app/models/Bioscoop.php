<?php
/*
 * Database management for the products
 *
 * (C) 2020 Dyon van Raaij
 */
class Bioscoop {

	private $database;

	public function __construct() {
		$this->database = new Database;
	}

	// Return users
	public function getBioscopen() {

		$query  = "SELECT * ";
		$query .= "FROM cinemas ";

		$this->database->prepare($query);
		return $this->database->getArray(); // Array
	}

}
