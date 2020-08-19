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

                // Check to see if second part of URL exists
                if(isset($currentUrl[1])){
                    echo '<br> Changing current method <br>';
                   // Check to see if method is part of the controller
                   if(method_exists($this->currentController, $currentUrl[1])){
                        $this->currentMethod = $currentUrl[1];
                   } 
                   // Unsets index 1
                   unset($currentUrl[1]);
                }

                echo 'The current method is ' . $this->currentMethod . '<br>';
                echo 'The current URL is ' . $currentUrl . '<br>';
                // Get parameters from URL
                $this->params = $currentUrl != [0=>'nothing'] ? array_values($currentUrl) : [];

                echo 'The current parameters are ' . $this->params . '<br>';

                // Call a callback function with an array of parameters
                call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
            }

            public function getUrl(){
                if(isset($_GET['url'])){
                    $currentUrl = rtrim($_GET['url'],'/');
                    $currentUrl = filter_var($currentUrl, FILTER_SANITIZE_URL);
                    $currentUrl = explode('/', $currentUrl);
                    return $currentUrl;
                } else {
                    echo 'Did not find any URL so returning nothing...';
                    return [0=>'nothing'];
                }
            }
    }