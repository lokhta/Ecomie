<?php

class Pages extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->smarty->assign('base_url', base_url());
    }
}