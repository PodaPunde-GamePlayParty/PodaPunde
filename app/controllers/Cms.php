<?php
/*
 * Cms Controller
 *
 * © 2020 Team PodaPunde
 *
 */

// Create CMS class
class Cms extends Controller {

    public function __construct() {
        $this->cmsModel = $this->model("Cmsmodel");
    }

    // CMS page
    public function index() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case '2':
                $cms = $this->cmsModel->getCinemaByUserId($user_id);
            break;

            case '3':
                $cms = $this->cmsModel->getAllCinema();
            break;

            default:
                redirect("index");
            break;
        }

        $data = [
            "title" => "Overzicht",
            "cms" => $cms
        ];

        $this->view("cms/index", $data);
    }

    // Bioscoop overzicht pagina
    public function overzicht() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case '2':
                $cms = $this->cmsModel->getCinemaByUserId($user_id);
            break;

            default:
                redirect("index");
            break;
        }

        $data = [
            "title" => "Overzicht",
            "cms" => $cms
        ];

        $this->view("cms/bioscoop/overzicht", $data);

    }

    public function zalen() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case '2':
                $cms = $this->cmsModel->getCinemaByUserId($user_id);
            break;


            default:
                redirect("index");
            break;
        }

        $data = [
            "title" => "Overzicht",
            "cms" => $cms
        ];

        $this->view("cms/bioscoop/zalen", $data);
    }

    public function availability() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case '2':
                $cms = $this->cmsModel->getCinemaByUserId($user_id);
            break;


            default:
                redirect("index");
            break;
        }

        $data = [
            "title" => "Overzicht",
            "cms" => $cms
        ];

        $this->view("cms/bioscoop/availability", $data);
    }

    public function availabilityForm() {
        if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
            redirect("cms/availabilityForm");
        }

        $user_id = $_SESSION["userid"];
        $hall_id = $_GET["hall_id"];
        $hall = $this->cmsModel->getHall($hall_id);

        $data = [
            "title" => "Overzicht",
            "hall" => $hall
        ];

        $this->view("cms/bioscoop/availabilityForm", $data);
    }

    public function availabilityCommit() {
        if((!isset($_POST["date"])) || (empty($_POST["begin_time"]))) {
            redirect("cms/availability");
        }

        $hall_id = $_POST["hall_id"];
        $date = $_POST["date"];
        $begin_time = $_POST["begin_time"];
        $end_time = strtotime($begin_time) + 3600;
        var_dump($hall_id);


        $hall = $this->cmsModel->insertAvailability($hall_id, $begin_time, $end_time, $date);


        $this->view("cms/bioscoop/availabilityCommit");
    }

}
