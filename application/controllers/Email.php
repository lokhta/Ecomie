<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
    }

    public function send_page(){
            $config = Array(
                "protocol" => "smtp",
                "smtp_host" => "ssl://smtp.gmail.com",
                "smtp_port" => "465",
                "smpt_timeout" => "7",
                "smtp_crypto" => "SSL",
                "smtp_user" => "ecomie67@gmail.com",
                "smtp_pass" => "ecomie-disii",
                "mailtype" => "text",
                "charset" => "utf-8",
                "wordwrap" => TRUE,
                "validation" => TRUE

            );
            $this->load->library('email', $config);
            
            $this->email->set_newline("\r\n");
            $this->email->from("ecomie67@gmail.com", $_GET["sender"]);
            $this->email->to($_GET["recipient"]);
            $this->email->subject("Email envoyé par ".$_GET["sender"]);
            $this->email->message($_GET["sender"]." vous a envoyé cette article qui pourrait vous plaire : ".$_GET["url"]);
           // $this->email->send();

           if($this->email->send()){
            echo json_encode(array("success" => "<div class='alert alert-success'>L'email a bien été envoyé</div>"));
        }else{
            echo json_encode(array("error" => "<div class='red_error'>Une erreur s'est produite</div>"));
            // echo $this->email->print_debugger();
        }

            
    }
}