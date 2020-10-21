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

	// get the cinema details with cinema_id
	public function getCinemaDetails($cinema_id) {

		$query = "SELECT * ";
		$query .= "FROM cinemas ";
		$query .= "WHERE cinema_id = :cinema_id ";

		$this->database->prepare($query);
		$this->database->bind(":cinema_id", $cinema_id);
		return $this->database->getRow(); // get single Row
	}

	// get the halss that are asigned to the cinema
	public function getHalls($cinema_id) {

		$query  = "SELECT * ";
		$query .= "FROM halls ";
		$query .= "WHERE cinema_id = :cinema_id ";

		$this->database->prepare($query);
		$this->database->bind(":cinema_id", $cinema_id);
		return $this->database->getArray(); // Array
	}

	// get the facilities that are asigned to the hall
	public function getFacilities($hall_id) {

		$query  = "SELECT * ";
		$query .= "FROM facilities ";
		$query .= "WHERE hall_id = :hall_id ";

		$this->database->prepare($query);
		$this->database->bind(":hall_id", $hall_id);
		return $this->database->getArray(); // Array
	}
	


}

