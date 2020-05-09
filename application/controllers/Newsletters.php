<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters extends CI_Controller{
    private $_newsletter_manager;
    private $_newsletter;

    public function __construct(){
        parent::__construct();

        $this->_newsletter_manager = create_object('Newsletter_manager');
        $this->_newsletter = create_object('Newsletter');
    }

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
            $url_form = "Newsletters/dashboard?news_id=".$_GET['news_id'];

            if(!empty($_GET['edit'])){
                $url_form .= "&edit=1&update=1";
            }

            $this->smarty->assign('url_form', $url_form);

            //Afficher une seul news
            if(!empty($_GET['news_id'])){
                $data = get_data($this->_newsletter_manager, $this->_newsletter, 'getNews', $_GET['news_id']);
                $this->smarty->assign('newsDetail',$data);
                $this->smarty->assign('page', 'admin/news_detail.tpl');
            }

            //Modification news
            if(!empty($_POST) && !empty($_GET['update'])){
                $date_modif = date('Y-m-d H:i:s');

                write_data($this->_newsletter_manager, $this->_newsletter, 'editNews', $_POST, array('newsDate'=>$date_modif));

                redirect($url_form, 'location');
            }

            //Suppression news
            if(!empty($_GET['news_id']) && !empty($_GET['del'])){
                del_data($this->_newsletter_manager, 'deleteNews', $_GET['news_id']);
                redirect(base_url()."Newsletters/dashboard", 'location');
            }

        }else{
            /* pagination start */
            $page_url= base_url()."newsletters/dashboard";
            $total_rows = $this->_newsletter_manager->count_news();
            //var_dump($total_rows);
            $data_pagination = pagination($page_url, $total_rows, 10);
            $pagination_link = $data_pagination['pagination_link'];

            $this->smarty->assign('pagination', $pagination_link);
            /*pagination end*/

            $data = get_all_data($this->_newsletter_manager, $this->_newsletter, 'getAllNews', $data_pagination['limit'], $data_pagination['offset']);
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

    public function upload(){
        upload_image_ckeditor('newsletter');
    }
}