<?php
/*
 * Bioscopen Controller
 *
 * © 2020 Team PodaPunde
 *
 */

// Create bioscopen class
class Bioscopen extends Controller {

    public function __construct() {
    	$this->bioscoopModel = $this->model("Bioscoop");
    }

    // Bioscopen page
    public function index() {

        $bioscopen = $this->bioscoopModel->getBioscopen();

        $data = [
            "title" => "Bioscopen",
            "bioscopen" => $bioscopen
        ];

        $this->view("bioscopen", $data);
    }

    // Cinema Details Page
    public function cinemaDetails() {

        if((!isset($_GET["cinema_id"])) || (empty($_GET["cinema_id"]))) {
            redirect("bioscopen");
        }

        $cinema_id = $_GET["cinema_id"];

        $cinema = $this->bioscoopModel->getCinemaDetails($cinema_id);
        $cinema_halls = $this->bioscoopModel->getHalls($cinema_id);

        foreach ($cinema_halls as $hall) {

            $hall_id = $hall->hall_id;
            $tempAvailability = $this->bioscoopModel->getAvailability($hall_id);

            foreach ($tempAvailability as $availability) {
                $availability_id = $availability->availability_id;

                $availabilityArray[$availability_id] = $this->bioscoopModel->getAvailabilityById($availability_id);
            }


        }

        $data = [
            "title" => $cinema->name,
            "cinema" => $cinema,
            "cinema_halls" => $cinema_halls,
            "availability" => $availabilityArray
         ];

        $this->view("cinema/details", $data);
    }


    // overview page (logged in cinema not verified)
    public function overview() {

        $user_id = $_SESSION["userid"];
        $authCheck = $this->bioscoopModel->getAuthority($user_id);

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case UN_VERIFIED_CINEMA;
                $user = $this->bioscoopModel->getUser($user_id);
            break;

            case VERIFIED_CINEMA:
                redirect("cms/index");
            break;

            case CONTENT_MANAGER:
                redirect("cms/index");
            break;

            default:
                redirect("index");
            break;
        }

        $user_id_cinemas = $this->bioscoopModel->getCinema($user_id);

        if(!$user_id_cinemas) {
            $cinema_already_exist = FALSE;
        } else {
            $cinema_already_exist = TRUE;
        }

        $data = [
            "title" => "Overzicht",
            "user" => $user,
            "cinema_already_exist" => $cinema_already_exist
        ];

        $this->view("cinema/overview", $data);
    }

    // add cinema
    public function addCinema() {

        if(!isset($_SESSION["userid"])) {
            redirect("index");
        }
        $user_id = $_SESSION["userid"];
        $authCheck = $this->bioscoopModel->getAuthority($user_id);

        if($this->bioscoopModel->getCinema($user_id)) {
            $cinema_already_exist = TRUE;
        } else {
            $cinema_already_exist = FALSE;
        }

        if ($cinema_already_exist) {
            redirect("bioscopen/overview");
        }

        $authority_level = $authCheck->authority_level;

        switch ($authority_level) {
            case UN_VERIFIED_CINEMA;
                $un_verified = TRUE;
            break;

            case VERIFIED_CINEMA:
                redirect("cms/index");
            break;

            case CONTENT_MANAGER:
                redirect("cms/index");
            break;

            default:
                redirect("index");
            break;
        }

        if(!$un_verified) {
            redirect("cms/index");
        }

        if($_SERVER["REQUEST_METHOD"] == "GET") {

            // prepare register form
            $data = [
                "cinema_id" => "NULL",
                "user_id" => $user_id,
                "name" => "",
                "address" => "",
                "city" => "",
                "zipcode" => "",
                "province" => "",
                "images" => "",
                "description" => "",
                "verified" => "FALSE",
                "cinema_id_error" => "",
                "user_id_error" => "",
                "name_error" => "",
                "address_error" => "",
                "city_error" => "",
                "zipcode_error" => "",
                "province_error" => "",
                "images_error" => "",
                "description_error" => "",
                "verified_error" => ""
            ];

            $this->view("cinema/addCinema", $data);

        } else {


            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["images"]["tmp_name"]);

                if($check == FALSE) {
                    $data["images_error"] = "Bestandstype niet toegestaan! Kies uit een PNG, JPG, JPEG, GIF";
                }
            }

            $target_dir = UPLOAD_IMAGE;
            $filename = $_FILES["images"]["name"];
            $tmp_name = $_FILES["images"]["tmp_name"];
            $target_file = $target_dir . $filename;
            $image_file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $fileType = "." . $image_file_type;


            // Check if file already exists
            if (file_exists($target_file)) {

                $rename_filename = $filename;
                $fileTypeToReplace = "/." . $image_file_type . "/";
                $replace = "";
                $rename_filename = preg_replace($fileTypeToReplace, $replace, $rename_filename);
                $rename_filename = $rename_filename . "_";

                $unique = FALSE;
                $count = 1;

                do {
                    $temp_rename_filename = $rename_filename . $count . $fileType;
                    $target_file = $target_dir . $temp_rename_filename;

                    if (!file_exists($target_file)) {
                        $unique = TRUE;
                    }

                    $count++;

                } while (!$unique);
                $filename = $temp_rename_filename;

            }

            // check there is only an PNG JPG JPEG or GIF type
            switch ($image_file_type) {
                case 'jpg':
                    $data["images_error"] = "";
                break;

                case 'jpeg':
                    $data["images_error"] = "";
                break;

                case 'png':
                    $data["images_error"] = "";
                break;

                case 'gif':
                    $data["images_error"] = "";
                break;

                default:
                    $data["images_error"] = "Bestandstype niet toegestaan! Kies uit een PNG, JPG, JPEG, GIF";
                break;
            }


            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // load register form
            $data = [
                "cinema_id" => "NULL",
                "user_id" => $user_id,
                "name" => trim($_POST["name"]),
                "address" => trim($_POST["address"]),
                "city" => trim($_POST["city"]),
                "zipcode" => trim($_POST["zipcode"]),
                "province" => trim($_POST["province"]),
                "images" => $filename,
                "description" => trim($_POST["description"]),
                "verified" => "FALSE",
                "cinema_id_error" => "",
                "user_id_error" => "",
                "name_error" => "",
                "address_error" => "",
                "city_error" => "",
                "zipcode_error" => "",
                "province_error" => "",
                "images_error" => "",
                "description_error" => "",
                "verified_error" => ""
            ];

            if (!empty($data["cinema_id"])) {
                $data["cinema_id"] = "NULL";
            }
            if (empty($data["verified"])) {
                $data["verified"] = "FALSE";
            }
            if (empty($data["user_id"])) {
                $data["user_id"] = $user_id;
            }

            if (empty($data["name"])) {
                $data["name_error"] = "Voer een naam in";
            }
            if (empty($data["address"])) {
                $data["address_error"] = "Voer een adres in";
            }
            if (empty($data["city"])) {
                $data["city_error"] = "Voer een stad in";
            }
            if (empty($data["zipcode"])) {
                $data["zipcode_error"] = "Voer een postcode in";
            }
            if (empty($data["province"])) {
                $data["province_error"] = "Voer een provincie in";
            }
            if (empty($data["images"])) {
                $data["images_error"] = "Kies uit een bestand met type PNG, JPG, JPEG, GIF";
            }
            if (empty($data["description"])) {
                $data["description_error"] = "Voer een omscrijving in";
            }

            if (
                (empty($data["cinema_id_error"])) &&
                (empty($data["name_error"])) &&
                (empty($data["address_error"])) &&
                (empty($data["city_error"])) &&
                (empty($data["zipcode_error"])) &&
                (empty($data["province_error"])) &&
                (empty($data["images_error"])) &&
                (empty($data["description_error"]))) {


                // Insert all data in DB
                $result = $this->bioscoopModel->addCinema($data);

                // check if insert was succesfull
                if ($result) {
                    // move uploade files, also wordking with rename
                    rename($tmp_name, $target_file);

                    // redirect to overview page
                    redirect("bioscopen/overview");
                } else {
                    die("Account aanmaken mislukt");
                }

            } else {
                $this->view("cinema/addCinema", $data);
            }
        }
    }


}
