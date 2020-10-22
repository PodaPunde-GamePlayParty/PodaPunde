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

        //  prepare login form
        $data = [
          "email" => "jaarbeursutrecht@kinepolis.nl",
          "password" => "bioscoop",
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
                    case '2':
                        redirect("cms/index");
                    break;

                    case '3':
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

        redirect("authentication/login");

    }


}
