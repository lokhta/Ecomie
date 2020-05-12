<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Form Manageur
 * \author Sofiane AL AMRI
 * \version 3.0
 */
class Form_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief sendForm() ajoute un message reçu depuis le formulaire de contact dans la la table form
     * @param $form Prend en paramètre une instance de la classe Form
     */
    public function sendForm(Form $form){
        return  $this->db->insert('form', $form->getData()); 
    }

    /**
     * @brief deleteFormMessage() supprime un message
     * @param $form_id Prend en paramètre l'identifiant du message à supprimer
     */
    public function deleteFormMessage($form_id){
        return $this->db->where('formId', $form_id)->delete('form');
    }
    
    /**
     * @brief getFormMessage() retourne un tableau contenant des messages
     * @param $form_id Permet d'identifier un message en particulier, dans le cas où aucun identifiant n'est passé en paramètre la methode retourne tous les messages présent dans la base
     * @return Array
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

    public function getForm($form_id){
        $query = $this->db
        ->select('*')
        ->from('form')
        ->where('formId', $form_id)
        ->get();
        return $query->row_array();
    }

    /**
     * @brief count_message() Retourne le nombre de message présent dans la table Form
     * @return Integer
     */
    public function count_message(){
        return $this->db->get("form")->num_rows();
    }
}