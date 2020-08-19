<?php
    // App Core Class
    // Creates URL and loads core controller
    // URL FORMAT - /controller/method/params

    class Core {
            protected $currentController = 'Pages';
            protected $currentMethod = 'index';
            protected $params = [];

            public function __construct(){
                // print_r($this->getUrl());

                $currentUrl = $this->getUrl();
                echo '<br> The First Section of the Current URL is ' . $currentUrl[0] . '<br>';

                if(file_exists('../app/controllers/' . ucwords($currentUrl[0]) . '.php')){
                    echo '<br> Changing current controller <br>';
                    // Sets current controller if the first section of the URL is in the controllers folder
                    $this->currentController = ucwords($currentUrl[0]);
                    // Unsets the 0 index
                    unset($currentUrl[0]);
                }
                // Require the controller
                require_once '../app/controllers/' . $this->currentController . '.php';

                // Instantiate the controller class
                $this->currentController = new $this->currentController;
            }

            public function getUrl(){
                if(isset($_GET['url'])){
                    $currentUrl = rtrim($_GET['url'],'/');
                    $currentUrl = filter_var($currentUrl, FILTER_SANITIZE_URL);
                    $currentUrl = explode('/', $currentUrl);
                    return $currentUrl;
                } else {
                    return [0=>'nothing'];
                }
            }
    }