<?php

// Create Contact class
class Contact extends Controller {

    // contact page
    public function index() {
        $this->view("pages/contact");
    }
        
}
