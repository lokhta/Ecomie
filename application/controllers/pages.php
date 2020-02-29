<?php

class Pages extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->smarty->assign('base_url', base_url());
    }

    public function articles(){
        $this->smarty->view('pages/savoir_faire.tpl');
    }

    public function galerie(){
        $this->smarty->view('pages/galerie.tpl');
    }

    public function contact(){
        $this->smarty->view('pages/contact.tpl');
    }

    public function cgu(){
        $this->smarty->view('pages/cgu.tpl');
    }

    public function mentions(){
        $this->smarty->view('pages/mentions.tpl');
    }

    public function plan(){
        $this->smarty->view('pages/plan.tpl');
    }
}