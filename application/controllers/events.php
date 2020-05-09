<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{
    
   private $_event_manager;
   private $_event;


    public function __construct(){
        parent::__construct();
        $this->_event_manager = create_object('Event_manager');
        $this->_event = create_object('Event');
    }

    public function events(){
        //Afficher un seul event
        if(!empty($_GET['event_id'])){            
        $data = get_data($this->_event_manager, $this->_event, 'getEvent', $_GET['event_id']);
        // var_dump($data);
        $this->smarty->assign('eventDetail', $data);

            $this->smarty->view('pages/event.tpl');

        }else{//Afficher tout les events

            /*pagination start */
            $page_url= base_url()."Events/events";
            $total_rows = $this->_event_manager->count_event();
            var_dump($total_rows);
            $data_pagination = pagination($page_url, $total_rows, 3);
            $pagination_link = $data_pagination['pagination_link'];

            $this->smarty->assign('pagination', $pagination_link);
            /*pagination end*/

            $data = get_all_data($this->_event_manager, $this->_event, 'getAllEvent', $data_pagination['limit'], $data_pagination['offset']); 
            $this->smarty->assign('event', $data);
            $this->smarty->view('pages/events.tpl');
        }
    }

    public function dashboard(){

        if(empty($_SESSION['id'])){
            redirect('pages/access_denied', 'location');
        }
        
        //Pour insertion dans la BDD
    
        if(!empty($_POST) && empty($_GET)){
            write_data($this->_event_manager, $this->_event, 'addEvent', $_POST, array('eventAuthor'=> $_SESSION['id']));
            redirect(base_url()."Events/dashboard", 'location');
        }
  
        if($_GET){
            $url = "Events/dashboard?event_id=".$_GET['event_id'];

            if(!empty($_GET['edit'])){
                $url .= "&edit=1&update=1";
            }

            $this->smarty->assign('url', $url);

            //Afficher un seul évènement
            if(!empty($_GET['event_id'])){
                $data = get_data($this->_event_manager, $this->_event, 'getEvent', $_GET['event_id']);
                $this->smarty->assign('eventDetail',$data);
                $this->smarty->assign('page', 'admin/event_detail.tpl');
                $this->smarty->view('admin/dashboard.tpl');
            }

            //Modification évènement
            if(!empty($_POST) && !empty($_GET['update'])){
                $date_modif = date('Y-m-d H:i:s');

                write_data($this->_event_manager, $this->_event, 'editEvent', $_POST, array('eventDate' => $date_modif));

                redirect($url, 'location');
            }

            //Suppression évènement
            if(!empty($_GET['event_id']) && !empty($_GET['del'])){
                del_data($this->_event_manager, 'deleteEvent', $_GET['event_id']);
                redirect(base_url()."Events/dashboard", 'location');
            }

        }else{ //Pour affichage de la liste des évènements

            /*pagination start */
            $page_url= base_url()."Events/dashboard";
            $total_rows = $this->_event_manager->count_event();

            $data_pagination = pagination($page_url, $total_rows, 10);
            $pagination_link = $data_pagination['pagination_link'];

            $this->smarty->assign('pagination', $pagination_link);
            /*pagination end*/

            $data = get_all_data($this->_event_manager, $this->_event, 'getAllEvent',$data_pagination['limit'], $data_pagination['offset']);
            // var_dump($data);
            $this->smarty->assign('event', $data);
            $this->smarty->assign('page', 'admin/event.tpl');
            $this->smarty->view('admin/dashboard.tpl');
        }   

        $this->smarty->assign('url', 'Events/dashboard');

        //Chargement de l'editeur de texte
        $script_ckeditor = 
        "<script>
            CKEDITOR.replace('eventContent', {
                heigth : 400,
                filebrowserUploadUrl: '".site_url('Events/dashboard')."',
                filebrowserImageUploadUrl: '".site_url('Events/upload')."'})
        </script>";

        $this->smarty->assign('script_ckeditor', $script_ckeditor);

        $this->smarty->view('admin/dashboard.tpl');
    }

    public function archives(){
        if(!empty($_GET['event_id'])){
            $data = get_data($this->_event_manager, $this->_event, 'getEvent', $_GET['event_id']);
            $this->smarty->assign('archiveDetail',$data);
            $this->smarty->assign('page', 'admin/archive_detail.tpl');
        }else{
            /*pagination start */
            $page_url= base_url()."Events/dashboard";
            $total_rows = $this->_event_manager->count_event();

            $data_pagination = pagination($page_url, $total_rows, 10);
            $pagination_link = $data_pagination['pagination_link'];

            $this->smarty->assign('pagination', $pagination_link);
            /*pagination end*/

            $data = get_all_data($this->_event_manager, $this->_event, 'getAllEvent',$data_pagination['limit'], $data_pagination['offset']);
            // var_dump($data);
            $this->smarty->assign('archive', $data);
            $this->smarty->assign('page', 'admin/archive.tpl');
        }
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function upload(){
        upload_image_ckeditor('events');
    }
}
