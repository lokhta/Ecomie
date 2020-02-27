<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Example extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){

        $viewData = ['name' => 'Monkey D.', 'firstname' => 'Luffy'];
        $this->smarty->view('example.tpl', $viewData);
    }
}