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
    }