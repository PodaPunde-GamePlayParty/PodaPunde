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

              $data['password'] = encrypt($data['password']);

              $loggedInUser = $this->userModel->login($data["email"],$data['password']);

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
