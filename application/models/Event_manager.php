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
	* Fonction permettant d'ajouter un événement
	* @param event tableau des données d'un événement
	* @return array ajoute les données du tableau dans la BDD
    */
    public function addEvent(Event $event){
        return  $this->db->insert('events', $event->getData()); 
    }

    /**
	* Fonction permettant de modifier les informations d'un événement
	* @param event tableau des données à modifier
	* @return array remplace les données de la BDD avec celles du tableau
    */
    public function editEvent(Event $event){
        return  $this->db->where('eventId', $event->getId())->update('events', $event->getData());
    }

    /**
	* Fonction permettant de supprimer un événement
	* @param event_id identifiant de l'événement demandé
	* @return array supprime le contenu d'un événement dans la bdd en fonction de l'id
    */
    public function deleteEvent($event_id){
        return $this->db->where('eventId', $event_id)->delete('events');
    }
    
    /**
	* Fonction permettant de récupérer le contenu d'un événement
	* @param event_id identifiant de l'événement demandé
	* @return array Tableau d'un événement
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
	* Fonction permettant de récupéré la liste des événements
	* @return array liste tout les événements dans un tableau
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
    * Fonction permettant de compter les événements
	* @return array le nombre d'événements
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