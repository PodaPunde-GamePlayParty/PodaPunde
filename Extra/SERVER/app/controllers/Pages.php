<?php
class Pages extends Controller {
	
	public function index() {

		$data = [
			"title" => "Info",
			"text" => "Paragraph 1"
		];
				
		$this->view("pages/index", $data);
	}
}
?>