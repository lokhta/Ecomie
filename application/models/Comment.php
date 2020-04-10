<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Comment
 * \author Sofiane AL AMRI
 * \version 1.0
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

    public function getId(){
        return $this->_commentId;
    }

    public function getContent(){
        return $this->_commentContent;
    }

    public function getDate(){
        return $this->_commentDate;
    }

    public function getReport(){
        return $this->_commentReport;
    }

    public function getAuthor(){
        return $this->_commentAuthor;
    }

    public function getArticle(){
        return $this->_commentArticle;
    }

    public function getEvent(){
        return $this->_commentEvent;
    }



    public function getData(){
        $articleData = get_object_vars($this);

        $data = array();
        foreach($articleData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        // var_dump($data);
       return $data;
    }
}