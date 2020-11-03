<?php
/*
 * Pages Controller
 *
 * © 2020 Team PodaPunde
 *
 */

// create class Pages
class Pages extends Controller {

	public function index() {

		$data = [
			"title" => "Info",
			"text" => "Paragraph 1"
		];

		$this->view("index", $data);
	}

	// contact page
 	public function contact() {
    	$this->view("pages/contact");
  	}

	public function aboutUs() {

		$data = [
			"title" => "Over Ons",
			"text" => "Over GamePlayParty"
		];

		$this->view("pages/aboutUs", $data);
	}

	public function privacypolicy() {

		$data = [
			"title" => "Privacybeleid",
			"text" => "Over GamePlayParty"
		];

		$this->view("pages/privacypolicy", $data);
	}

	public function cookiepolicy() {

		$data = [
			"title" => "Cookiebeleid",
			"text" => "Over GamePlayParty"
		];

		$this->view("pages/cookiepolicy", $data);
	}

}
?>
