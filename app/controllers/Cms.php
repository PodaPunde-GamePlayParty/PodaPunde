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


    public function deleteHalls() {

      if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
          redirect("Cms/zalen");
      }

      $data = [
          "title" => "Overzicht",
          "cms" => $cms
      ];

      $hall_id = $_GET["hall_id"];
      $this->view("cms/bioscoop/delete", $data);

    }

    public function deleteHallConfirmed($hall_id) {

      $deleteConfirmed = $this->cmsModel->deleteHalls($hall_id);

      $data = [
          "title" => "Overzicht",
          "cms" => $cms
      ];

      $this->view("cms/bioscoop/delete", $data);
    }
}
