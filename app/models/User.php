<?php
/*
 * Database management for the User
 *
 * © 2020 Team PodaPunde
 *
 */

// Create class User
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

	// Return users
	public function login($email, $password) {

		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE email = :email ";
		$query .= "AND password = :password ";

        $this->database->prepare($query);
        $this->database->bind(":email", $email);
		$this->database->bind(":password", $password);
        return $this->database->getRow();
	}

	public function loginUsername($username, $password) {

		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE username = :username ";
		$query .= "AND password = :password ";

        $this->database->prepare($query);
        $this->database->bind(":username", $username);
		$this->database->bind(":password", $password);
        return $this->database->getRow();
	}

	public function logOut() {

		unset($_SESSION['userid']);
		unset($_SESSION['authority']);
		unset($_SESSION['firstname']);
		session_destroy();
	}

	public function registerAccount($data) {

		$username = $data["username"];
		$password = $data["password"];
		$email = $data["email"];
		$firstname = $data["firstname"];
		$preposition = $data["preposition"];
		$lastname = $data["lastname"];
		$authority_level = $data["authority_level"];
						
		$query = "INSERT INTO users ";
		$query .= "(username, ";
		$query .= "password, ";
		$query .= "email, ";
		$query .= "firstname, ";
		$query .= "preposition, ";
		$query .= "lastname, ";
		$query .= "authority_level) ";

		$query .= "VALUES(:username, ";
		$query .= ":password, ";
		$query .= ":email, ";
		$query .= ":firstname, ";
		$query .= ":preposition, ";
		$query .= ":lastname, ";
		$query .= ":authority_level) ";

		$this->database->prepare($query);
		$this->database->bind(":username", $username);
		$this->database->bind(":password", $password);
		$this->database->bind(":email", $email);
		$this->database->bind(":firstname", $firstname);
		$this->database->bind(":preposition", $preposition);
		$this->database->bind(":lastname", $lastname);
		$this->database->bind(":authority_level", $authority_level);

		if ($this->database->execute()) {
			return true;
		} else {
			return false;
		}
	}

}
