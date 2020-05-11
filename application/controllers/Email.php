<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
    }

    public function send_page(){
 
        $subject = "Email envoyé par ".$_GET["sender"];
        $message = $_GET["sender"]." vous a envoyé cette article qui pourrait vous plaire : ".$_GET["url"];
        
        send_mail($_GET['sender'], $_GET['recipient'], $subject, $message, "text");

    }
   
}