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

    //Check if the user have he right authority
    public function getAuthority($user_id) {

        $query  = "SELECT * ";
        $query .= "FROM users ";
        $query .= "WHERE user_id = :user_id ";

        $this->database->prepare($query);
        $this->database->bind(":user_id", $user_id);
        return $this->database->getRow(); // single Row
    }


    // Return info for specific user
	public function getUser($user_id) {

		$query  = "SELECT * ";
		$query .= "FROM users ";
		$query .= "WHERE user_id = :user_id ";

		$this->database->prepare($query);
		$this->database->bind(":user_id", $user_id);
		return $this->database->getRow(); // Singel Row
	}

	public function addCinema($data) {

		$user_id = $data["user_id"];
		$name = $data["name"];
		$address = $data["address"];
		$city = $data["city"];
		$zipcode = $data["zipcode"];
		$province = $data["province"];
		$images = $data["images"];
		$description = $data["description"];
		$verified = $data["verified"];

						
		$query = "INSERT INTO cinemas ";
		$query .= "(user_id, ";
		$query .= "name, ";
		$query .= "address, ";
		$query .= "city, ";
		$query .= "zipcode, ";
		$query .= "province, ";
		$query .= "images, ";
		$query .= "description, ";
		$query .= "verified) ";

		$query .= "VALUES(:user_id, ";
		$query .= ":name, ";
		$query .= ":address, ";
		$query .= ":city, ";
		$query .= ":zipcode, ";
		$query .= ":province, ";
		$query .= ":images, ";
		$query .= ":description, ";
		$query .= ":verified) ";

		$this->database->prepare($query);

		$this->database->bind(":user_id", $user_id);
		$this->database->bind(":name", $name);
		$this->database->bind(":address", $address);
		$this->database->bind(":city", $city);
		$this->database->bind(":zipcode", $zipcode);
		$this->database->bind(":province", $province);
		$this->database->bind(":images", $images);
		$this->database->bind(":description", $description);
		$this->database->bind(":verified", $verified);

		if ($this->database->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function getCinema($user_id) {

		$query  = "SELECT * ";
		$query .= "FROM cinemas ";
		$query .= "WHERE user_id = :user_id ";

		$this->database->prepare($query);
		$this->database->bind(":user_id", $user_id);
	
		if ($this->database->getRow()) {
			return true;
		} else {
			return false;
		}
	}


	

}

