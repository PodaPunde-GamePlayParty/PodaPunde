<?php
/*
 * Authentication Controller
 *
 * © 2020 Team PodaPunde
 *
 */

// Create Login class
class Authentication extends Controller {

    public function __construct() {

        $this->userModel=$this->model("User");

    }

    // Login page
    public function index() {

      if($_SERVER['REQUEST_METHOD'] == "GET") {

        // prepare login form
        $data = [
          "email" => "podapunde",
          "password" => "PodaPunde2020",
          "email_error" => "",
          "password_error" => ""
        ];

        $this->view("authentication/login", $data);

      } else {

          $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

          //  Load form
          $data = [
            "email" => trim($_POST['email']),
            "password" => trim($_POST['password']),
            "email_error" => "",
            "password_error" => ""
          ];

          if (empty($data['email'])) {
              $data['email_error'] = "Geef het email adres in";
          }

          if (empty($data['password'])) {
              $data['password_error'] = "Geef het wachtwoord in";
          }

          if ((empty($data['email_error'])) && (empty($data["password_error"]))) {

            // use Email or username to login
            $posted = $data["email"];
            $mailCharacter = "/@/";
            $temp_posted = $posted;
            $temp_posted = preg_replace($mailCharacter,"",$temp_posted);

            if($temp_posted === $posted) {
                $use_username = "YES";
            } else {
                $use_username = "NO";
            }


            // encrypt password
            $data['password'] = encrypt($data['password']);

            // select function(query) on the login method
            switch($use_username) {
                case "YES":
                    $loggedInUser = $this->userModel->loginUsername($data["email"],$data['password']); //login with username
                break;

                case "NO":
                    $loggedInUser = $this->userModel->login($data["email"],$data['password']); // login with email
                break;
            }

            if ($loggedInUser) {

                $_SESSION['userid'] = $loggedInUser->user_id;
                $_SESSION['authority'] = $loggedInUser->authority_level;
                $_SESSION['firstname'] = $loggedInUser->firstname;

                $authority_level = $loggedInUser->authority_level;

                switch ($authority_level) {
                    case UN_VERIFIED_CINEMA:
                        redirect("bioscopen/overview");
                    break;

                    case VERIFIED_CINEMA:
                        redirect("cms/index");
                    break;

                    case CONTENT_MANAGER:
                        redirect("cms/index");
                    break;

                    default:
                        redirect("pages/index");
                    break;
                }

              } else {

                  $data["email_error"] = "Email/wachtwoord combinatie is niet correct";
                  $data["password_error"] = "Email/wachtwoord combinatie is niet correct";
                  $data["password"] = "";
                  $this->view("authentication/login", $data);
              }

          } else {
              $this->view("authentication/login", $data);
          }
      }
    }

    // log Out
    public function logOut() {

        $this->userModel->logOut();

        redirect("index");

    }

    // register account
    public function register() {

        if($_SERVER["REQUEST_METHOD"] == "GET") {

            // prepare register form
            $data = [
                "user_id" => "",
                "username" => "",
                "password" => "",
                "email" => "",
                "firstname" => "",
                "preposition" => "",
                "lastname" => "",
                "authority_level" => "",
                "user_id_error" => "",
                "username_error" => "",
                "password_error" => "",
                "email_error" => "",
                "firstname_error" => "",
                "preposition_error" => "",
                "lastname_error" => "",
                "authority_level_error" => ""
            ];
            $this->view("authentication/registerAccount", $data);
        } else {

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // load register form
            $data = [
                "user_id" => "",
                "username" => trim($_POST["username"]),
                "password" => trim($_POST["password"]),
                "email" => trim($_POST["email"]),
                "firstname" => trim($_POST["firstname"]),
                "preposition" => trim($_POST["preposition"]),
                "lastname" => trim($_POST["lastname"]),
                "authority_level" => trim($_POST["authority_level"]),
                "user_id_error" => "",
                "username_error" => "",
                "password_error" => "",
                "email_error" => "",
                "firstname_error" => "",
                "preposition_error" => "",
                "lastname_error" => "",
                "authority_level_error" => ""
            ];

            if (!empty($data["user_id"])) {
                $data["user_id"] = "NULL";
            }
            if (empty($data["username"])) {
                $data["username_error"] = "Voer een gebruikersnaam in";
            }
            if (empty($data["password"])) {
                $data["password_error"] = "Voer een wachtwoord in";
            }
            if (empty($data["email"])) {
                $data["email_error"] = "Voer je email adres in";
            }
            if (empty($data["firstname"])) {
                $data["firstname_error"] = "Voer je voornaam in";
            }
            if (empty($data["lastname"])) {
                $data["lastname_error"] = "voer je achternaam in";
            }
            if (empty($data["authority_level"])) {
                $data["authority_level_error"] = "Geef het type account aan";
            }

            if (
                (empty($data["username_error"])) && 
                (empty($data["password_error"])) && 
                (empty($data["email_error"])) && 
                (empty($data["firstname_error"])) && 
                (empty($data["lastname_error"])) && 
                (empty($data["authority_level_error"]))) {

                if (empty($data["preposition"])) {
                    $data["preposition"] = "NULL";
                }

                $data["password"] = encrypt($data["password"]);

                // set string with type of account/authority to integer
                switch($data["authority_level"]) {
                    case "Visitor":
                        $data["authority_level"] = VISITOR; // bezoeker
                    break;

                    case "Cinema":
                        $data["authority_level"] = UN_VERIFIED_CINEMA; // nog geen verified account
                    break;

                    default:
                        redirect("authentication/registerAccount");
                    break;
                }

                // Insert all data in DB
                $result = $this->userModel->registerAccount($data);

                // check if insert was succesfull
                if ($result) {
                    
                    $loggedInUser = $this->userModel->login($data);

                    if ($loggedInUser) {

                        $_SESSION['userid'] = $loggedInUser->user_id;
                        $_SESSION['authority'] = $loggedInUser->authority_level;
                        $_SESSION['firstname'] = $loggedInUser->firstname;
        
                        $authority_level = $loggedInUser->authority_level;
        
                        switch ($authority_level) {
                            case UN_VERIFIED_CINEMA:
                                redirect("bioscopen/overview");
                            break;

                            case VERIFIED_CINEMA:
                                redirect("cms/index");
                            break;
        
                            case ADMINISTRATOR:
                                redirect("cms/index");
                            break;
        
                            default:
                                redirect("pages/index");
                            break;
                        }
        
                      } else {
        
                          $data["email_error"] = "Email/wachtwoord combinatie is niet correct";
                          $data["password_error"] = "Email/wachtwoord combinatie is niet correct";
                          $data["password"] = "";
                          $this->view("authentication/login", $data);
                      }

                } else {
                    die("Account aanmaken mislukt");
                }

            } else {
              $this->view("authentication/registerAccount", $data);
          }
        }
    }


}
