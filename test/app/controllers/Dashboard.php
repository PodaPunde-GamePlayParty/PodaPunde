<?php

// Create Dashboard class
class Dashboard extends Controller {

    // Dashboard page
    public function index() {
        $this->view("pages/index");
    }

    // Info page
    public function info() {
        $this->view("pages/info");
    }
        
}
