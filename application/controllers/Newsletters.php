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

        //Pour insertion dans la BDD
        if(!empty($_POST) && empty($_GET)){
            write_data($this->_newsletter_manager, $this->_newsletter, 'addNews', $_POST);
            redirect(base_url()."Newsletters/dashboard", 'location');
        }

        $data = get_all_data($this->_newsletter_manager, $this->_newsletter, 'getAllNews');
        $this->smarty->assign('news', $data);
        $this->smarty->assign('title', 'Dashboard - Newsletter');
        $this->smarty->assign('page', 'admin/news.tpl');
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