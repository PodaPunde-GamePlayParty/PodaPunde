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

                $data = [
                    "title" => "Overzicht",
                    "cms" => $cms
                ];
                $this->view("cms/bioscoop/index", $data);
            break;

            case '3':
                $cms = $this->cmsModel->getAllCinemas();

                $data = [
                    "title" => "Overzicht",
                    "cms" => $cms
                ];
                $this->view("cms/index", $data);
            break;

            default:
                redirect("index");
            break;
        }
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


    // Cinema Details Page
    public function cinemaDetails() {
       
        if((!isset($_GET["cinema_id"])) || (empty($_GET["cinema_id"]))) {
            redirect("bioscopen");
        }

        $cinema_id = $_GET["cinema_id"];

        $cinema = $this->cmsModel->getCinemaDetails($cinema_id);
        $cinema_halls = $this->cmsModel->getHalls($cinema_id);

        $data = [
            "title" => $cinema->name,
            "cinema" => $cinema,
            "cinema_halls" => $cinema_halls
        ];

        $this->view("cinema/details", $data);
    }

}
