<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller{
    private $_message_manager;
    private $_message;

    public function __construct(){
        parent::__construct();
        $this->_message_manager = create_object("Message_manager");
        $this->_message = create_object("Message");
    }

    public function send_message(){
        if(!empty($_POST['msgContent'])){
            write_data($this->_message_manager, $this->_message,"addMessage" ,$_POST);
            echo json_encode(array("success" => "<div class='alert alert-success'>Votre message a bien été envoyé</div>"));
        }else{
            echo json_encode(array("error"=>true, "error_message" => "<div class='alert-error'>Veuillez renseigner un message</div>"));
        }
    }

    public function dashboard(){
        if(!empty($_GET)){

            if(!empty($_GET['message_id'])){
                $data = get_data($this->_message_manager, $this->_message, 'getMessage', $_GET['message_id']);
                $this->smarty->assign('msg',$data);
                $this->smarty->assign('page', 'admin/message_detail.tpl');
            }

            //Suppression message
            if(!empty($_GET['message_id']) && !empty($_GET['del'])){
                del_data($this->_message_manager, 'delMessage', $_GET['message_id']);
                redirect(base_url()."Messages/dashboard", 'location');
            }
            
        }else{
            $data = get_all_data($this->_message_manager, $this->_message, "getAllMessage", $_SESSION['id']);
            // var_dump($data);
            $this->smarty->assign("message", $data);
            $this->smarty->assign('page', 'admin/messagerie.tpl');
        }
        $this->smarty->view('admin/dashboard.tpl');

    }
}