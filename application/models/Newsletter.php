<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Newsletter (model)
 * \author Sofiane AL AMRI
 * \version 3.0
 * \brief Modèle pour créer une newsletter. (Partie Admin)
 */

class Newsletter extends CI_Model{
    private $_newsId;
    private $_newsTitle;
    private $_newsContent;
    private $_newsDate;

    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */
    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('news','', $key);

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
        $this->_newsId = $id;
    }

    /**
     * @brief Fonction setter pour ajouter un titre
     * @param $title string
     */
    public function setTitle($title){
        $this->_newsTitle = $title;
    }
    /**
     * @brief Fonction setter pour ajouter du contenu
     * @param $content string
     */
    public function setContent($content){
        $this->_newsContent = $content;
    }

    /**
     * @brief Fonction setter pour ajouter une date
     * @param $dat
     */
    public function setDate($dat){
        $this->_newsDate = $dat;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'id d'une newsletter
     * @return integer l'identifiant d'une newsletter
     */
    public function getId(){
        return $this->_newsId;
    }

    /**
     * @brief Fonction getter permettant de récupérer le titre
     * @return integer le titre d'une newsletter
     */
    public function getTitle(){
        return $this->_newsTitle;
    }
    
    /**
     * @brief Fonction getter permettant de récupérer le contenu
     * @return integer le contenu d'une newsletter
     */
    public function getContent(){
        return $this->_newsContent;
    }

    /**
     * @brief Fonction getter permettant de récupérer la data
     * @return integer la date d'une newsletter
     */
    public function getDate(){
        return $this->_newsDate;
    }

    /**
     * @brief Fonction getter permettant de récupérer les données
     * @return integer les données d'une newsletter
     */
    public function getData(){
        $newsData = get_object_vars($this);

        foreach($newsData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}