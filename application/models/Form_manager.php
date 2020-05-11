<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Form Manageur
 * \author Sofiane AL AMRI
 * \version 3.0
 * \brief Manageur pour la page contact, permettant d'envoyer ou de recevoir un message sur Ecomie
 */
class Form_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
	* Fonction permettant d'envoyer un message
	* @param form tableau des données d'un message
	* @return array ajoute les données du tableau dans la BDD
    */
    public function sendForm(Form $form){
        return  $this->db->insert('form', $form->getData()); 
    }

    /**
	* Fonction permettant de supprimer un message
	* @param form_id identifiant du message demandé
	* @return array supprime le contenu d'un message dans la bdd en fonction de l'id
    */
    public function deleteFormMessage($form_id){
        return $this->db->where('formId', $form_id)->delete('form');
    }
    
    /**
	* Fonction permettant de recevoir un message
	* @param form_id identifiant du message demandé
	* @return array récupère les données d'un message de la BDD
    */
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

    /**
    * Fonction permettant de compter les messages
	* @return array le nombre de messages
    */
    public function count_message(){
        return $this->db->get("form")->num_rows();
    }
}