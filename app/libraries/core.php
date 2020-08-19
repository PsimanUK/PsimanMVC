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

            }

            public function getUrl(){
                if(isset($_GET['url'])){
                    $currentUrl = rtrim($_GET['url'],'/');
                    $currentUrl = filter_var($currentUrl, FILTER_SANITIZE_URL);
                    $currentUrl = explode('/', $currentUrl);
                    return $currentUrl;
                } 
            }
    }