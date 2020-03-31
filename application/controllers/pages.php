<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pages extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function articles(){
        $this->load->model('Article_manager');
        $this->load->model('Article');

        $articleManager = new Article_manager;

        //Afficher un seul article

        if(!empty($_GET['article_id'])){

            $articleArray = $articleManager->getArticle($_GET['article_id']);
            $articleRow = new Article;
        
            $articleArray['articleAuthor'] = $articleArray['userFirstname'];
            $articleArray['articleCategory'] = $articleArray['categoryName'];
            $articleRow->hydrate($articleArray);
            
            // var_dump($articleRow);

            $this->smarty->assign('articleDetail', $articleRow->getData());
            $this->smarty->view('pages/article.tpl');
        }else{

            //Afficher tout les articles
            $articleData = $articleManager->getAllArticle();

            $articleList = array();

            foreach($articleData as $val){
                $article = new Article;
                
                $val['articleAuthor'] = $val['userFirstname'];
                $val['articleCategory'] = $val['categoryName']; 
                
                $article->hydrate($val);
                array_push($articleList, $article->getData());
            }
        
            $this->smarty->assign('article', $articleList);
            $this->smarty->view('pages/savoir_faire.tpl');
        }
    }

    public function evenements(){
        $this->smarty->view('pages/events.tpl');
    }

    public function connexion(){
        $this->smarty->view('pages/connection.tpl');
    }

    public function inscription(){
        $this->smarty->view('pages/inscription.tpl');
    }


    public function galerie(){
        $this->smarty->view('pages/galerie.tpl');
    }

    public function contact(){
        $this->smarty->view('pages/contact.tpl');
    }

    public function cgu(){
        $this->smarty->view('pages/cgu.tpl');
    }

    public function mentions(){
        $this->smarty->view('pages/mentions.tpl');
    }

    public function plan(){
        $this->smarty->view('pages/plan.tpl');
    }
}