<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller{

    private $_article_manager;
    private $_article;

    public function __construct(){
        parent::__construct();
        $this->load->model('Article_manager');
        $this->load->model('Article');
        $this->_article_manager = create_object('Article_manager');
        $this->_article = create_object('Article');
    }

    public function articles(){
        // $articleManager = new Article_manager;
        // $article = new Article;

        //Afficher un seul article
        if(!empty($_GET['article_id'])){            
            $data = get_data($this->_article_manager, $this->_article, 'getArticle', $_GET['article_id']);

            $this->smarty->assign('articleDetail', $data);
            $this->smarty->view('pages/article.tpl');
        }else{//Afficher tout les articles
            $data = get_data($this->_article_manager, $this->_article, 'getAllArticle');

            $this->smarty->assign('article', $data);
            $this->smarty->view('pages/savoir_faire.tpl');
        }
    }

    public function dashboard(){
        $articleManager = new Article_manager;
        $article = new Article;

        // var_dump($article);

        //Pour insertion dans la BDD
        if(!empty($_POST) && empty($_GET)){
            $_POST['articleAuthor'] = $_SESSION['id'];
            $article->hydrate($_POST);
            $articleManager->addArticle($article);
            redirect(base_url()."Articles/dashboard", 'location');
        }

        if($_GET){
            $url = "Articles/dashboard?article_id=".$_GET['article_id'];

            if(!empty($_GET['edit'])){
                $url .= "&edit=1&update=1";
            }
            $this->smarty->assign('url', $url);

            //Afficher un seul article
            if(!empty($_GET['article_id'])){
                $data = get_data($this->_article_manager, $this->_article, 'getArticle', $_GET['article_id']);
                $this->smarty->assign('articleDetail',$data);
                $this->smarty->assign('page', 'admin/article_detail.tpl');
            }

            //Validation des articles
            if(!empty($_GET['valide'])){
                $dataEdit['articleValidate'] = $_GET['valide'];
                $article->hydrate($dataEdit);
                // var_dump($article->getData());
                $articleManager->editArticle($article);
                redirect($url, 'location'); 
            }

            //Modification article
            if(!empty($_POST) && !empty($_GET['update'])){
                var_dump($_POST);
                $_POST['articleDate'] = date('Y-m-d H:i:s');
                $article->hydrate($_POST);
                var_dump($article);
                $articleManager->editArticle($article);
                redirect($url, 'location');
            }

            //Suppression article
            if(!empty($_GET['article_id']) && !empty($_GET['del'])){
                $articleManager->deleteArticle($_GET['article_id']);
                redirect(base_url()."Articles/dashboard", 'location');
            }

        }else{ //Pour affichage de la liste des articles
            $data = get_data($this->_article_manager, $this->_article, 'getAllArticle');
            $this->smarty->assign('article', $data);
            $this->smarty->assign('page', 'admin/article.tpl');
        }   
        
        //Affichage dynamique des catégories dans le champ select
        $cat = $articleManager->getCategory();
        $catData = array('-- Catégorie --');

        foreach ($cat as $row)
        {
            array_push($catData, $row['categoryName']);
        }

        $this->smarty->assign('option', $catData); 
        $this->smarty->view('admin/dashboard.tpl');
    }
}