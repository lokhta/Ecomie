<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Event
 * \author Jean-Baptiste Abeilhe
 * \version 3.0
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

    /**
     * @brief Fonction getter permettant de récupérer l'id d'un évènement
     * @return integer l'identifiant d'un évènement
     */
    public function getId(){
        return $this->_eventId;
    }

    /**
     * @brief Fonction getter permettant de récupérer le nom d'un évènement
     * @return integer le nom d'un évènement
     */
    public function getName(){
        return $this->_eventName;
    }

    /**
     * @brief Fonction getter permettant de récupérer le contenu d'un évènement
     * @return integer le contenu d'un évènement
     */
    public function getContent(){
        return $this->_eventContent;
    }

    /**
     * @brief Fonction getter permettant de récupérer la date de début d'un évènement
     * @return integer la date de début d'un évènement
     */
    public function getDateStart(){
        return $this->_eventDateStart;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'heure de début d'un évènement
     * @return integer l'heure de début d'un évènement
     */
    public function getTimeStart(){
        return $this->_eventTimeStart;
    }

    /**
     * @brief Fonction getter permettant de récupérer la date de fin d'un évènement
     * @return integer la date de fin d'un évènement
     */
    public function getDateEnd(){
        return $this->_eventDateEnd;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'heure de fin d'un évènement
     * @return integer l'heure de fin d'un évènement
     */
    public function getTimeEnd(){
        return $this->_eventTimeEnd;
    }

    /**
     * @brief Fonction getter permettant de récupérer l'auteur d'un évènement
     * @return integer l'id de l'auteur
     */
    public function getAuthor(){
        return $this->_eventAuthor;
    }

    /**
     * @brief Fonction getter permettant de récupérer les données d'un évènement
     * @return integer toutes les données d'un évènement
     */
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