<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Newsletters
 * \author Sofiane AL AMRI
 * \version 3.0
 * @brief  Ce contrôleur permet de gérer la newsletter, création/suppression/modification et envoi
 */

class Newsletters extends CI_Controller{
    private $_newsletter_manager;
    private $_newsletter;

    public function __construct(){
        parent::__construct();

        $this->_newsletter_manager = create_object('Newsletter_manager');
        $this->_newsletter = create_object('Newsletter');
    }

    /**
     * @brief dashboard() permet d'afficher la page newsletter dans la dashboard et de gérer l'insertion dans la BDD, l'affichage, la modification, la suppression et l'envoi par mail d'une newsletter
     */

    public function dashboard(){
        if((empty($_SESSION['id']))||(($_SESSION['role'])!='1')){
            redirect('pages/access_denied', 'location');
        }
        
        //Pour insertion dans la BDD
        if(!empty($_POST) && empty($_GET)){
            write_data($this->_newsletter_manager, $this->_newsletter, 'addNews', $_POST);
            redirect(base_url()."Newsletters/dashboard", 'location');
        }

        if($_GET){
            $url = "Newsletters/dashboard?news_id=".$_GET['news_id'];
            $url_form = $url."&edit=1";

            $this->smarty->assign('url_form', $url_form);

            //Afficher une seul news
            if(!empty($_GET['news_id'])){
                $data = get_data($this->_newsletter_manager, $this->_newsletter, 'getNews', $_GET['news_id']);



                $this->smarty->assign('newsDetail',$data);
                $this->smarty->assign('page', 'admin/news_detail.tpl');
            }

            //Modification news
            if(!empty($_POST) && !empty($_GET['edit'])){
                $date_modif = date('Y-m-d H:i:s');

                write_data($this->_newsletter_manager, $this->_newsletter, 'editNews', $_POST, array('newsDate'=>$date_modif));

                redirect($url_form, 'location');
            }

            //Suppression news
            if(!empty($_GET['news_id']) && !empty($_GET['del'])){
                del_data($this->_newsletter_manager, 'deleteNews', $_GET['news_id']);
                redirect(base_url()."Newsletters/dashboard", 'location');
            }

            //Envoi de la newsletter aux abonné

            if(!empty($_GET['send']) && $_GET['send'] == 1){
                $subscription_manager = create_object("Subscription_manager");
                $liste_emails = $subscription_manager->getEmails();
                $news = get_data($this->_newsletter_manager, $this->_newsletter, "getNews", $_GET["news_id"]);

                $subject = $news['newsTitle'];
                $message = "<div><h1>".$subject."</h1>".$news['newsContent']."</div>";

                foreach($liste_emails as $email){
                    send_mail("ecomie", $email, $subject, $message, "html");
                }
                
                $this->smarty->assign("success", "<div class='message_success alert-success'>La newsletter a été envoyé</div>");
            }

        }else{
            $data = get_all_data($this->_newsletter_manager, $this->_newsletter, 'getAllNews');
            $this->smarty->assign('news', $data);
            $this->smarty->assign('title', 'Dashboard - Newsletter');
            $this->smarty->assign('page', 'admin/news.tpl');
        }


        $this->smarty->assign('url', 'Newsletters/dashboard');
        $script_ckeditor = 
        "<script>
            CKEDITOR.replace('newsContent', {
                heigth : 400,
                filebrowserUploadUrl: '".site_url('Newsletters/dashboard')."',
                filebrowserImageUploadUrl: '".site_url('Newsletters/upload')."'})
        </script>";

        $this->smarty->assign('script_ckeditor', $script_ckeditor);
        $this->smarty->view('admin/dashboard.tpl');
    }

    /**
     * @brief upload() permet d'uploader une image avec ckeditor
     */

    public function upload(){
        upload_image_ckeditor('newsletter');
    }
}