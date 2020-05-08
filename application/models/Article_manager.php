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

    public function deleteArticle($article_id){
        return $this->db->where('articleId', $article_id)->delete('articles');
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

    public function getAllArticle($limit, $offset, $keyword = null){
        $url = base_url()."Articles/articles";

        $this->db->select('articleId, articleTitle, articleContent, articleDate, articleValidate,articleCategory,articleAuthor,categoryName, userFirstname');
        $this->db->from('articles');
        $this->db->join('users', 'users.userId = articles.articleAuthor');
        $this->db->join('categories', 'categories.categoryId = articles.articleCategory');

        if(current_url() == $url){
            $this->db->where('articleValidate', 1);

            if(!empty($_GET['search']) && $_GET['search'] == 1 && $keyword){
                $data = explode(' ', $keyword);
                foreach($data as $key => $value){
                    if($value == null){
                        unset($data[$key]);
                    }
                }

                $this->db->like('articleContent', $data[0]);

                for($i = 1; $i< count($data); $i++){
                    //var_dump($data[$i]);;
                    $this->db->or_like('articleContent', $data[$i]);
                }
                // var_dump($data);;
            }elseif(!empty($_GET['category_id']) && $keyword){
                $this->db->where('articleCategory', $keyword);
            }
        }

        if(array_key_exists('role', $_SESSION) && $_SESSION['role'] == 3 && current_url() !== $url){
            $this->db->where('articleAuthor', $_SESSION['id']);
        }

        //limit 3
        $this->db->limit($limit,$offset);
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

    public function count_article(){
        return $this->db->get("articles")->num_rows();
    }
}