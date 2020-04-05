<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Event
 * \author Jean-Baptiste Abeilhe
 * \version 1.0
 * 
 */

class Event extends CI_Model{

    private $_eventId;
    private $_eventName;
    private $_eventContent;
    private $_eventDateStart;
    private $_eventTimeStart;
    private $_eventDateEnd;
    private $_eventTimeEnd;
    private $_eventAuthor;

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
            $method = 'set'.str_replace('event','',$key);

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
        $this->_eventId = $id;
    }

    /**
     * @fn setName($name)
     * @brief Fonction setter pour ajouter un titre
     * @param $name string
     */
    public function setName($name){
        $this->_eventName = $name;
    }

    /**
     * @fn setContent($content)
     * @brief Fonction setter pour ajouter un contenu
     * @param $content string
     */
    public function setContent($content){
        $this->_eventContent = $content;
    }

    /**
     * @fn setDate($dateStart)
     * @brief Fonction setter qui formate une date au format JJ-MM-AAAA avant de l'ajouté comme attribut
     * @param $dateStart 
     */
    public function setDateStart($dateStart){
        $this->_eventDateStart = $dateStart;
    }

    /**
     * @fn setTimeStart($timeStart)
     * @brief Fonction setter pour ajouter une heure de dépard à l'évènement
     * @param $timeStart
     */
    public function setTimeStart($timeStart){
        $this->_eventTimeStart = $timeStart;
    }

    /**
     * @fn setDateEnd($dateEnd)
     * @brief Fonction setter pour ajouter la date de fin de l'évènement
     * @param $dateEnd
     */
    public function setDateEnd($dateEnd){
        $this->_eventDateEnd = $dateEnd;
    }



    /**
     * @fn setTimeEnd($timeEnd)
     * @brief Fonction setter pour ajouter une heure de fin à l'évènement
     * @param $timeEnd
     */
    public function setTimeEnd($timeEnd){
        $this->_eventTimeEnd = $timeEnd;
    }

    /**
     * @fn setAuthor($author)
     * @brief Fonction setter pour ajouter l'auteur de l'évènement
     * @param $author
     */
    public function setAuthor($author){
        $this->_eventAuthor = $author;
    }
    

    //Getters

    public function getId(){
        return $this->_eventId;
    }

    public function getName(){
        return $this->_eventName;
    }

    public function getContent(){
        return $this->_eventContent;
    }

    public function getDateStart(){
        return $this->_eventDateStart;
    }

    public function getTimeStart(){
        return $this->_eventTimeStart;
    }

    public function getDateEnd(){
        return $this->_eventDateEnd;
    }

    public function getTimeEnd(){
        return $this->_eventTimeEnd;
    }

    public function getAuthor(){
        return $this->_eventAuthor;
    }

    public function getData(){
        $eventData = get_object_vars($this);

        $data = array();
        foreach($eventData as $key => $value){
            $data[substr($key, 1)] = $value;
        }

        $data = array_filter($data);
        //var_dump($data);
       return $data;
    }
}