<?php
/*
 * Base Controller Load Models and Views
 *
 * © 2020 Team PodaPunde
 * 
 */

// Create class Controller
class Controller {

    // Load model
    public function model($model) {

        // Compose name
        $modelName = "../app/models/" . $model . ".php";

        // Check the model file
        if (file_exists($modelName)) {

            // Require the model to load
            require_once $modelName;

            // Instantiate the model
            return new $model();

        } else {
            // No model exists
            die("Model " . $modelName . " does not exists");
        }
    }

    // Load view with data
    public function view($view, $data = []) {

    // Compose name
    $viewName = "../app/views/" . $view . ".php";

        // Check the view file
        if (file_exists($viewName)) {

            // Require the view to load
            require_once $viewName;

        } else {
            // No view exists
            die("View " . $viewName . " does not exists");
        }
    }
}

?>
