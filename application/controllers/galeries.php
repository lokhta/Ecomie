<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeries extends CI_Controller{
    
   private $_galerie_manager;
   private $_galerie;
   
  

    public function __construct(){
        parent::__construct();
        $this->_galerie_manager = create_object('Galerie_manager');
        $this->_galerie = create_object('Galerie');
    }

   
    public function galeries() {
        //Afficher une seule galerie
        if(!empty($_GET['event_id'])){            
        $data = get_data($this->_galerie_manager, $this->_galerie, 'getGalerie', $_GET['event_id']);
        //var_dump($data);
        $this->smarty->assign('galerieDetail', $data);

        //============= DEBUT GESTION COMMENTAIRE ARCHIVE ==============
        $comment_manager = create_object('Comment_manager');
        $comment = create_object('Comment');

        $url = base_url()."Galeries/galeries?event_id=".$_GET['event_id'];
        $this->smarty->assign('url', $url);

        //Ajouter un commentaire
        if(!empty($_POST) && empty($_GET['edit_com'])){
            $data = array(
                'commentAuthor' => $_SESSION['id'],
                'commentEvent' => $_GET['event_id'],
            );
            write_data($comment_manager, $comment, 'addComment', $_POST, $data);
            redirect($url, 'refresh');
        }

        //Modifier un commentaire
        if(!empty($_GET['comment_id'])){
            get_data($comment_manager, $comment, 'getComment', $_GET['comment_id']);

            

            if(!empty($_POST) && $_GET['edit_com'] == 1){
                $date_modif = date('Y-m-d H:i:s');
                $data = array(
                    'commentDate' => $date_modif,
                );

                write_data($comment_manager, $comment, 'editComment', $_POST, $data);
                redirect($url, 'refresh');

            }elseif($_GET['report_com'] == 1){
                write_data($comment_manager, $comment, 'editComment', $_POST, array('commentReport' => 1));
                redirect($url, 'refresh');

            }elseif($_GET['del_com'] == 1){
                del_data($comment_manager, 'deleteComment', $_GET['comment_id']);
                redirect($url, 'refresh');
            }
        }

        //Affichage des commentaires de la galerie
        $comment_data = get_all_data($comment_manager, $comment, 'getAllComment',$_GET['event_id']);
        //var_dump($comment_data);


        $this->smarty->assign('comment', $comment_data);
        //============= FIN GESTION COMMENTAIRE GALERIE ==============

            $this->smarty->view('pages/galerie.tpl');

        }else{//Afficher toutes les galeries
           $data = get_all_data($this->_galerie_manager, $this->_galerie, 'getAllGalerie'); 
            $this->smarty->assign('galerie', $data);
            $this->smarty->view('pages/galeries.tpl');
        }
    }


    public function dashboard(){
        //Pour insertion dans la BDD
    
        if(!empty($_POST) && empty($_GET)){
            write_data($this->_galerie_manager, $this->_galerie, 'addGalerie', $_POST, array('eventAuthor'=> $_SESSION['id']));
            redirect(base_url()."Galeries/dashboard", 'location');
        }
  
        if($_GET){
            $url = "Galeries/dashboard?event_id=".$_GET['event_id'];

            if(!empty($_GET['edit'])){
                $url .= "&edit=1&update=1";
            }

            $this->smarty->assign('url', $url);

            //Afficher une seule galerie
            if(!empty($_GET['event_id'])){
                $data = get_data($this->_galerie_manager, $this->_galerie, 'getGalerie', $_GET['event_id']);
                $this->smarty->assign('galerieDetail',$data);
                $this->smarty->assign('page', 'admin/galerie_detail.tpl');
                $this->smarty->view('admin/dashboard.tpl');
            }

            //Modification galerie
            if(!empty($_POST) && !empty($_GET['update'])){
                $date_modif = date('Y-m-d H:i:s');

                write_data($this->_galerie_manager, $this->_galerie, 'editGalerie', $_POST, array('eventDate' => $date_modif));

                redirect($url, 'location');
            }

            //Suppression de la galerie
            if(!empty($_GET['event_id']) && !empty($_GET['del'])){
                del_data($this->_galerie_manager, 'deleteGalerie', $_GET['event_id']);
                redirect(base_url()."Galeries/dashboard", 'location');
            }

        }else{ //Pour affichage de la liste des galeries
            $data = get_all_data($this->_galerie_manager, $this->_galerie, 'getDashGalerie');
            //var_dump($data);
            $this->smarty->assign('galerie', $data);
            $this->smarty->assign('page', 'admin/galerie.tpl');
            $this->smarty->view('admin/dashboard.tpl');
        }   

        $this->smarty->assign('url', 'Galeries/dashboard');

        //Chargement de l'editeur de texte
        $script_ckeditor = 
        "<script>
            CKEDITOR.replace('eventContent', {
                heigth : 400,
                filebrowserUploadUrl: '".site_url('Galeries/dashboard')."',
                filebrowserImageUploadUrl: '".site_url('Galeries/upload')."'})
        </script>";

        $this->smarty->assign('script_ckeditor', $script_ckeditor);

        $this->smarty->view('admin/dashboard.tpl');
    }

    public function upload(){
        upload_image_ckeditor('images');
    }
}