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
        $cinema_id = $hall->cinema_id;
        $cinema = $this->cmsModel->getCinemaDetails($cinema_id);
        $data = [
            "title" => "Overzicht",
            "hall" => $hall,
            "cinema" => $cinema
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


    // add availability
    public function addAvailability() {

        $play_time = "00:00";
        $play_time = date('H:i',strtotime($play_time . "+2 hours"));


        if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
            redirect("cms");
        }

        $hall_id = $_GET["hall_id"];

        // Check for GET
        if ($_SERVER['REQUEST_METHOD'] == "GET") {

            // prepare form
            $data = [
                "hall_id" => $hall_id,
                "date" => "",
                "begin_time" => "",
                "hall_id_error" => "",
                "date_error" => "",
                "begin_time_error" => "",
            ];

            $this->view("cinema/addAvailability", $data);
        } else {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get Data
            $data = [
                "hall_id" => $hall_id,
                "date" => $_POST["date"],
                "begin_time" => $_POST["begin_time"],
                "hall_id_error" => "",
                "date_error" => "",
                "begin_time_error" => ""
            ];

            // Validate
            if (empty($data['hall_id'])) {
                $data['hall_id_error'] = "Er is een fout opgetreden!";
            }

            if (empty($data['date'])) {
                $data['date_error'] = "Kies een datum!";
            }

            if (empty($data['begin_time'])) {
                $data['begin_time_error'] = "Kies een tijd om te beginnen!";
            }


            // Check for errors
            if(
                (empty($data['hall_id_error'])) && 
                (empty($data['date_error'])) && 
                (empty($data['begin_time_error']))) {


                $begin_time = $data["begin_time"];
                $end_time = $begin_time;
                $end_time = date('H:i',strtotime($end_time . "+2 hours"));
                    
                    
                $hall_id = $hall_id;
                $date = $data["date"];
                $play_time = $play_time;

                $data = [
                    "hall_id" => $hall_id,
                    "date" => $date,
                    "begin_time" => $begin_time,
                    "end_time" => $end_time,
                    "play_time" => $play_time
                ];

                // save data
                if ($this->cmsModel->addAvailability($data)) {
                    $redirect = "cms/availability?hall_id=" . $hall_id;
                    redirect($redirect);
                } else {
                    die("Opslaan niet gelukt!");
                }
            } else {
                // Load view to display errors
                $this->view("cinema/addAvailability", $data);
            }
        }

    }

    // Read availability
    public function availability() {

        if((!isset($_GET["hall_id"])) || (empty($_GET["hall_id"]))) {
            redirect("cms");
        }

        $hall_id = $_GET["hall_id"];
        $hall = $this->cmsModel->getHall($hall_id);
        $availability = $this->cmsModel->getAvailability($hall_id);

        $data = [
            "title" => "zaal bescikbaarheid",
            "hall" => $hall,
            "availability" => $availability
        ];

        $this->view("cms/bioscoop/availability", $data);
    }

    // Beschikbaarheid zaal verwijderen pagina
    public function deleteAvailability() {
        if((!isset($_GET["availability_id"])) || (empty($_GET["availability_id"]))) {
            redirect("Cms/availability");
        }

        $availabilty_id = $_GET["availability_id"];
        $availabilty = $this->cmsModel->getAvailabilityById($availabilty_id);
        $hall_id = $availabilty->hall_id;
        $hall = $this->cmsModel->getHall($hall_id);
        $cinema_id = $hall->cinema_id;
        $cinema = $this->cmsModel->getCinemaDetails($cinema_id);
        $data = [
            "title" => "Overzicht",
            "availability" => $availabilty,
            "cinema" => $cinema,
            "hall" => $hall
        ];

        $this->view("cms/bioscoop/deleteAvailability", $data);
    }



    // Beschikbaarheid zaal verwijderen actie pagina
    public function deleteAvailabilityConfirmed() {
        if((!isset($_GET["availability_id"])) || (empty($_GET["availability_id"]))) {
            redirect("Cms/zalen");
        }

        $availabilty_id = $_GET["availability_id"];
        $availabilty = $this->cmsModel->getAvailability($hall_id);
        $deleteAvailability = $this->cmsModel->deleteAvailability($availabilty_id);

        $authority = $_SESSION["authority"];

        switch ($authority) {
            case VERIFIED_CINEMA:
                redirect("cms/zalen");
            break;

            default:
                redirect("cms/index");
            break;
        }
    }



}
