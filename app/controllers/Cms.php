<?php
/*
 * Cms Controller
 *
 * © 2020 Team PodaPunde
 * 
 */

// Create bioscopen class
class Cms extends Controller {

    public function __construct() {
        $this->cmsModel = $this->model("Cmsmodel");
    }

    // Bioscopen page
    public function index() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case '1':
                redirect("index");
            break;

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

        $this->view("/cms/bioscoop/index", $data);
    }

}
