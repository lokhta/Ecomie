<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->smarty->assign('page', 'admin/home.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function membres(){
        $this->smarty->assign('page', 'admin/membre.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }


    public function evenements(){
        $this->smarty->assign('page', 'admin/event.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function newsletters(){
        $this->smarty->assign('page', 'admin/news.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function messagerie(){
        $this->smarty->assign('page', 'admin/messagerie.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function archives(){
        $this->smarty->assign('page', 'admin/archive.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }
}