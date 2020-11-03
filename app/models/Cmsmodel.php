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
		$query .= "ORDER BY hall_number ";

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



	// delete hall
	public function deleteHall($hall_id) {

		$query  = "DELETE ";
		$query .= "FROM halls ";
		$query .= "WHERE hall_id = :hall_id ";

		$this->database->prepare($query);
		$this->database->bind(":hall_id", $hall_id);
		return $this->database->execute();
	}

	// insert hall
	public function addHall($data) {

		$query = "INSERT INTO halls (cinema_id, hall_number, quantity_chairs, wheelchair_accessible, screen_size, version) ";
		$query .= "VALUES(:cinema_id, :hall_number, :quantity_chairs, :wheelchair_accessible, :screen_size, :version) ";

		$this->database->prepare($query);
		$this->database->bind(":cinema_id", $data['cinema_id']);
		$this->database->bind(":hall_number", $data['hall_number']);
		$this->database->bind(":quantity_chairs", $data['quantity_chairs']);
		$this->database->bind(":wheelchair_accessible", $data['wheelchair_accessible']);
		$this->database->bind(":screen_size", $data['screen_size']);
		$this->database->bind(":version", $data['version']);

		if ($this->database->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// updates hall
	public function updateHall($data) {

		$hall_id = $_GET['hall_id'];

		$query = "UPDATE halls ";
		$query .= "SET cinema_id = :cinema_id, ";
		$query .= "hall_number = :hall_number, ";
		$query .= "quantity_chairs = :quantity_chairs, ";
		$query .= "wheelchair_accessible = :wheelchair_accessible, ";
		$query .= "screen_size = :screen_size, ";
		$query .= "version = :version ";
		$query .= "WHERE hall_id = $hall_id ";

		$this->database->prepare($query);
		$this->database->bind(":cinema_id", $data['cinema_id']);
		$this->database->bind(":hall_number", $data['hall_number']);
		$this->database->bind(":quantity_chairs", $data['quantity_chairs']);
		$this->database->bind(":wheelchair_accessible", $data['wheelchair_accessible']);
		$this->database->bind(":screen_size", $data['screen_size']);
		$this->database->bind(":version", $data['version']);

		if ($this->database->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}



	// getting al cinemas where verified = FALSE
	public function getUnVerifiedCinemas() {
		$verified = "FALSE";

		$query = "SELECT * ";
		$query .= "FROM cinemas ";
		$query .= "WHERE verified = :verified ";

		$this->database->prepare($query);
		$this->database->bind(":verified", $verified);
		$cinemas = $this->database->getArray(); // Multiple Rows

		if(!$cinemas) {
			return FALSE;
		} else {

			foreach ($cinemas as $cinema) {
				$user_id = $cinema->user_id;
				$userArray[$user_id] = $this->getUser($user_id);
			}

			return [
				"users" => $userArray,
				"cinemas" => $cinemas
			];
		}
	}



	// update user
	public function updateUser($user) {

		$user_id = $user->user_id;

		$username = $user->username;
		$password = $user->password;
		$email = $user->email;
		$firstname = $user->firstname;
		$preposition = $user->preposition;
		$lastname = $user->lastname;
		$authority_level = $user->authority_level;

		$query = "UPDATE users ";
		$query .= "SET username = :username, ";
		$query .= "password = :password, ";
		$query .= "email = :email, ";
		$query .= "firstname = :firstname, ";
		$query .= "preposition = :preposition, ";
		$query .= "lastname = :lastname, ";
		$query .= "authority_level = :authority_level ";

		$query .= "WHERE user_id = :user_id ";

		$this->database->prepare($query);
		$this->database->bind(":username", $username);
		$this->database->bind(":password", $password);
		$this->database->bind(":email", $email);
		$this->database->bind(":firstname", $firstname);
		$this->database->bind(":preposition", $preposition);
		$this->database->bind(":lastname", $lastname);
		$this->database->bind(":authority_level", $authority_level);

		$this->database->bind(":user_id", $user_id);

		if ($this->database->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	// update cinema
	public function updateCinema($cinema) {

		$cinema_id = $cinema->cinema_id;
		$user_id = $cinema->user_id;

		$name = $cinema->name;
		$address = $cinema->address;
		$city = $cinema->city;
		$zipcode = $cinema->zipcode;
		$province = $cinema->province;
		$images = $cinema->images;
		$description = $cinema->description;
		$verified = $cinema->verified;

		$query = "UPDATE cinemas ";
		$query .= "SET name = :name, ";
		$query .= "address = :address, ";
		$query .= "city = :city, ";
		$query .= "zipcode = :zipcode, ";
		$query .= "province = :province, ";
		$query .= "images = :images, ";
		$query .= "description = :description, ";
		$query .= "verified = :verified ";

		$query .= "WHERE user_id = :user_id ";
		$query .= "AND cinema_id = :cinema_id ";

		$this->database->prepare($query);
		$this->database->bind(":name", $name);
		$this->database->bind(":address", $address);
		$this->database->bind(":city", $city);
		$this->database->bind(":zipcode", $zipcode);
		$this->database->bind(":province", $province);
		$this->database->bind(":images", $images);
		$this->database->bind(":description", $description);
		$this->database->bind(":verified", $verified);

		$this->database->bind(":user_id", $user_id);
		$this->database->bind(":cinema_id", $cinema_id);

		if ($this->database->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}


	// make all variables TRUE / verified
	public function verify($user_id) {

		$user = $this->getUser($user_id); // get all data from user to update correctly
		$cinema = $this->getCinema($user_id); // get all data from cinema to update correctly

		$user->authority_level = 2;

		$cinema->user_id = $user->user_id;
		$cinema->verified = "TRUE";

		$updateUser = $this->updateUser($user);
		$updateCinema = $this->updateCinema($cinema);

		return [
			"user" => $updateUser,
			"cinema" => $updateCinema
		];
	}

	// Get alll availabilities from hall
	public function getAvailability($hall_id) {

		$query = "SELECT * ";
		$query .= "FROM availability ";
		$query .= "WHERE hall_id = :hall_id ";

		$this->database->prepare($query);
		$this->database->bind(":hall_id", $hall_id);
		$availabilty = $this->database->getArray();

		return $availabilty;
	}

	// Get availability from Id
	public function getAvailabilityById($availabilty_id) {

		$query = "SELECT * ";
		$query .= "FROM availability ";
		$query .= "WHERE availability_id = :availability_id ";

		$this->database->prepare($query);
		$this->database->bind(":availability_id", $availabilty_id);
		$availabilty = $this->database->getRow();

		return $availabilty;
	}

	// delete Availabillity
	public function deleteAvailability($availabilty_id) {

		$query  = "DELETE ";
		$query .= "FROM availability ";
		$query .= "WHERE availability_id = :availability_id ";

		$this->database->prepare($query);
		$this->database->bind(":availability_id", $availabilty_id);
		return $this->database->execute();
	}

}


	// insert availability
	public function addAvailability($data) {

		$query = "INSERT INTO ";
		$query .= "availability(hall_id, ";
		$query .= "date, ";
		$query .= "begin_time, ";
		$query .= "end_time, ";
		$query .= "play_time) ";
		$query .= "VALUES(:hall_id, ";
		$query .= ":date, ";
		$query .= ":begin_time, ";
		$query .= ":end_time, ";
		$query .= ":play_time) ";
		
		$this->database->prepare($query);
		$this->database->bind(":hall_id", $data['hall_id']);
		$this->database->bind(":date", $data['date']);
		$this->database->bind(":begin_time", $data['begin_time']);
		$this->database->bind(":end_time", $data['end_time']);
		$this->database->bind(":play_time", $data['play_time']);

		if ($this->database->execute()) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
