<?php
class Users extends Controller {
	
	public function __construct() {
		$this->userModel = $this->model("User");
	}

	public function index() {

		// $userRow = $this->userModel->getRowForId(5);
		
		$data = [
			"title" => "Dit is de titel",
			"content" => "Dit is dynamische content",
			"userRow" => $userRow
		];

		$this->view("users/index", $data);
	}

	public function overview() {

		// $users = $this->userModel->getNames();

		$data = [
			"title" => "Dit is het overview",
			"plop" => "Dit is plop",
			"users" => $users
		];

		$this->view("users/overview", $data);
	}

}
?>