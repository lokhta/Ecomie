<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addMessage(Message $message){
        return  $this->db->insert('messages', $message->getData()); 
    }
}