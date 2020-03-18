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
        ->select('articleId, articleTitle, articleDate, articleValidate, categoryName, userFirstname')
        ->from('articles')
        ->join('users', 'users.userId = articles.articleAuthor')
        ->join('categories', 'categories.categoryId = articles.articlesCategory')
        ->get();
        return $query->result_array();
    }
}