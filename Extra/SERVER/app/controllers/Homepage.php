<?php

// Create Dashboard class
class Homepage extends Controller {

    // Dashboard page
    public function index() {
        $this->view("pages/index");
    }
        
}