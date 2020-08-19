<?php
    class Pages extends Controller {
        public function __construct(){
            echo 'Pages controller has been loaded <br>';
        }

        public function index(){
            $this->view('pages/index');
        }

        public function about(){
            $this->view('pages/about');
        }
    }