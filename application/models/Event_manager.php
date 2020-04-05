<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addEvent(Events $event){
        return  $this->db->insert('events', $event->getData()); 
    }


    public function editEvent(Event $event){
        return  $this->db->where('eventId', $event->getId())->update('events', $event->getData());
    }

    public function deleteEvent($event_id){
        return $this->db->where('eventId', $event_id)->delete('events');
    }
    
    public function getEvent($event_id){
        $query = $this->db
        ->select('eventId, eventName, eventContent, eventDateStart, eventTimeStart, eventDateEnd, eventTimeEnd, eventAuthor, userFirstname')
        ->from('events')
        ->join('users', 'users.userId = events.eventAuthor')
        ->where('eventId', $event_id)
        ->get();
        return $query->row_array();
    }

    public function getAllEvent(){
        $url = base_url()."Events/events";

        $this->db->select('eventId, eventName, eventContent, eventDateStart, eventTimeStart, eventDateEnd, eventTimeEnd, eventAuthor, userFirstname');
        $this->db->from('events');
        $this->db->join('users', 'users.userId = events.eventAuthor');

        if(array_key_exists('role', $_SESSION) && $_SESSION['role'] == 3 && current_url() !== $url){
            $this->db->where('eventAuthor', $_SESSION['id']);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
}