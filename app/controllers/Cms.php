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

    // CMS page
    public function index() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->cmsModel->getAuthority($user_id);

        if(($authCheck->authority_level == 2) || ($authCheck->authority_level == 3)) {

            $cms = $this->cmsModel->getCinemaByUserId($user_id);

            $data = [
                "title" => "Cms",
                "cms" => $cms
            ];

            $this->view("cms/index", $data);
        } else {

            redirect("index");

        }
    }

    // Bioscoop overzicht pagina
    public function overzicht() {

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
