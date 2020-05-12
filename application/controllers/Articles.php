<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller{

    private $_article_manager;
    private $_article;

    public function __construct(){
        parent::__construct();

        // var_dump($_POST);
        $this->_article_manager = create_object('Article_manager');
        $this->_article = create_object('Article');
    }

    public function articles(){

        //Afficher un seul article
        if(!empty($_GET['article_id'])){   

            $data = get_data($this->_article_manager, $this->_article, 'getArticle', $_GET['article_id']);
            // var_dump($data);
            $this->smarty->assign('articleDetail', $data);

            $this->smarty->view('pages/article.tpl');

        }else{//Afficher tout les articles

            if(!empty($_GET['search']) && $_GET['search'] == 1){
                $data = get_all_data($this->_article_manager, $this->_article, 'getAllArticle',$_POST['keyword']);
            }elseif(!empty($_GET['category_id'])){
                $data = get_all_data($this->_article_manager, $this->_article, 'getAllArticle',$_GET['category_id']);
            }else{
                $data = get_all_data($this->_article_manager, $this->_article, 'getAllArticle');
            }
            $this->smarty->assign('article', $data);
            $this->smarty->view('pages/savoir_faire.tpl');
        }
    }

    public function dashboard(){

        if(empty($_SESSION['id'])){
            redirect('pages/access_denied', 'location');
        }
        
        //Pour insertion dans la BDD
        if(!empty($_POST) && empty($_GET)){
            write_data($this->_article_manager, $this->_article, 'addArticle', $_POST, array('articleAuthor' => $_SESSION['id']));
            redirect(base_url()."Articles/dashboard", 'location');
        }

        if($_GET){
            $url = "Articles/dashboard?article_id=".$_GET['article_id'];
            $url_form = $url."&edit=1";

            $this->smarty->assign('url_form', $url_form);

            //Afficher un seul article
            if(!empty($_GET['article_id'])){
                $data = get_data($this->_article_manager, $this->_article, 'getArticle', $_GET['article_id']);
                $this->smarty->assign('articleDetail',$data);
                $this->smarty->assign('page', 'admin/article_detail.tpl');
            }

            //Validation des articles
            if(!empty($_GET['valide'])){

                if($_GET['valide'] == 1){
                    $data_edit_validate = array();
                    write_data($this->_article_manager, $this->_article, 'editArticle', $data_edit_validate, array('articleValidate' => $_GET['valide']));
                    $message = "<p>Bonjour ".$_GET["author"]."</p><p>Nous vous informons que votre article : ".$_GET["article_title"]." a été validé. Il est désormais publié sur le site d'Ecomie : ".base_url()."</p>";
                }elseif($_GET['valide'] == 2){
                    $message = "<p>Bonjour ".$_GET["author"]."</p><p>Nous avons le regret de vous informer que votre article : ".$_GET["article_title"]." n'a pas été valider</p>";
                }
                $subject= "Validation article";
                send_mail("Ecomie", $_GET["email"], $subject, $message, "html");

                redirect($url, 'location'); 
            }

            //Modification article
            if(!empty($_POST) && !empty($_GET['edit'])){
                $date_modif = date('Y-m-d H:i:s');

                write_data($this->_article_manager, $this->_article, 'editArticle', $_POST, array('articleDate'=>$date_modif));

                redirect($url, 'location');
            }

            //Suppression article
            if(!empty($_GET['article_id']) && !empty($_GET['del'])){
                del_data($this->_article_manager, 'deleteArticle', $_GET['article_id']);
                redirect(base_url()."Articles/dashboard", 'location');
            }

        }else{ //Pour affichage de la liste des articles


            $data = get_all_data($this->_article_manager, $this->_article, 'getAllArticle');
            $this->smarty->assign('article', $data);
            $this->smarty->assign('title', 'Dashboard - Articles');
            $this->smarty->assign('page', 'admin/article.tpl');
        }   
        
        //Affichage dynamique des catégories dans le champ select
        $catData = get_category_article($this->_article_manager);
        $this->smarty->assign('option', $catData); 

        $this->smarty->assign('url', 'Articles/dashboard');

        //Chargement de l'editeur de texte
        $script_ckeditor = 
        "<script>
            CKEDITOR.replace('articleContent', {
                heigth : 400,
                filebrowserUploadUrl: '".site_url('Articles/dashboard')."',
                filebrowserImageUploadUrl: '".site_url('Articles/upload')."'})
        </script>";

        $this->smarty->assign('script_ckeditor', $script_ckeditor);
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function upload(){
        upload_image_ckeditor('articles');
    }
}