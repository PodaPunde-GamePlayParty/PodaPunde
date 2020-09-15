<?php
/*
 * PDO Database Class
 * 
 * (C) 2020 Pentasol
 */
class Database {

	private $dbaseHandler;
	private $statementHandler;
	private $error; // message

	public function __construct() {

		$dsn = "mysql:host=" . DBHOST . ";dbname=". DBNAME;

		$options = array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		try {
			$this->dbaseHandler = new PDO($dsn, DBUSER, DBPASS, $options);
		} catch(PDOException $e) {
			$this->error = $e->getMessage();
			echo $this->error; // Production remove
		}
	}

	public function prepare($query) {
		$this->statementHandler = $this->dbaseHandler->prepare($query);
	}

	public function bind($name, $value, $type = null) {

		if(is_null($type)) {
			switch(true) { // Check that function returns true
				case is_int($value): 
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
					break;
			}
		}

		$this->statementHandler->bindValue($name, $value, $type);
	}

	// EXECUTE for INSERT/DELETE/UPDATE
	public function execute() {
		return $this->statementHandler->execute();
	}

	// SELECT MULTIPLE ROWS
	public function getArray() {
		$this->execute();
		return $this->statementHandler->fetchAll(PDO::FETCH_OBJ);
	}

	// SELECT ONE ROW
	public function getRow() {
		$this->execute();
		return $this->statementHandler->fetch(PDO::FETCH_OBJ);
	}

	public function rowCount() {
		return $this->statementHandler->rowCount();
	}
}