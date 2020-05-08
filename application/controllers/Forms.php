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

        if(empty($_SESSION['id'])){
            redirect('pages/access_denied', 'location');
        }

        /* pagination start */
        $page_url= base_url()."forms/dashboard";
        $total_rows = $this->_form_manager->count_message();
        //var_dump($total_rows);
        $data_pagination = pagination($page_url, $total_rows, 10);
        $pagination_link = $data_pagination['pagination_link'];

        $this->smarty->assign('pagination', $pagination_link);
        /*pagination end*/

        $data = get_all_data($this->_form_manager, $this->_form, 'getFormMessage', $data_pagination['limit'], $data_pagination['offset']);
        $this->smarty->assign('message', $data);

        $this->smarty->assign('page', 'admin/messagerie.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function send_message(){
        $this->form_validation->set_rules('formSendername', 'Nom', 'required');
        $this->form_validation->set_rules('formSendermail', 'Email', 'required');
        $this->form_validation->set_rules('formSubject', 'Objet', 'required');
        $this->form_validation->set_rules('formMessage', 'Message', 'required');
        $this->form_validation->set_rules('formRgpd', 'CGU', 'required', array('required'=>"Veuillez accépter les conditions génèrales d'utilisation"));

        if($this->form_validation->run()) {
            $array = array(
            'success' => '<div class="alert alert-success">Votre message a bien été envoyé</div>'
            );
            write_data($this->_form_manager, $this->_form, 'sendForm', $_POST);
            
        }else{
            $array = array(
            'error'   => true,
            'name_error' => form_error('formSendername'),
            'email_error' => form_error('formSendermail'),
            'subject_error' => form_error('formSubject'),
            'message_error' => form_error('formMessage'),
            'rgpd_error' => form_error('formRgpd')
            );
        }
        
        echo json_encode($array);
    }
}