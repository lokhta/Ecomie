<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function articles(){
        $this->smarty->view('pages/savoir_faire.tpl');
    }

    public function evenements(){
        $this->smarty->view('pages/events.tpl');
    }

    public function connexion(){
        $this->smarty->view('pages/connect.tpl');
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