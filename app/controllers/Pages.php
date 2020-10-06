<?php
class Pages extends Controller {
	
	public function index() {

		$data = [
			"title" => "Home",
			"text" => "Paragraph 1"
		];
				
		$this->view("pages/index", $data);
	}

	public function reservation() {

		$data = [
			"title" => "Reservering",
			"text" => "Paragraph 1"
		];
				
		$this->view("pages/reservation", $data);
	}

	public function bioscoop() {

		$data = [
			"title" => "Bioscoop",
			"text" => "Paragraph 1"
		];
				
		$this->view("pages/bioscoop", $data);
	}

	public function info() {

		$data = [
			"title" => "Info",
			"text" => "Paragraph 1"
		];
				
		$this->view("pages/info", $data);
	}

	public function aboutUs() {

		$data = [
			"title" => "Over Ons",
			"text" => "Over GamePlayParty"
		];
				
		$this->view("pages/aboutUs", $data);
	}

	public function contact() {

		$data = [
			"title" => "Contact",
			"text" => "Paragraph 1"
		];
				
		$this->view("pages/contact", $data);
	}
}
?>