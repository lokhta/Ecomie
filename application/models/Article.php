<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Article
 * \author Sofiane AL AMRI
 * \version 1.0
 * 
 */

class Article extends CI_Model{

    private $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_validate;
    private $_category;
    private $_author;

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
        $this->_id = $id;
    }

    /**
     * @fn setTitle($title)
     * @brief Fonction setter pour ajouter un titre
     * @param $title string
     */
    public function setTitle($title){
        $this->_title =$title;
    }

    /**
     * @fn setContent($content)
     * @brief Fonction setter pour ajouter un contenu
     * @param $content string
     */
    public function setContent($content){
        $this->_content = $content;
    }

    /**
     * @fn setDate($dt)
     * @brief Fonction setter pour ajouter une date
     * @param $dt 
     */
    public function setDate($dt){
        $this->_date = $dt;
    }

    /**
     * @fn setValidate($valid)
     * @brief Fonction setter pour ajouter une valeur à $_validate
     * @param $valid integer
     */
    public function setValidate($valid){
        $this->_validate = $valid;
    }

    /**
     * @fn setCategory($cat)
     * @brief Fonction setter pour ajouter un categorie
     * @param $cat
     */
    public function setCategory($cat){
        $this->_category = $cat;
    }



    /**
     * @fn setAuthor($author)
     * @brief Fonction setter pour ajouter un auteur
     * @param $author
     */
    public function setAuthor($author){
        $this->_author = $author;
    }

    
    //Getters

    public function getId(){
        return $this->_id;
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getContent(){
        return $this->_content;
    }

    public function getDate(){
        return $this->_date;
    }

    public function getValidate(){
        return $this->_validate;
    }

    public function getCategory(){
        return $this->_category;
    }

    public function getAuthor(){
        return $this->_author;
    }
}