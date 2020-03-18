<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Article
 * \author Sofiane AL AMRI
 * \version 1.0
 * 
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
     * @fn hydrate($data)
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
     * @fn setId($id)
     * @brief Fonction setter pour ajouter un id à la class
     * @param $id integer
     */
    public function setId($id){
        $this->_articleId = $id;
    }

    /**
     * @fn setTitle($title)
     * @brief Fonction setter pour ajouter un titre
     * @param $title string
     */
    public function setTitle($title){
        $this->_articleTitle =$title;
    }

    /**
     * @fn setContent($content)
     * @brief Fonction setter pour ajouter un contenu
     * @param $content string
     */
    public function setContent($content){
        $this->_articleContent = $content;
    }

    /**
     * @fn setDate($dt)
     * @brief Fonction setter qui formate une date au format JJ-MM-AAAA avant de l'ajouté comme attribut
     * @param $dt 
     */
    public function setDate($dt){

        $phpdate = strtotime($dt);
        $dte = date('d-m-Y', $phpdate);

        $this->_articleDate = $dte;
    }

    /**
     * @fn setValidate($valid)
     * @brief Fonction setter pour ajouter une valeur à $_validate
     * @param $valid integer
     */
    public function setValidate($valid){
        $this->_articleValidate = $valid;
    }

    /**
     * @fn setCategory($cat)
     * @brief Fonction setter pour ajouter un categorie
     * @param $cat
     */
    public function setCategory($cat){
        $this->_articleCategory = $cat;
    }



    /**
     * @fn setAuthor($author)
     * @brief Fonction setter pour ajouter un auteur
     * @param $author
     */
    public function setAuthor($author){
        $this->_articleAuthor = $author;
    }

    
    //Getters

    public function getId(){
        return $this->_articleId;
    }

    public function getTitle(){
        return $this->_articleTitle;
    }

    public function getContent(){
        return $this->_articleContent;
    }

    public function getDate(){
        return $this->_articleDate;
    }

    public function getValidate(){
        return $this->_articleValidate;
    }

    public function getCategory(){
        return $this->_articleCategory;
    }

    public function getAuthor(){
        return $this->_articleAuthor;
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