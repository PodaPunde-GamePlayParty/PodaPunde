<?php
/*
 * Database management for the User
 *
 * (C) 2020 Pentasol
 */
class Cinema {

	private $database;

	public function __construct() {
		$this->database = new Database;
	}

	// Return users
	public function getCinemas() {

		$query  = "SELECT Cinema_ID, name ";
		$query .= "FROM cinemas ";

		$this->database->prepare($query);
		return $this->database->getArray(); // Array
	}

}
