<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addSubscriber(Subscription $subscribe){
        return  $this->db->insert('subscribes', $subscribe->getData()); 
    }

    public function editNews(Subscription $subscribeMail){
        return  $this->db->where('subscribeEmail', $subscribeMail->getId())->update('subscribes',  $subscribeMail->getData());
    }

    public function deleteNews($subscribeMail){
        return $this->db->where('subscribeEmail', $subscribeMail)->delete('subscribes');
    }
}