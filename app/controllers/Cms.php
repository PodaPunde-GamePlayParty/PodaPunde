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
                $user = $this->cmsModel->getUser($user_id);
                $cms = $this->cmsModel->getAllCinemas();

                $data["user"] = $user;
            break;

            default:
                redirect("index");
            break;
        }

        $data["title"] = "Overzicht";
        $data["cms"] = $cms;

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


    public function deleteHall() {

      if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
          redirect("Cms/zalen");
      }

      $hall_id = $_GET["hall_id"];
      $hall = $this->cmsModel->getHall($hall_id);
      $data = [
          "title" => "Overzicht",
          "hall" => $hall
      ];

      $this->view("cms/bioscoop/delete", $data);

    }

    public function deleteHallConfirmed() {
      if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
          redirect("Cms/zalen");
      }

      $hall_id = $_GET["hall_id"];
      $deleteConfirmed = $this->cmsModel->deleteHall($hall_id);
      if($deleteConfirmed = TRUE) {
        echo "Zaal succesvol verwijderd.";
      } else {
        echo "Er is een fout opgetreden bij het uitvoeren van het verwijderproces.";
      }
      $this->view("cms/bioscoop/overzicht");
    }

    public function cinemaList() {
        $cinemaList = $this->cmsModel->getAllCinemas();

        $data = [
            "title" => "Lijst van alle bioscopen",
            "cinemaList" => $cinemaList
        ];

        $this->view("cms/admin/cinemaList", $data);
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

        $this->view("cms/admin/cinemaDetails", $data);
    }

}
