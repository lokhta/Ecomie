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
        ->select('imgEvent,imgName, imgAlt, eventName')
        ->from('images')
        ->join('events', 'events.eventId = images.imgEvent')
        ->where('imgEvent', $event_id)
        ->get();
        return $query->result_array();
    }
 
    public function getAllGalerie($limit, $offset){  
            $this->db->distinct();
            $this->db->select('imgEvent,imgName, imgAlt,imgDateAdd, eventName');
            $this->db->from('images');
            $this->db->join('events', 'events.eventId = images.imgEvent');
            $this->db->group_by('imgEvent');
            $this->db->limit($limit, $offset);
            $query = $this->db->get();
            return $query->result_array();
        }

    public function count_galerie(){
        $this->db->distinct();
        $this->db->select('imgEvent');
        $this->db->from('images');
        return $this->db->get()->num_rows();
    }
}