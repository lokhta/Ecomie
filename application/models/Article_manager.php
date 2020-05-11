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
	* Fonction permettant d'ajouter un article
	* @param article tableau des données de l'article
	* @return array ajoute les données du tableau dans la BDD
    */

    public function addArticle(Article $article){
        return  $this->db->insert('articles', $article->getData()); 
    }

    /**
	* Fonction permettant de modifier les informations d'un article
	* @param article tableau des données à modifier
	* @return array remplace les données de la BDD avec celles du tableau
    */

    public function editArticle(Article $article){
        return  $this->db->where('articleId', $article->getId())->update('articles',  $article->getData());
    }

    /**
	* Fonction permettant de supprimer un article
	* @param article_id identifiant de l'article demandé
	* @return array supprime le contenu de l'article dans la bdd en fonction de l'id
    */

    public function deleteArticle($article_id){
        return $this->db->where('articleId', $article_id)->delete('articles');
    }
    
    /**
	* Fonction permettant de récupérer le contenu d'un article
	* @param article_id identifiant de l'article demandé
	* @return array Tableau d'un article
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
	* Fonction permettant de récupéré la liste des articles
	* @param keyword une variable booléenne permettant la recherche par mots clés si égal à 1
	* @return array liste tout les articles dans un tableau
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
	* Fonction permettant de récupérer la catégorie d'un article
	* @return array Toutes les données d'un article en fonction de sa catégorie
    */

    public function getCategory(){
        $query = $this->db
        ->select('*')
        ->from('categories')
        ->get();
        return $query->result_array();
    }

    /**
	* Fonction permettant de compter les articles
	* @return array le nombre d'article validés
    */
    public function count_article(){
        $this->db->select('*');
        $this->db->from('articles');
        
        if(strpos(current_url(),"Articles/articles")!= false){
            $this->db->where('articleValidate', 1);
        }
        
        return $this->db->get()->num_rows();
    }
}