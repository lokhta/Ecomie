<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Galerie Manager
 * \author Sofiane AL AMRI
 * \version 3.0
 * 
 */
class Galerie_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief addImage() ajoute une image dans la table images
     * @param $galerie Prend en paramètre une instance de la classe Galerie
     */
    public function addImage(Galerie $galerie){
        return  $this->db->insert('images', $galerie->getData()); 
    }

    /**
     * @brief editGalerie() modifie une image
     * @param $galerie Prend en paramètre une instance de la class Galerie 
     */
    public function editGalerie(Galerie $galerie){
        return  $this->db->where('imgId', $galerie->getId())->update('images', $galerie->getData());
    }

   /**
     * @brief deleteGalerie() supprime une galerie
     * @param $event_id Prend en paramètre l'identifiant de l'image à supprimer
     */
    public function deleteGalerie($event_id){
        return $this->db->where('imgEvent', $event_id)->delete('images');
    }
    
    /**
     * @brief getGalerie() retourne tableau contenant des images liées à un événement en particulier
     * @param $event_id Prend en paramètre l'identifiant de l'événement aux images retournées
     * @return Array
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
     * @brief getAllGalerie() retourne un tableau multidimensionnels contenant une seule image de chaque événememnt
     * @return Array
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
     * @brief count_galerie() Retourne le nombre de galerie
     * @return Integer
     */
    public function count_galerie(){
        $this->db->distinct();
        $this->db->select('imgEvent');
        $this->db->from('images');
        return $this->db->get()->num_rows();
    }

    /**
     * @brief count_image() Retourne le nombre d'images d'une galerie
     * @param $event_id Identifiant de l'événement
     * @return Integer
     */
    public function count_image($event_id){
        $this->db->select("imgId");
        $this->db->from("images");
        $this->db->where("imgEvent", $event_id);
        return $this->db->get()->num_rows();
    }

    /**
     * @brief eventNotInBase() Retourne les galeries qui ont moint de 20 images et les événements archivés qui ne se trouvent pas dans la tables images
     * @param $event_id Identifiant de l'événement
     * @return Integer
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