<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Model{
    private $_subscribeId;
    private $_subscribeEmail;

    public function __construct(){
        parent::__construct();
    }

    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('subscribe', '', $key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId($id){
        $this->_subscribeId = $id;
    }

    public function setEmail($email){
        $this->_subscribeEmail = $email;
    }

    public function getId(){
        return $this->_subscribeId;
    }

    public function getEmail(){
        return $this->_subscribeEmail;
    }

    public function getData(){
        $subscribeData = get_object_vars($this);

        $data = array();
        foreach($subscribeData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}