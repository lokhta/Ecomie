<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(empty($_SESSION['id'])){
            redirect('pages/access_denied', 'location');
        }
    }

    public function index(){
        $this->smarty->assign('page', 'admin/home.tpl');
        $this->smarty->assign('title', 'Ecomie - Tableau de bord');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function Galeries(){
        $this->smarty->assign('page', 'admin/archive.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }
}