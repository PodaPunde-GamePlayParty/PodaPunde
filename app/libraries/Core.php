<?php
class Core
{
    // Core properties
    // Url parameters will be stored here if none given then use default properties
    protected $currentController = "Pages";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct()
    {
        // Break argument string in array
        $url = $this->getUrl();

        // Check for 1st part if the url: localhost/mm/pages
        if (isset($url[0])) {

            // Prepare the class name
            $controller = ucwords(strtolower($url[0]));

            // Check if controller exists
            if (file_exists("../app/controllers/" . $controller . ".php")) {

                // If exists, set as controller
                $this->currentController = $controller;

                // Unset the first word
                unset($url[0]);
            }
        }

        // Require the controller
        require_once "../app/controllers/" . $this->currentController . ".php";

        // Instantiate controller class
        $this->currentController = new $this->currentController;

        // Check for 2nd part if the url: localhost/mm/pages/about
        if (isset($url[1])) {

            // Prepare the method name
            $method = strtolower($url[1]);

            // check if methed exits in the currentController
            if (method_exists($this->currentController, $method)) {

                $this->currentMethod = $method;

                // Unset the second word
                unset($url[1]);
            }
        }

        // Move other params from URL to params array
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    // Transforms the url string from the $_GET into array items
    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/"); // Removes slashes from end of url
            $url = filter_var($url, FILTER_SANITIZE_URL); // Removes any illegal characters example: @$!
            $url = explode("/", $url); // Converts the url to a array based on where slashes are
            return $url;
        }
    }
}
