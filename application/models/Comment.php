<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Comment (model)
 * \author Jean-Baptiste Abeilhe
 * \version 3.0
 * 
 */

class Comment extends CI_Model{
    private $_commentId;
    private $_commentContent;
    private $_commentDate;
    private $_commentReport;
    private $_commentAuthor;
    private $_commentArticle;
    private $_commentEvent;

    public function __construct(){
        parent::__construct();
    }

  
    /**
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */

    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('comment','',$key);

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
        $this->_commentId = $id;
    }

    /**
     * @brief Fonction setter pour ajouter un contenu
     * @param $content string
     */
    public function setContent($content){
        $this->_commentContent = $content;
    }

    /**
     * @brief Fonction setter qui ajoute une date
     * @param $dt 
     */
    public function setDate($dt){
        $this->_commentDate = $dt;
    }

    /**
     * @brief Fonction setter pour ajouter une valeur à $_validate
     * @param $report integer
     */
    public function setReport($report){
        $this->_commentReport = $report;
    }

    /**
     * @brief Fonction setter pour ajouter un auteur
     * @param $author
     */
    public function setAuthor($author){
        $this->_commentAuthor = $author;
    }

    /**
     * @brief Fonction setter pour ajouter un l'id de l'article commenté
     * @param $article
     */
    public function setArticle($article){
        $this->_commentArticle = $article;
    }

    /**
     * @brief Fonction setter pour ajouter un l'id de l'article commenté
     * @param $article
     */
    public function setEvent($event){
        $this->_commentEvent = $event;
    }
    //Getters

    /**
     * @brief Fonction getter permettant de récupérer l'id d'un commentaire
     * @return integer l'identifiant d'un commentaire
     */

    public function getId(){
        return $this->_commentId;
    }

    /**
     * @brief Fonction getter permettant de récupérer le contenu d'un commentaire
     * @return integer le contenu d'un commentaire
     */
    public function getContent(){
        return $this->_commentContent;
    }

    /**
     * @brief Fonction getter permettant de récupérer la date d'un commentaire
     * @return integer la date d'un commentaire
     */
    public function getDate(){
        return $this->_commentDate;
    }
    
    /**
     * @brief Fonction getter permettant de récupérer la valeur d'un commentaire signalé
     * @return integer une valeur pour signaler un commentaire
     */
    public function getReport(){
        return $this->_commentReport;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'auteur d'un commentaire
     * @return integer l'id de l'auteur
     */
    public function getAuthor(){
        return $this->_commentAuthor;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'article d'un commentaire
     * @return integer l'id de l'article
     */
    public function getArticle(){
        return $this->_commentArticle;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'événement d'un commentaire
     * @return integer l'id de l'événement
     */
    public function getEvent(){
        return $this->_commentEvent;
    }


    /**
     * @brief Fonction getter permettant de récupérer les données d'un commentaire
     * @return integer toutes les données d'un commentaire
     */
    public function getData(){
        $eventData = get_object_vars($this);

        $data = array();
        foreach($eventData as $key => $value){
            $data[substr($key, 1)] = $value;
        }
      
        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}