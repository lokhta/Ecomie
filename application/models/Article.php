<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Article (model)
 * \author Sofiane AL AMRI
 * \version 3.0
 */

class Article extends CI_Model{

    private $_articleId;
    private $_articleTitle;
    private $_articleContent;
    private $_articleDate;
    private $_articleValidate;
    private $_articleCategory;
    private $_articleAuthor;

    public function __construct(){
        parent::__construct();
    }

  
    /**
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */

    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('article','',$key);

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
        $this->_articleId = $id;
    }

    /**
     * @brief Fonction setter pour ajouter un titre
     * @param $title string
     */
    public function setTitle($title){
        $this->_articleTitle =$title;
    }

    /**
     * @brief Fonction setter pour ajouter un contenu
     * @param $content string
     */
    public function setContent($content){
        $this->_articleContent = $content;
    }

    /**
     * @brief Fonction setter qui ajoute une date
     * @param $dt 
     */
    public function setDate($dt){
        $this->_articleDate = $dt;
    }

    /**
     * @brief Fonction setter pour ajouter une valeur à $_validate
     * @param $valid integer
     */
    public function setValidate($valid){
        $this->_articleValidate = $valid;
    }

    /**
     * @brief Fonction setter pour ajouter un categorie
     * @param $cat
     */
    public function setCategory($cat){
        $this->_articleCategory = $cat;
    }



    /**
     * @brief Fonction setter pour ajouter un auteur
     * @param $author
     */
    public function setAuthor($author){
        $this->_articleAuthor = $author;
    }

    
    //Getters

    /**
     * @brief Fonction getter permettant de récupérer l'ID d'un article
     * @return integer l'identifiant
     */
    public function getId(){
        return $this->_articleId;
    }

    /**
     * @brief Fonction getter permettant de récupérer le titre d'un article
     * @return integer le titre
     */
    public function getTitle(){
        return $this->_articleTitle;
    }

    /**
     * @brief Fonction getter permettant de récupérer le contenu d'un article
     * @return integer le contenu
     */
    public function getContent(){
        return $this->_articleContent;
    }

    /**
     * @brief Fonction getter permettant de récupérer la date d'un article
     * @return integer la date
     */
    public function getDate(){
        return $this->_articleDate;
    }

    /**
     * @brief Fonction getter permettant de récupérer la validation d'un article
     * @return integer si l'article est validé ou non (booléan)
     */
    public function getValidate(){
        return $this->_articleValidate;
    }

    /**
     * @brief Fonction getter permettant de récupérer la catégorie d'un article
     * @return integer l'id de la catégorie
     */
    public function getCategory(){
        return $this->_articleCategory;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'auteur d'un article
     * @return integer l'id de l'auteur
     */
    public function getAuthor(){
        return $this->_articleAuthor;
    }

    /**
     * @brief Fonction getter permettant de récupérer les données d'un article
     * @return integer toutes les données d'un article
     */
    public function getData(){
        $articleData = get_object_vars($this);

        $data = array();
        foreach($articleData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
       return $data;
    }
}