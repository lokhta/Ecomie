<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Event Manageur
 * \author Jean-Baptiste Abeilhe
 * \version 3.0
 */

class Event_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * @brief addEvent() ajoute un événement  dans la table events
     * @param $event Prend en paramètre une instance de la classe Event
     */
    public function addEvent(Event $event){
        return  $this->db->insert('events', $event->getData()); 
    }

    /**
     * @brief editEvent() modifie un événement
     * @param $event Prend en paramètre une instance de la class Event 
     */
    public function editEvent(Event $event){
        return  $this->db->where('eventId', $event->getId())->update('events', $event->getData());
    }

    /**
     * @brief deleteEvent() supprime un événement
     * @param $event_id Prend en paramètre l'identifiant de l'événement à supprimer
     */
    public function deleteEvent($event_id){
        return $this->db->where('eventId', $event_id)->delete('events');
    }
    
    /**
     * @brief getEvent() retourne une ligne de la table events
     * @param $event_id Prend en paramètre l'identifiant de l'événement à retourner
     * @return Array
     */
    public function getEvent($event_id){
        $query = $this->db
        ->select('eventId, eventName, eventContent, eventDateStart, eventTimeStart, eventDateEnd, eventTimeEnd, eventAuthor, userFirstname')
        ->from('events')
        ->join('users', 'users.userId = events.eventAuthor')
        ->where('eventId', $event_id)
        ->get();
        return $query->row_array();
    }

    /**
     * @brief getAllEvent() retourne un tableau multidimensionnels contenant des événements
     * @return Array
     */
    public function getAllEvent(){
         
            $this->db->select('eventId, eventName, eventContent, eventDateStart, eventTimeStart, eventDateEnd, eventTimeEnd, eventAuthor, userFirstname');
            $this->db->from('events');
            $this->db->join('users', 'users.userId = events.eventAuthor');
            if(strpos(current_url(), "events/archives") != false){
                $this->db->where('eventDateEnd < NOW()');
            }else{
                $this->db->where('eventDateEnd > NOW()');
            }
            $query = $this->db->get();
            return $query->result_array();
        
    
    }

    /**
     * @author Sofiane AL AMRI
     * @brief count_event() Retourne le nombre d'évémement présent dans la base de donnée'
     * @return Integer
     */
    public function count_event(){
        $this->db->select('*');
        $this->db->from('events');
        if(strpos(current_url(), "events/archives") != false){
            $this->db->where('eventDateEnd < NOW()');
        }else{
            $this->db->where('eventDateEnd > NOW()');
        }

        return $this->db->get()->num_rows();
    }
}