<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function connexion(){
        $this->smarty->view('pages/connection.tpl');
    }

    public function inscription(){
        $this->smarty->view('pages/inscription.tpl');
    }


    public function galerie(){
        $this->smarty->view('pages/galeries.tpl');
    }

    public function contact(){
        //$array;
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

    public function access_denied(){
        $this->smarty->view('pages/access_denied.tpl');
    }
}