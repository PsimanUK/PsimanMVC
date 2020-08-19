<?php
    // Base controller which loads models and views

    class Controller {
        // Load model
        public function model($model){
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // Instantiate model
            return new $model();
        }

        // Load view
        public function view($view, $data = []){
            // Check view file exists
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else {
                // When view does not exist
                die('View does not exist');
            }
        }
    }