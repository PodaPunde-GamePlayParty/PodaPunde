<?php
/*
 * Cms management for the content manager / admin
 *
 * © 2020 Team PodaPunde
 *
 */

// Create class content manager
class Cmsmodel {

	private $database;

	public function __construct() {
		$this->database = new Database;
	}

	//Check if the user have he right authority
	public function getAuthority($user_id) {

		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = :user_id ";

		$this->database->prepare($query);
		$this->database->bind(":user_id", $user_id);
		return $this->database->getRow(); // single Row
	}

	// get the cinema that is signed to the user
	public function getCinema($user_id) {

		$query  = "SELECT * ";
		$query .= "FROM cinemas ";
		$query .= "WHERE user_id = :user_id ";

		$this->database->prepare($query);
		$this->database->bind(":user_id", $user_id);
		return $this->database->getRow(); // single Row
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

	// get the halls that are asigned to the cinema
	public function getHall($hall_id) {

		$query  = "SELECT * ";
		$query .= "FROM halls ";
		$query .= "WHERE hall_id = :hall_id ";

		$this->database->prepare($query);
		$this->database->bind(":hall_id", $hall_id);
		return $this->database->getRow(); // Get single Row
	}

	// get the halls that are asigned to the cinema
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

	// get all info from the specific cinema
	public function getCinemaByUserId($user_id) {

		$cinema = $this->getCinema($user_id);
		$cinema_id = $cinema->cinema_id;
		$cinema_halls = $this->getHalls($cinema_id);

		// foreach($cinema_halls as $id) {
		// 	$hall_id = $id->hall_id;
		// 	$hall_facilities[$hall_id] = $this->getFacilities($hall_id);
		// }

		return [
			"cinema" => $cinema,
			"cinema_halls" => $cinema_halls
			// "hall_facilities" => $hall_facilities
			// krijg error in mijn hoofd werk later bij
		];
	}

	// get all cinemas an put them every row in an array
	public function getAllCinemas() {

		$query  = "SELECT * ";
		$query .= "FROM cinemas ";

		$this->database->prepare($query);
		return $this->database->getArray(); // Multiple Rows in array
	}

	// get user data
	public function getUser($user_id) {

		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = :user_id ";

		$this->database->prepare($query);
		$this->database->bind(":user_id", $user_id);
		return $this->database->getRow();
	}

	public function deleteHall($hall_id) {

		$query  = "DELETE ";
		$query .= "FROM halls ";
		$query .= "WHERE hall_id = :hall_id ";

		$this->database->prepare($query);
		$this->database->bind(":hall_id", $hall_id);
		return $this->database->execute();

	}

}
