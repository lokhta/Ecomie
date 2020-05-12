<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Forms
 * \author Sofiane AL AMRI
 * \version 3.0
 * @brief  Ce contrôleur permet de gérer l'envoi et l'affichage des messages envoyés par la page contact
 */

class Forms extends CI_Controller{

    private $_form_manager;
    private $_form;

    public function __construct(){
        parent::__construct();
        $this->_form_manager = create_object('Form_manager');
        $this->_form = create_object('Form');
    }

    /**
     * @brief dashboard() permet d'afficher tout les messages reçus dans le dashboard et de les gérés
     * @param $data contient les données du message qu'il récupère de la BDD
     */

    public function dashboard(){

        if(empty($_SESSION['id'])){
            redirect('pages/access_denied', 'location');
        }
        $data = get_all_data($this->_form_manager, $this->_form, 'getFormMessage');
        $this->smarty->assign('message_forms', $data);

        $this->smarty->assign('page', 'admin/messagerie.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    /**
     * @brief send_message() permet d'envoyer un message à travers la page contact
     * @param form_validation est un helper de codeigniter permettant de gérer et d'afficher les erreurs de saisi
     * @param $array est un tableau contenant un success ou un error qui sera utilisé après par le javascript
     */

    public function send_message(){
        $this->form_validation->set_rules('formSendername', 'Nom', 'required');
        $this->form_validation->set_rules('formSendermail', 'Email', 'required');
        $this->form_validation->set_rules('formSubject', 'Objet', 'required');
        $this->form_validation->set_rules('formMessage', 'Message', 'required');
        $this->form_validation->set_rules('formRgpd', 'rgpd', 'required', array('required'=>"Veuillez accépter les conditions génèrales d'utilisation"));

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