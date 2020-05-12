<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Message (model)
 * \author Sofiane AL AMRI
 * \version 1.0
 * 
 */

class Message extends CI_Model{

    private $_msgId;
    private $_msgContent;
    private $_msgDate;
    private $_msgSender;
    private $_msgRecipient;

    public function __construct(){
        parent::__construct();
    }


    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('msg','',$key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId($id){
        $this->_msgId = $id;
    }


    public function setContent($content){
        $this->_msgContent =$content;
    }


    public function setDate($dt){
        $this->_msgDate = $dt;
    }

    public function setSender($sender){
        $sender = (int) $sender;
        $this->_msgSender = $sender;
    }

    public function setRecipient($recip){
        $recip = (int) $recip;
        $this->_msgRecipient = $recip;
    }
    
    //Getters

    public function getId(){
        return $this->_msgId;
    }

    public function getContent(){
        return $this->_msgContent;
    }

    public function getDate(){
        return $this->_msgDate;
    }

    public function getSender(){
        return $this->_msgSender;
    }

    public function getRecipient(){
        return $this->_msgRecipient;
    }

    public function getData(){
        $messageData = get_object_vars($this);

        $data = array();
        foreach($messageData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}