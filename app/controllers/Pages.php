<?php
class Pages extends Controller {

	public function index() {

		$data = [
			"title" => "Home",
			"text" => "Paragraph 1"
		];

		$this->view("pages/index", $data);
	}

	// contact page
    public function contact() {
        $this->view("pages/contact");
    }
}
?>
