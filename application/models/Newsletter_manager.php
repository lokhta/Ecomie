<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletter_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function getNews($id){
        $query = $this->db
        ->select('*')
        ->from('newsletters')
        ->where('newsId', $id)
        ->get();
        return $query->row_array();
    }

    public function getAllNews(){
        $this->db->select('*');
        $this->db->from('newsletters');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addNews(Newsletter $news){
        return  $this->db->insert('newsletters', $news->getData()); 
    }

    public function editNews(Newsletter $news){
        return  $this->db->where('newsId', $news->getId())->update('newsletters',  $news->getData());
    }

    public function deleteNews($id){
        return $this->db->where('newsId', $id)->delete('newsletters');
    }

    public function count_news(){
        return $this->db->get("newsletters")->num_rows();
    }
}