<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerie_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addGalerie(Galerie $galerie){
        return  $this->db->insert('images', $galerie->getData()); 
    }


    public function editGalerie(Galerie $galerie){
        return  $this->db->where('imgId', $galerie->getId())->update('images', $galerie->getData());
    }

    public function deleteGalerie($event_id){
        return $this->db->where('imgEvent', $event_id)->delete('images');
    }
    
    public function getGalerie($event_id){
        
        $query = $this->db
        ->select('imgName, imgAlt, imgEvent, eventName')
        ->from('images')
        ->join('events', 'events.eventId = images.imgEvent')
        ->where('eventId', $event_id)
        ->get();
        return $query->row_array();
     
    }
 
    public function getAllGalerie(){  
       
            $this->db->select('imgId, imgName, imgAlt, imgEvent, eventName');
            $this->db->from('images');
            $this->db->join('events', 'events.eventId = images.imgEvent');
            $this->db->where('eventDateEnd < DATE( NOW())');
            $this->db->order_by('imgEvent');
            
           
            $query = $this->db->get();
           return $query->result_array();
        }

    public function getDashGalerie(){
            $this->db->select('eventId, eventName');
            $this->db->from('events');
            $this->db->where('eventDateEnd < DATE( NOW())');
        

        $query = $this->db->get();
        return $query->result_array();
    }

    public function count_galerie(){
        $this->db->select('*');
        $this->db->from('events');
        if(strpos(current_url(),"Galeries/galeris")!= false){
            $this->db->where('eventDateEnd < NOW()');
        }
        return $this->db->get()->num_rows();
    }
}