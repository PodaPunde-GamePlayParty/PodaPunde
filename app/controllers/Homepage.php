<?php

// Create Dashboard class
class Homepage extends Controller {

    public function __construct() {
		$this->cinemaModel = $this->model("Homepage");
	}

    // Dashboard page
    public function index() {
        $this->view("pages/index", $data);
    }


    public function homepage() {

        $cinemas = $this->cinemaModel->getCinemas();
    	$data = [
    		"cinemas" => $cinemas
    	];


    }
}
