<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addArticle(Article $article){
        return  $this->db->insert('articles', $article->getData()); 
    }


    public function editArticle(Article $article){
        return  $this->db->where('articleId', $article->getId())->update('articles',  $article->getData());
    }

    public function deleteArticle(){

    }
    
    public function getArticle($article_id){
        $query = $this->db
        ->select('articleId, articleTitle, articleContent, articleDate, articleValidate,articleCategory,articleAuthor,categoryName, userFirstname')
        ->from('articles')
        ->join('users', 'users.userId = articles.articleAuthor')
        ->join('categories', 'categories.categoryId = articles.articleCategory')
        ->where('articleId', $article_id)
        ->get();
        return $query->row_array();
    }

    public function getAllArticle(){
        $url = base_url()."Articles/articles";

        $this->db->select('articleId, articleTitle, articleContent, articleDate, articleValidate,articleCategory,articleAuthor,categoryName, userFirstname');
        $this->db->from('articles');
        $this->db->join('users', 'users.userId = articles.articleAuthor');
        $this->db->join('categories', 'categories.categoryId = articles.articleCategory');

        if(array_key_exists('role', $_SESSION) && $_SESSION['role'] == 1 && current_url() !== $url){
            $this->db->where('articleAuthor', $_SESSION['id']);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getCategory(){
        $query = $this->db
        ->select('*')
        ->from('categories')
        ->get();
        return $query->result_array();
    }
}