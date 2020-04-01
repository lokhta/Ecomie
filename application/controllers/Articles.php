<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Article_manager');
        $this->load->model('Article');
    }

    public function articles(){
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
            //var_dump($articleData);

            $articleList = array();

            foreach($articleData as $val){
                $article = new Article;
                
                $val['articleAuthor'] = $val['userFirstname'];
                $val['articleCategory'] = $val['categoryName']; 
                
                $article->hydrate($val);
                array_push($articleList, $article->getData());
                //var_dump($article);
            }
            $this->smarty->assign('article', $articleList);
            $this->smarty->view('pages/savoir_faire.tpl');
        }
    }

    public function dashboard(){
        $articleManager = new Article_manager;
        $article = new Article;

        // var_dump($article);

        //Pour insetion dans la BDD
        if(!empty($_POST) && empty($_GET)){
            $articleObj = new Article;
            $articleObj->hydrate($_POST);
            $articleManager->addArticle($articleObj);
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
                $articleAdd = $articleManager->getArticle($_GET['article_id']);
                $article->hydrate($articleAdd);
                $data = $article->getData();
                $data['author'] = $articleAdd['userFirstname'];
                $data['categoryName'] = $articleAdd['categoryName'];

                // var_dump($article);
                // var_dump($data);

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

        }else{
            //Pour affichage de la liste des articles
            $articleData = $articleManager->getAllArticle();

            $articleList = array();

            foreach($articleData as $val){
    
                if($val['articleValidate'] == 0){
                    $val['articleValidate'] = '<i class="fas fa-hourglass-half"></i>';
                }elseif($val['articleValidate'] == 1){
                    $val['articleValidate'] = '<i class="far fa-check-circle"></i>';
                }elseif($val['articleValidate'] == 2){
                    $val['articleValidate'] = '<i class="far fa-times-circle"></i>';
                }
                
                $article->hydrate($val);

                // var_dump($article);
                $data =  $article->getData();
                $data['author'] = $val['userFirstname'];
                $data['articleCategory'] = $val['categoryName']; 
                array_push($articleList, $data);

            }
            // var_dump($articleList);
            
            $this->smarty->assign('article', $articleList);


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