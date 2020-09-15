<?php
/* 
 * Database management for the User 
 *
 * (C) 2020 Pentasol
 */
class User {

	private $database;

	public function __construct() {
		$this->database = new Database;
	}

	// Return users
	public function getNames() {

		$query  = "SELECT id, name ";
		$query .= "FROM users ";

		$this->database->prepare($query);
		return $this->database->getArray(); // Array
	}

	// Return info for specific user
	public function getRowForId($id) {

		$query  = "SELECT id, name, email, date_created ";
		$query .= "FROM users ";
		$query .= "WHERE id = :id ";

		$this->database->prepare($query);
		$this->database->bind(":id", $id);
		return $this->database->getRow(); // Object
	}
}