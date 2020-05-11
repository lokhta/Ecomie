<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Galerie Manager
 * \author Jean-Baptiste Abeilhe
 * \version 3.0
 * 
 */
class Galerie_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
	* Fonction permettant d'ajouter une image
	* @param galerie tableau des données de la galerie
	* @return array ajoute les données du tableau dans la BDD
    */
    public function addImage(Galerie $galerie){
        return  $this->db->insert('images', $galerie->getData()); 
    }

    /**
	* Fonction permettant de modifier une galerie
	* @param galerie tableau des données de la galerie
	* @return array remplace les données de la BDD avec celles du tableau
    */
    public function editGalerie(Galerie $galerie){
        return  $this->db->where('imgId', $galerie->getId())->update('images', $galerie->getData());
    }

    /**
	* Fonction permettant de supprimer une galerie
	* @param event_id identifiant de l'évènement
	* @return array supprime la galerie d'un évènement
    */
    public function deleteGalerie($event_id){
        return $this->db->where('imgEvent', $event_id)->delete('images');
    }
    
    /**
	* Fonction permettant de récupérer les données d'une galerie
	* @param event_id identifiant de l'évènement
	* @return array récupère les données d'une galerie
    */
    public function getGalerie($event_id){
        
        $query = $this->db
        ->select('imgEvent,imgName, imgAlt, eventName')
        ->from('images')
        ->join('events', 'events.eventId = images.imgEvent')
        ->where('imgEvent', $event_id)
        ->get();
        return $query->result_array();
    }
    
    /**
	* Fonction permettant de récupérer les données de toutes les galerie
	* @return array récupère les données des galeries
    */
    public function getAllGalerie(){  
            $this->db->distinct();
            $this->db->select('imgEvent,imgName, imgAlt,imgDateAdd, eventName');
            $this->db->from('images');
            $this->db->join('events', 'events.eventId = images.imgEvent');
            $this->db->group_by('imgEvent');
            $query = $this->db->get();
           return $query->result_array();
        }
    
    /**
    * Fonction permettant de compter les galeries
	* @return array le nombre de galeries
    */
    public function count_galerie(){
        $this->db->distinct();
        $this->db->select('imgEvent');
        $this->db->from('images');
        return $this->db->get()->num_rows();
    }

    /**
    * Fonction permettant de compter les images
    * @param event_id identifiant de l'évènement
	* @return array le nombre d'images
    */
    public function count_image($event_id){
        $this->db->select("imgId");
        $this->db->from("images");
        $this->db->where("imgEvent", $event_id);
        return $this->db->get()->num_rows();
    }

    /**
    * Fonction permettant de récupérer un évènement passé
	* @return array les évènements passés
    */
    public function eventNotInBase(){
        $query =  $this->db->query("SELECT eventId, eventName 
        FROM images 
        RIGHT JOIN events ON images.imgEvent = events.eventId 
        WHERE eventDateEnd < NOW() GROUP BY imgEvent HAVING COUNT(imgEvent) <= 20
        UNION
        SELECT DISTINCT eventId, eventName FROM images RIGHT JOIN events ON images.imgEvent = events.eventId WHERE eventDateEnd < NOW() AND imgID IS NULL");

        return $query->result_array();
    }
}