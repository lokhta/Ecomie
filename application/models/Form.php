<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Form
 * \author Sofiane AL AMRI
 * \version 1.0
 * 
 */

class Form extends CI_Model{
    private $_formId;
    private $_formSendername;
    private $_formSendermail;
    private $_formSubject;
    private $_formMessage;
    private $_formRead;

    public function __construct(){
        parent::__construct();
    }

  
    /**
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */

    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('form','',$key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    //Setters
    /**
     * @brief Fonction setter pour ajouter un id à la class
     * @param $id integer
     */
    public function setId($id){
        $this->_formId = $id;
    }

    /**
     * @brief Fonction setter pour ajouter un nom
     * @param $sendername string
     */
    public function setSendername($sendername){
        $this->_formSendername = $sendername;
    }

    /**
     * @brief Fonction setter qui ajoute une adresse email
     * @param $sendermail 
     */
    public function setSendermail($sendermail){
        $this->_formSendermail = $sendermail;
    }

    /**
     * @brief Fonction setter pour ajouter un sujet au message
     * @param $subject integer
     */
    public function setSubject($subject){
        $this->_formSubject = $subject;
    }

    /**
     * @brief Fonction setter pour ajouter un message
     * @param $message
     */
    public function setMessage($message){
        $this->_formMessage = $message;
    }

    /**
     * @brief Fonction setter pour indiqué si le message est lu
     * @param $read
     */
    public function setRead($read){
        $this->_formRead = $read;
    }
    //Getters

    public function getId(){
        return $this->_formId;
    }

    public function getSendername(){
        return $this->_formSendername;
    }

    public function getSendermail(){
        return $this->_formSendermail;
    }

    public function getSubject(){
        return $this->_formSubject;
    }

    public function getMessage(){
        return $this->_formMessage;
    }

    public function getRead(){
        return $this->_formRead;
    }

    public function getData(){
        $formData = get_object_vars($this);

        $data = array();
        foreach($formData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}