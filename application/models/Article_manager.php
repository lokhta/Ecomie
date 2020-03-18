<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addArticle(){

    }

    public function editArticle(){

    }

    public function deleteArticle(){

    }

    public function getArticle(){

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