<?php
    class Pages extends Controller {
        public function __construct(){
            echo 'Pages controller has been loaded <br>';

            $this->postModel = $this->model('post');
        }

        public function index(){
            $data = ['title' => 'Welcome'];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = ['title' => 'About Me'];
            
            $this->view('pages/about', $data);
        }
    }