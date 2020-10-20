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

        if($authCheck->authority_level != 2) {
            redirect("index");
        }

        $cms = $this->cmsModel->getCinemaByUserId($user_id);

        $data = [
            "title" => "Overzicht",
            "cms" => $cms
        ];

        $this->view("/cms/bioscoop/index", $data);
    }

}
