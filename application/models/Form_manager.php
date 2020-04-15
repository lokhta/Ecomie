<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function sendForm(Form $form){
        return  $this->db->insert('form', $form->getData()); 
    }


    public function deleteFormMessage($form_id){
        return $this->db->where('formId', $form_id)->delete('form');
    }
    
    public function getFormMessage($form_id = null){
        $this->db->select('*');
        $this->db->from('form');

        if($form_id){
            $this->db->where('formId', $form_id);
            $query = $this->db->get();
            return $query->row_array();
        }else{
            $query = $this->db->get();
            return $query->result_array();
        }
    }
}