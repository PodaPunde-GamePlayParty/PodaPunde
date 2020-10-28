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
            case VERIFIED_CINEMA:
                $cms = $this->cmsModel->getCinemaByUserId($user_id);
            break;

            case CONTENT_MANAGER:
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
            case VERIFIED_CINEMA:
                $cms = $this->cmsModel->getCinemaByUserId($user_id);
            break;

            case CONTENT_MANAGER:
                $cms = $this->cmsModel->getAllCinemas();
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
            case VERIFIED_CINEMA:
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
            case VERIFIED_CINEMA:
                redirect("cms/zalen");
            break;

            case CONTENT_MANAGER:
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



    // Create Halls
    public function addHall() {

        $user_id = $_SESSION['userid'];
        $cinema = $this->cmsModel->getCinema($user_id);
        $cinema_id = $cinema->cinema_id;

        // Check for GET
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            // prepare form
            $data = [
                "hall_id" => "",
                "cinema_id" => $cinema_id,
                "hall_number" => "",
                "quantity_chairs" => "",
                "wheelchair_accessible" => "",
                "screen_size" => "",
                "version" => "",
                "hall_id_error" => "",
                "cinema_id_error" => "",
                "hall_number_error" => "",
                "quantity_chairs_error" => "",
                "wheelchair_accessible_error" => "",
                "screen_size_error" => "",
                "version_error" => ""
            ];

            $this->view("cms/bioscoop/updateHalls", $data);
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
                    redirect("cms/zalen");
                } else {
                    die("Opslaan niet gelukt!");
                }
            } else {
                // Load view to display errors
                $this->view("cms/bioscoop/createHalls", $data);
            }
        }
    }



    // Update Halls
    public function updateHalls() {

        $user_id = $_SESSION['userid'];
        $cinema = $this->cmsModel->getCinema($user_id);
        $cinema_id = $cinema->cinema_id;

        // Check for GET
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            $hall_id = $_GET['hall_id'];

            $hall = $this->cmsModel->getHall($hall_id);

            // prepare form
            $data = [
                "hall_id" => $hall_id,
                "cinema_id" => $cinema_id,
                "hall_number" => $hall->hall_number,
                "quantity_chairs" => $hall->quantity_chairs,
                "wheelchair_accessible" => $hall->wheelchair_accessible,
                "screen_size" => $hall->screen_size,
                "version" => $hall->version,
                "hall_id_error" => "",
                "cinema_id_error" => "",
                "hall_number_error" => "",
                "quantity_chairs_error" => "",
                "wheelchair_accessible_error" => "",
                "screen_size_error" => "",
                "version_error" => ""
            ];

            $this->view("cms/bioscoop/updateHalls", $data);
        } else {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get Data
            $data = [
                "hall_id" => $hall_id,
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
                if ($this->cmsModel->updateHall($data)) {
                    redirect("cms/zalen");
                } else {
                    die("Bewerken niet gelukt!");
                }
            } else {
                // Load view to display errors
                $this->view("cms/bioscoop/updateHalls", $data);
            }
        }
    }



    // Verify cinemas that are unverified
    public function verifyCinema() {
        if(!isset($_SESSION["authority"])) {
            redirect("index");
        }
        $user_id = $_SESSION["userid"];
        $authority = $_SESSION["authority"];

        switch ($authority) {
            case VERIFIED_CINEMA:
                redirect("cms/index");
            break;

            case CONTENT_MANAGER:
                $info = $this->cmsModel->getUnVerifiedCinemas();
                if(!$info) {
                    $data["empty"] = TRUE;
                } else {
                    $data["empty"] = FALSE;
                }
                $data["users"] = $info["users"];
                $data["cinemas"] = $info["cinemas"];
            break;

            default:
                redirect("cms/index");
            break;
        }


        $data["title"] = "Bioscopen Verifiëren";

        $this->view("cms/admin/verifyCinemas", $data);
    }


    // verify cinema action
    public function verifyCinemaAction() {
        if(!isset($_SESSION["authority"])) {
            redirect("index");
        }
        if((!isset($_GET["cinema_id"])) || (empty($_GET["cinema_id"]))) {
            echo "line: 427 Cms controller<br>";
            exit();
            redirect("cms/verifyCinema");
        }
        $user_id = $_SESSION["userid"];
        $authority = $_SESSION["authority"];
        $cinema_id = $_GET["cinema_id"];

        switch ($authority) {
            case VERIFIED_CINEMA:
                redirect("cms/index");
            break;

            case CONTENT_MANAGER:
                $authAdmin = TRUE;
            break;

            default:
                redirect("cms/index");
            break;
        }

        if(!$authAdmin) {
            redirect("cms/index");
        }

        $cinema = $this->cmsModel->getCinemaDetails($cinema_id);
        $user_id_cinema = $cinema->user_id;

        $verify = $this->cmsModel->verify($user_id_cinema);
        $verifyUser = $verify["user"];
        $verifyCinema = $verify["cinema"];

        if(($verifyUser) && ($verifyCinema)) {
            redirect("cms/verifyCinema");
        } else {

            $data["title"] = "Mislukt, de opdracht om de bioscoop goed te keuren is mislukt, meld dit eventueel aan de ontwikkelaar";

            $this->view("cms/admin/verifyCinemas", $data);
        }
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

        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $data = [
                "hall_id" => $hall_id,
                "date" => "",
                "time" => "",
                "date_error" => "",
                "time_error" => "",
            ];

            $this->view("cms/bioscoop/availabilityCommit");
        } else {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                "hall_id" => $hall_id,
                "date" => trim($_POST['date']),
                "time" =>   trim($_POST['time']),
                "date_error" => "",
                "time_error" => "",
            ];

            if (empty($date['date'])) {
                $date['date_error'] = "Vul een datum in!";
            }

            if (empty($date['time'])) {
                $date['time_error'] = "Vul een tijd in!";
            }

            if ((empty($data['date'])) && (empty($data['time'])) {
                if ($this->cmsModel->) {
                    // code...
                }
            }
        }

        $this->view("cms/bioscoop/availabilityForm", $data);
    }

    public function availabilityCommit() {
        if((!isset($_POST["date"])) || (empty($_POST["begin_time"]))) {
            redirect("cms/availability");
        }

        $hall_id = $_POST["hall_id"];
        $date = $_POST["date"];
        $begin_time = $_POST["begin_time"];
        $end_time = Date('H:i:s', strtotime('+2 hours',strtotime($begin_time)));


        $hall = $this->cmsModel->insertAvailability($hall_id, $begin_time, $end_time, $date);

        $this->view("cms/bioscoop/availabilityCommit");

        redirect("cms/availability");
    }

}
