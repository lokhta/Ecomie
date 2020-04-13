<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller{

    private $_form_manager;
    private $_form;

    public function __construct(){
        parent::__construct();
        $this->_form_manager = create_object('Form_manager');
        $this->_form = create_object('Form');
    }

    public function dashboard(){

        $data = get_all_data($this->_form_manager, $this->_form, 'getFormMessage');
        $this->smarty->assign('message', $data);

        $this->smarty->assign('page', 'admin/messagerie.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }
}