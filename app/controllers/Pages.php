<?php
    class Pages extends Controller {
        public function __construct(){
            echo 'Pages controller has been loaded <br>';
        }

        public function index(){
            echo 'Using the index method <br>';
        }

        public function about($id){
            echo 'Using the about method <br>';
            if($id){
                echo 'And the id is ' . $id . '<br>';
            }
        }
    }