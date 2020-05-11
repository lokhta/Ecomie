<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Article Manageur
 * \author Sofiane AL AMRI
 * \version 3.0
 */

class Article_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief addArticle() ajoute un article dans la tables articles
     * @param $article Prend en paramètre une instance de la classe Article
     */
    public function addArticle(Article $article){
        return  $this->db->insert('articles', $article->getData()); 
    }

    /**
     * @brief editArticle() modifie un article
     * @param $article Prend en paramètre une instance de la class Article 
     */
    public function editArticle(Article $article){
        return  $this->db->where('articleId', $article->getId())->update('articles',  $article->getData());
    }

    /**
     * @brief deleteArticle() supprime un article
     * @param $article_id Prend en paramètre l'identifiant de l'article à supprimer
     */
    public function deleteArticle($article_id){
        return $this->db->where('articleId', $article_id)->delete('articles');
    }
    
    /**
     * @brief getArticle() retourne une ligne de la table articles
     * @param $article_id Prend en paramètre l'identifiant de l'article à retourner
     * @return Array
     */
    public function getArticle($article_id){
        $query = $this->db
        ->select('articleId, articleTitle, articleContent, articleDate, articleValidate,articleCategory,articleAuthor,categoryName, userFirstname, userEmail')
        ->from('articles')
        ->join('users', 'users.userId = articles.articleAuthor')
        ->join('categories', 'categories.categoryId = articles.articleCategory')
        ->where('articleId', $article_id)
        ->get();
        return $query->row_array();
    }

    /**
     * @brief getAllArticle() retourne un tableau multidimensionnels contenant des articles
     * @param $keywords Permet la recherche par mot clé, définis a null par défaut
     * @return Array
     */
    public function getAllArticle($keyword = null){
        // $url = base_url()."Articles/articles";

        $this->db->select('articleId, articleTitle, articleContent, articleDate, articleValidate,articleCategory,articleAuthor,categoryName, userFirstname');
        $this->db->from('articles');
        $this->db->join('users', 'users.userId = articles.articleAuthor');
        $this->db->join('categories', 'categories.categoryId = articles.articleCategory');

        if(strpos(current_url(),"Articles/articles") != false){
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

        if(array_key_exists('role', $_SESSION) && $_SESSION['role'] == 3 && strpos(current_url(),"Articles/articles") == false){
            $this->db->where('articleAuthor', $_SESSION['id']);
        }

        if(array_key_exists('role', $_SESSION) && $_SESSION['role'] == 1 && strpos(current_url(),"Articles/dashboard") != false){
            $this->db->order_by('articleValidate', 'ASC');
        }

        //ORDER BY validation ASC si article dashboard
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @brief getCategory() Retourne un tableau multidimensionnels contenant les catégories d'articles
     * @return Array
     */
    public function getCategory(){
        $query = $this->db
        ->select('*')
        ->from('categories')
        ->get();
        return $query->result_array();
    }

    /**
     * @brief count_article() Retourne le nombre d'articles présent dans la table articles
     * @return Integer
     */
    public function count_article(){
        $this->db->select('*');
        $this->db->from('articles');
        
        if(strpos(current_url(),"Articles/articles")!= false || current_url() == base_url()."dashboard"){
            $this->db->where('articleValidate', 1);
        }
        
        return $this->db->get()->num_rows();
    }
}