<?php
/*
 * Bioscopen Controller
 *
 * © 2020 Team PodaPunde
 * 
 */

// Create bioscopen class
class Bioscopen extends Controller {

    public function __construct() {
    	$this->bioscoopModel = $this->model("Bioscoop");
    }

    // Bioscopen page
    public function index() {

        $bioscopen = $this->bioscoopModel->getBioscopen();

        $data = [
            "title" => "Bioscopen",
            "bioscopen" => $bioscopen
        ];

        $this->view("bioscopen", $data);
    }

}
