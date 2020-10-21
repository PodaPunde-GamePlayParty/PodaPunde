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

        $authority_level = $authCheck->authority_level;

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        if(($authCheck->authority_level == 2) || ($authCheck->authority_level == 3)) {

            $cms = $this->cmsModel->getCinemaByUserId($user_id);

            $data = [
                "title" => "Cms",
                "cms" => $cms
            ];

            $this->view("cms/bioscoop/overzicht", $data);
        } else {

            redirect("index");

        }
    }


}
