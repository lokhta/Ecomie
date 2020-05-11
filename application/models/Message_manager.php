<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * \author Sofiane AL AMRI
 * \version 3.0
 */

class Message_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief addMessage() ajoute un article dans la tables messages
     * @param $message Prend en paramètre une instance de la classe Message
     */
    public function addMessage(Message $message){
        return  $this->db->insert('messages', $message->getData()); 
    }

    /**
     * @brief delMessage() supprime un message
     * @param $message_id Prend en paramètre l'identifiant du message à supprimer
     */
    public function delMessage($message_id){
        return $this->db->where('msgId', $message_id)->delete('messages');
    }


    /**
     * @brief getAllMessage() retourne un tableau multidimensionnels contenant les messages d'un seul membre
     * @param $recipient_id Prend en paramètre l'identifiant du membre qui a reçu les messages
     * @return Array
     */
    public function getAllMessage($recipient_id){
        $query = $this->db->query("SELECT  msgId, userFirstname, msgContent, msgDate, msgSender
        FROM messages, users
        WHERE messages.msgRecipient = users.userId AND msgRecipient = $recipient_id");

        return $query->result_array();
    }

    /**
     * @brief getMessage() retourne une ligne de la table messages
     * @param $message_id Prend en paramètre l'identifiant du message à retourner
     * @return Array
     */
    public function getMessage($message_id){
        $query = $this->db
        ->select('*')
        ->from('messages')
        ->where('msgId', $message_id)
        ->get();
        return $query->row_array();
    }

    /**
     * @brief getSender() retourne un tableau contenant l'expéditeur du message
     * @param $sender Prend en paramètre l'identifiant de l'expéditeur
     * @return Array
     */
    public function getSender($sender){
        $query = $this->db->query("SELECT userId,userFirstname FROM messages, users WHERE messages.msgSender = users.userId AND msgSender = $sender");
        return $query->result_array();
    }
}
