<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Galerie
 * \author Jean-Baptiste Abeilhe
 * \version 1.0
 * 
 */

class Galerie extends CI_Model{

    private $_imgId;
    private $_imgName;
    private $_imgDateAdd;
    private $_imgAlt;
    private $_imgEvent;


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
            $method = 'set'.str_replace('img','',$key);

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
        $this->_imgId = $id;
    }

    /**
     * @fn setName($name)
     * @brief Fonction setter pour ajouter l'adresse
     * @param $name string
     */
    public function setName($name){
        $this->_imgName = $name;
    }

    /**
     * @fn setDateAdd($imgDate)
     * @brief Fonction setter pour ajouter une date
     * @param $imgDate string
     */
    public function setDateAdd($imgDate){
        $this->_imgDateAdd = $imgDate;
    }

    /**
     * @fn setAlt($alt)
     * @brief Fonction setter pour ajouter la description d'une image
     * @param $alt string
     */
    public function setAlt($alt){
        $this->_imgAlt = $alt;
    }

    /**
     * @fn setimgEvent($imgEvent)
     * @brief Fonction setter pour ajouter l'id de l'event en lien avec l'image
     * @param $imgEvent integer
     */
    public function setEvent($imgEvent){
        $this->_imgEvent = $imgEvent;
    }

    //Getters

    public function getId(){
        return $this->_imgId;
    }

    public function getName(){
        return $this->_imgName;
    }

    public function getDate(){
        return $this->_imgDateAdd;
    }

    public function getAlt(){
        return $this->_imgAlt;
    }

    public function getEvent(){
        return $this->_imgEvent;
    }


    public function getData(){
        $galerieData = get_object_vars($this);

        $data = array();
        foreach($galerieData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        //var_dump($data);
       return $data;
    }
}