<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addMessage(Message $message){
        return  $this->db->insert('messages', $message->getData()); 
    }

    public function delMessage($message_id){
        return $this->db->where('msgId', $message_id)->delete('messages');
    }

    public function getAllMessage($recipient_id){
        $query = $this->db->query("SELECT  msgId, userFirstname, msgContent, msgDate, msgSender
        FROM messages, users
        WHERE messages.msgRecipient = users.userId AND msgRecipient = $recipient_id");

        return $query->result_array();
    }

    public function getMessage($message_id){
        $query = $this->db
        ->select('*')
        ->from('messages')
        ->where('msgId', $message_id)
        ->get();
        return $query->row_array();
    }

    public function getSender($sender){
        $query = $this->db->query("SELECT userId,userFirstname FROM messages, users WHERE messages.msgSender = users.userId AND msgSender = $sender");
        return $query->result_array();
    }
}
