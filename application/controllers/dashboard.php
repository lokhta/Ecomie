<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->smarty->assign('page', 'admin/home.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function membres(){
        $this->smarty->assign('page', 'admin/membre.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function articles(){
        $this->load->model('Article_manager');
        $this->load->model('Article');

        $articleManager = new Article_manager;
        //Pour insetion dans la BDD
        if(!empty($_POST)){
            $articleObj = new Article;
            $articleObj->hydrate($_POST);
            $articleManager->addArticle($articleObj);
        }

        //Pour affichage de la liste des articles
        $articleData = $articleManager->getAllArticle();

        $articleList = array();

        foreach($articleData as $val){
            $article = new Article;
            
            $val['articleAuthor'] = $val['userFirstname'];
            $val['articleCategory'] = $val['categoryName']; 

            if($val['articleValidate'] == 0){
                $val['articleValidate'] = "En cours de traitement";
            }elseif($val['articleValidate'] == 1){
                $val['articleValidate'] = "Valider";
            }elseif($val['articleValidate'] == 2){
                $val['articleValidate'] = "Refuser";
            }
            
            $article->hydrate($val);

            array_push($articleList, $article->getData());
        }
        $this->smarty->assign('article', $articleList);

        //Affichage dynamique des catégories dans le champ select
        $cat = $articleManager->getCategory();
        $catData = array('-- Catégorie --');

        foreach ($cat as $row)
        {
            array_push($catData, $row['categoryName']);
        }
        $this->smarty->assign('option', $catData);

        $this->smarty->assign('page', 'admin/article.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function evenements(){
        $this->smarty->assign('page', 'admin/event.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function newsletters(){
        $this->smarty->assign('page', 'admin/news.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function messagerie(){
        $this->smarty->assign('page', 'admin/messagerie.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function archives(){
        $this->smarty->assign('page', 'admin/archive.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }
}