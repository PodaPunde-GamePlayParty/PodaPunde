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

	// Return bioscopen
	public function getBioscopen() {

		$query  = "SELECT cinema_id, name, adress, city, zipcode, province ";
		$query .= "FROM cinemas ";

		$this->database->prepare($query);
		return $this->database->getArray(); // Array
	}

}
