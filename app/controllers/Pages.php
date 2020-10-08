<?php
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
}
?>
