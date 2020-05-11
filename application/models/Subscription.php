<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Subscription (model)
 * \author Sofiane AL AMRI
 * \version 3.0
 * \brief Modèle pour s'inscrire à la newsletter.
 */


class Subscription extends CI_Model{
    private $_subscribeId;
    private $_subscribeEmail;

    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */
    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('subscribe', '', $key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    //Setters

    /**
     * @brief Fonction setter pour ajouter un id à la class
     * @param $id integer
     */

    public function setId($id){
        $this->_subscribeId = $id;
    }

    /**
     * @brief Fonction setter pour ajouter un mail
     * @param $email string
     */
    public function setEmail($email){
        $this->_subscribeEmail = $email;
    }

    //Getters

    /**
     * @brief Fonction getter permettant de récupérer l'id
     * @return integer un identifiant
     */
    public function getId(){
        return $this->_subscribeId;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'adresse mail
     * @return integer l'adresse mail d'un visiteur/membre
     */
    public function getEmail(){
        return $this->_subscribeEmail;
    }
    
    /**
     * @brief Fonction getter permettant de récupérer les données
     * @return integer les données d'un abonné
     */
    public function getData(){
        $subscribeData = get_object_vars($this);

        $data = array();
        foreach($subscribeData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}