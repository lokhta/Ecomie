<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller{
    private $_comment_manager;
    private $_comment;


    public function __construct(){
        parent::__construct();

        // var_dump($_POST);
        $this->_comment_manager = create_object('Comment_manager');
        $this->_comment = create_object('Comment');
    }

    public function add_comment(){
        //Ajouter un commentaire
        if(!empty($_GET['article_id'])){
            $url = base_url()."Articles/articles?article_id=".$_GET['article_id'];

            $data = array(
                'commentAuthor' => $_SESSION['id'],
                'commentArticle' => $_GET['article_id'],
            );

        }elseif(!empty($_GET['event_id'])){
            $url = base_url()."Events/events?event_id=".$_GET['event_id'];
            
                $data = array(
                    'commentAuthor' => $_SESSION['id'],
                    'commentEvent' => $_GET['event_id'],
                );
        }

        //$url = base_url()."Articles/articles?article_id=".$_GET['article_id'];
        //var_dump($_GET);

        if(!empty($_POST) && empty($_GET['edit_com'])){
            write_data($this->_comment_manager, $this->_comment, 'addComment', $_POST, $data);
            echo json_encode(array("success" => "success"));
            // redirect($url, 'location');
        }
    }

    public function edit_comment(){

        if(!empty($_GET['article_id'])){
            $url = base_url()."Articles/articles?article_id=".$_GET['article_id'];
        }elseif(!empty($_GET['event_id'])){
            $url = base_url()."Events/events?event_id=".$_GET['event_id'];
        }

        if(!empty($_GET['comment_id'])){
            get_data($this->_comment_manager, $this->_comment, 'getComment', $_GET['comment_id']);

            if(!empty($_POST) && $_GET['edit_com'] == 1){
                $date_modif = date('Y-m-d H:i:s');
                $data = array(
                    'commentDate' => $date_modif,
                );

                write_data($this->_comment_manager, $this->_comment, 'editComment', $_POST, $data);
                redirect($url, 'location');

            }elseif(!empty($_GET['report_com']) && $_GET['report_com'] == 1){
                write_data($this->_comment_manager, $this->_comment, 'editComment', $_POST, array('commentReport' => 1));
                redirect($url, 'location');

            }elseif(!empty($_GET['del_com']) && $_GET['del_com'] == 1){
                del_data($this->_comment_manager, 'deleteComment', $_GET['comment_id']);
                
                redirect($url, 'location');
            }
        }
    }

    public function get_comment(){

        
        
        

        if(!empty($_GET['article_id'])){
            $page_url = base_url()."Articles/articles?article_id=".$_GET['article_id'];
            $total_rows = $this->_comment_manager->count_comment($_GET['article_id']);
            $data_pagination = pagination($page_url, $total_rows , $total_rows);

            $json_data =  get_comment($_GET['article_id'], $data_pagination['limit'], $data_pagination['offset']);
        }elseif(!empty($_GET['event_id'])){

            $page_url = base_url()."Events/events?event_id=".$_GET['event_id'];
            $total_rows = $this->_comment_manager->count_comment($_GET['event_id']);
            $data_pagination = pagination($page_url, $total_rows , 6);
            
            $json_data =  get_comment($_GET['event_id'], $data_pagination['limit'], $data_pagination['offset']);

        } 

        //echo $data_pagination["pagination_link"];
       // $this->smarty->assign("link", $data_pagination['pagination_link']);

        echo $json_data;
    }
}





