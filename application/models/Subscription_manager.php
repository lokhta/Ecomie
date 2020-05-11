<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Subscription Manager
 * \author Sofiane AL AMRI
 * \version 3.0
 * \brief Modèle pour s'inscrire à la newsletter.
 */

class Subscription_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
	* Fonction permettant d'ajouter un abonné
	* @param subscribe les informations de l'abonné
	* @return array les informations de l'abonné
    */
    public function addSubscriber(Subscription $subscribe){
        return  $this->db->insert('subscribes', $subscribe->getData()); 
    }

    /**
	* Fonction permettant de modifier l'adresse mail d'un abonné
	* @param subscribeMail l'adresse mail d'un abonné
	* @return array met à jour l'adresse mail d'un abonné
    */
    public function editNews(Subscription $subscribeMail){
        return  $this->db->where('subscribeEmail', $subscribeMail->getId())->update('subscribes',  $subscribeMail->getData());
    }

    /**
	* Fonction permettant de supprimer un abonné
	* @param subscribeMail l'adresse mail d'un abonné
	* @return array supprime un abonné
    */
    public function deleteNews($subscribeMail){
        return $this->db->where('subscribeEmail', $subscribeMail)->delete('subscribes');
    }

    /**
	* Fonction permettant de vérifier si un nouvel abonné existe déjà dans la BDD
	* @param subscribeMail l'adresse mail d'un abonné
	* @return array les informations d'un abonné
    */
    public function inBase($subscribeEmail){
        $query = $this->db
        ->select('*')
        ->from('subscribes')
        ->where('subscribeEmail',$subscribeEmail)
        ->get();
        return $query->row_array();
    }

    /**
	* Fonction permettant de récupérer l'adresse mail d'un abonné
	* @return array l'adresse mail d'un abonné
    */
    public function getEmails(){
        $query = $this->db
        ->select("subscribeEmail")
        ->from("subscribes")
        ->get();
        return $query->result_array();

    }
}