<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter extends CI_Model{
    private $_newsId;
    private $_newsTitle;
    private $_newsContent;
    private $_newsDate;

    public function __construct(){
        parent::__construct();
    }

    public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('news','', $key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId($id){
        $this->_newsId = $id;
    }

    public function setTitle($title){
        $this->_newsTitle = $title;
    }

    public function setContent($content){
        $this->_newsContent = $content;
    }

    public function setDate($dat){
        $this->_newsDate = $dat;
    }

    public function getId(){
        return $this->_newsId;
    }

    public function getTitle(){
        return $this->_newsTitle;
    }

    public function getContent(){
        return $this->_newsContent;
    }

    public function getDate(){
        return $this->_newsDate;
    }

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