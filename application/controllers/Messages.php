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
}