<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Subscription_manager
 * \author Sofiane AL AMRI
 * \version 3.0
 */

class Subscription_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief addSubscriber() ajoute un abonné dans la tables subscribes
     * @param $subscribe Prend en paramètre une instance de la classe Subscription
     */
    public function addSubscriber(Subscription $subscribe){
        return  $this->db->insert('subscribes', $subscribe->getData()); 
    }

    /**
     * @brief editSubscriber() modifie un abonné
     * @param $subscribeMail Prend en paramètre une instance de la class Subscription 
     */
    public function editSubscriber(Subscription $subscribeMail){
        return  $this->db->where('subscribeEmail', $subscribeMail->getId())->update('subscribes',  $subscribeMail->getData());
    }

    /**
     * @brief deleteSubscriber() supprime un abonné
     * @param $subscribeMail Prend en paramètre l'adresse email de l'abonné à supprimer
     */
    public function deleteSubscriber($subscribeMail){
        return $this->db->where('subscribeEmail', $subscribeMail)->delete('subscribes');
    }

    /**
     * @brief inBase() Permet de détérminer si une adresse e-mail existe déja dans la base
     * @param $subscribeEmail Prend en paramètre l'adresser email à vérifier
     * @return Array
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
     * @brief getEmails() retourne un tableau multidimensionnels contenant les adresses e-mails des abonnés
     * @return Array
     */
    public function getEmails(){
        $query = $this->db
        ->select("subscribeEmail")
        ->from("subscribes")
        ->get();
        return $query->result_array();

    }
}