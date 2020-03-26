<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addArticle(Article $article){
        return  $this->db->insert('articles', $article->getData()); 
    }


    public function editArticle(){

    }

    public function deleteArticle(){

    }

    public function getArticle($article_id){
        $query = $this->db
        ->select('articleId, articleTitle, articleContent, articleDate, articleValidate, categoryName, userFirstname')
        ->from('articles')
        ->join('users', 'users.userId = articles.articleAuthor')
        ->join('categories', 'categories.categoryId = articles.articleCategory')
        ->where('articleId', $article_id)
        ->get();
        return $query->row_array();
    }

    public function getAllArticle(){
        $query = $this->db
        ->select('articleId, articleTitle, articleContent, articleDate, articleValidate, categoryName, userFirstname')
        ->from('articles')
        ->join('users', 'users.userId = articles.articleAuthor')
        ->join('categories', 'categories.categoryId = articles.articleCategory')
        ->get();
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