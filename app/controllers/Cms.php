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

    // Bioscoop zalen overzicht pagina
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

    // Bioscoop zaal verwijderen pagina
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

    // Bioscoop zaal verwijderen actie pagina
    public function deleteHallConfirmed() {
      if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
          redirect("Cms/zalen");
      }

      $hall_id = $_GET["hall_id"];
      $hall = $this->cmsModel->getHall($hall_id);
      $deleteConfirmed = $this->cmsModel->deleteHall($hall_id);

      $authority = $_SESSION["authority"];

      switch ($authority) {
        case "2":
          redirect("cms/zalen");
        break;

        case "3":
          redirect("cms/cinemaDetails?cinema_id=" . $hall->cinema_id);
        break;

        default:
          redirect("cms/index");
        break;

      }
    }

    // list of all cinemas
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

    // Update/add Halls
    public function updateHalls() {

        $user_id = $_SESSION['userid'];
        $cinema = $this->cmsModel->getCinema($user_id);
        $cinema_id = $cinema->cinema_id;


        // Check for GET
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $hall_id = $_GET['hall_id'];

            $halls = $this->cmsModel->getHall($hall_id);

            // prepare form
            $data = [
                "hall_id" => $hall_id,
                "cinema_id" => $cinema_id,
                "hall_number" => $halls->hall_number,
                "quantity_chairs" => $halls->quantity_chairs,
                "wheelchair_accessible" => $halls->wheelchair_accessible,
                "screen_size" => $halls->screen_size,
                "version" => $halls->version,
                "hall_id_error" => "",
                "cinema_id_error" => "",
                "hall_number_error" => "",
                "quantity_chairs_error" => "",
                "wheelchair_accessible_error" => "",
                "screen_size_error" => "",
                "version_error" => ""
            ];

            // Validate
            // Word mee gegeven
            if (empty($data['hall_id'])) {
                $data['hall_id_error'] = "Vul zaalnummer in!";
            }

            if (empty($data['hall_number'])) {
                $data['hall_number_error'] = "Vul zaalnummer in!";
            }

            if (empty($data['quantity_chairs'])) {
                $data['quantity_chairs_error'] = "Vul het aantal stoelen in!";
            }

            if (empty($data['wheelchair_accessible'])) {
                $data['wheelchair_accessible_error'] = "Vul het aantal invalide stoelen in!";
            }

            if (empty($data['screen_size'])) {
                $data['screen_size_error'] = "Vul de schermgrote in!";
            }

            if (empty($data['version'])) {
                $data['version_error'] = "Vul het geluidssyteem in!";
            }

            // Check for errors
            if ((empty($data['hall_number_error'])) && (empty($data['quantity_chairs_error'])) &&
            (empty($data['wheelchair_accessible_error'])) && (empty($data['screen_size_error'])) && (empty($data['version_error']))) {

                // save data
                if ($this->cmsModel->updateHall($data)) {
                    redirect("cms/bioscoop/overzicht");
                } else {
                    die("Opslaan niet gelukt!");
                }
            } else {
                // Load view to display errors
                $this->view("cms/bioscoop/updateHalls", $data);
            }

        } else {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get Data
            $data = [
                "hall_id" => "",
                "cinema_id" => $cinema_id,
                "hall_number" => trim($_POST['hall_number']),
                "quantity_chairs" => trim($_POST['quantity_chairs']),
                "wheelchair_accessible" => trim($_POST['wheelchair_accessible']),
                "screen_size" => trim($_POST['screen_size']),
                "version" => trim($_POST['version']),
                "hall_id_error" => "",
                "cinema_id_error" => "",
                "hall_number_error" => "",
                "quantity_chairs_error" => "",
                "wheelchair_accessible_error" => "",
                "screen_size_error" => "",
                "version_error" => ""
            ];

            // Validate
            // Word mee gegeven
            if (empty($data['hall_id'])) {
                $data['hall_id_error'] = "Vul zaalnummer in!";
            }

            if (empty($data['hall_number'])) {
                $data['hall_number_error'] = "Vul zaalnummer in!";
            }

            if (empty($data['quantity_chairs'])) {
                $data['quantity_chairs_error'] = "Vul het aantal stoelen in!";
            }

            if (empty($data['wheelchair_accessible'])) {
                $data['wheelchair_accessible_error'] = "Vul het aantal invalide stoelen in!";
            }

            if (empty($data['screen_size'])) {
                $data['screen_size_error'] = "Vul de schermgrote in!";
            }

            if (empty($data['version'])) {
                $data['version_error'] = "Vul het geluidssyteem in!";
            }

            // Check for errors
            if ((empty($data['hall_number_error'])) && (empty($data['quantity_chairs_error'])) &&
            (empty($data['wheelchair_accessible_error'])) && (empty($data['screen_size_error'])) && (empty($data['version_error']))) {

                // save data
                if ($this->cmsModel->addHall($data)) {
                    redirect("cms/bioscoop/overzicht");
                } else {
                    die("Opslaan niet gelukt!");
                }
            } else {
                // Load view to display errors
                $this->view("cms/bioscoop/updateHalls", $data);
            }
        }


    }

}
