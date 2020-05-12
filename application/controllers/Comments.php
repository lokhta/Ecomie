<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Comments
 * \author Sofiane AL AMRI
 * \version 3.0
 */

class Comments extends CI_Controller{
    private $_comment_manager;
    private $_comment;


    public function __construct(){
        parent::__construct();
        $this->_comment_manager = create_object('Comment_manager');
        $this->_comment = create_object('Comment');
    }


    /**
     * @brief add_comment() ajoute un commentaire
     */

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

        if(!empty($_POST) && empty($_GET['edit_com'])){
            write_data($this->_comment_manager, $this->_comment, 'addComment', $_POST, $data);
            echo json_encode(array("success" => "success"));
            // redirect($url, 'location');
        }
    }

    /**
     * @brief edit_comment() modifie un commentaire
     */

    public function edit_comment(){

        if(!empty($_GET['article_id'])){
            $url = base_url()."Articles/articles?article_id=".$_GET['article_id'];
        }elseif(!empty($_GET['event_id'])){
            $url = base_url()."Events/events?event_id=".$_GET['event_id'];
        }

        if(!empty($_GET['commentId'])){
            get_data($this->_comment_manager, $this->_comment, 'getComment', $_GET['commentId']);

            if(!empty($_POST) && $_GET['edit_com'] == 1){
                $date_modif = date('Y-m-d H:i:s');
                $data = array(
                    'commentDate' => $date_modif,
                );

                write_data($this->_comment_manager, $this->_comment, 'editComment', $_POST, $data);
                redirect($url, 'location');

            }elseif(!empty($_GET['commentReport'])){
                // var_dump($_GET);;
                write_data($this->_comment_manager, $this->_comment, 'editComment', $_GET, array('commentId' => $_GET["commentId"]));
                redirect($url, 'location');

            }elseif(!empty($_GET['del_com']) && $_GET['del_com'] == 1){
                del_data($this->_comment_manager, 'deleteComment', $_GET['commentId']);
                if(!empty($_GET['dash'])){
                    redirect(base_url()."dashboard", 'location');
                }else{
                    redirect($url, 'location');
                }

            }
        }
    }

    /**
     * @brief get_comment() récupère un commentaire de la BDD pour l'afficher 
     */

    public function get_comment(){

        if(!empty($_GET['article_id'])){
            $page_url = base_url()."Articles/articles?article_id=".$_GET['article_id'];

            $json_data =  get_comment($_GET['article_id']);
        }elseif(!empty($_GET['event_id'])){

            $page_url = base_url()."Events/events?event_id=".$_GET['event_id'];
            $json_data =  get_comment($_GET['event_id']);

        } 
        echo $json_data;
    }
}





