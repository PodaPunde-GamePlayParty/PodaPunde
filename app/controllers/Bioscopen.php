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

    // Cinema Details Page
    public function cinemaDetails() {
    
        if((!isset($_GET["cinema_id"])) || (empty($_GET["cinema_id"]))) {
            redirect("bioscopen");
        }

        $cinema_id = $_GET["cinema_id"];

        $cinema = $this->bioscoopModel->getCinemaDetails($cinema_id);
        $cinema_halls = $this->bioscoopModel->getHalls($cinema_id);

        $data = [
            "title" => $cinema->name,
            "cinema" => $cinema,
            "cinema_halls" => $cinema_halls
        ];

        $this->view("cinema/details", $data);
    }
    

}
