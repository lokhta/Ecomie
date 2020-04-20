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



        //============= DEBUT GESTION COMMENTAIRE EVENT ==============
            $comment_manager = create_object('Comment_manager');
            $comment = create_object('Comment');

            $url = base_url()."Events/events?event_id=".$_GET['event_id'];
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

            //Affichage des commentaires d'un Event
            $comment_data = get_all_data($comment_manager, $comment, 'getAllComment',$_GET['event_id']);
            // var_dump($comment_data);


            $this->smarty->assign('comment', $comment_data);
        //============= FIN GESTION COMMENTAIRE ARTICLE ==============

        

            $this->smarty->view('pages/event.tpl');

        }else{//Afficher tout les events
            $data = get_all_data($this->_event_manager, $this->_event, 'getAllEvent');

            $this->smarty->assign('event', $data);
            $this->smarty->view('pages/events.tpl');
        }
    }

  public function dashboard(){
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
        $data = get_all_data($this->_event_manager, $this->_event, 'getAllEvent');
        // var_dump($data);
        $this->smarty->assign('event', $data);
        $this->smarty->assign('page', 'admin/event.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }   
    $this->smarty->view('admin/dashboard.tpl');
}

  /* public function dashboard(){
    $eventManager = new Event_manager;
    $event = new Event;

     //var_dump($event);

    //Pour insertion dans la BDD
    if(!empty($_POST) && empty($_GET)){
        $_POST['eventAuthor'] = $_SESSION['id'];
        $event->hydrate($_POST);
        $eventManager->addEvent($event);
        redirect(base_url()."Events/dashboard", 'location');
    }

    if($_GET){
        $url = "Events/dashboard?event_id=".$_GET['event_id'];

        if(!empty($_GET['edit'])){
            $url .= "&edit=1&update=1";
        }
        $this->smarty->assign('url', $url);

        //Afficher un seul event
        if(!empty($_GET['event_id'])){
            $eventAdd = $eventManager->getEvent($_GET['event_id']);
            $event->hydrate($eventAdd);
            $data = $event->getData();
            $data['author'] = $eventAdd['userFirstname'];

            //var_dump($event);
             //var_dump($data);

            $this->smarty->assign('eventDetail',$data);
            $this->smarty->assign('page', 'admin/event_detail.tpl');
        }


        //Modification évènement
        if(!empty($_POST) && !empty($_GET['update'])){
            //var_dump($_POST);
            $_POST['eventDateStart'] = date('Y-m-d');
            $_POST['eventTimeStart'] = date('H:i:s');
            $_POST['eventDateEnd'] = date('Y-m-d');
            $_POST['eventTimeEnd'] = date('H:i:s');
            $event->hydrate($_POST);
            //var_dump($event);
            $eventManager->editEvent($event);
            redirect($url, 'location');
        }

        //Suppression évènement
        if(!empty($_GET['event_id']) && !empty($_GET['del'])){
            $eventManager->deleteEvenement($_GET['event_id']);
            redirect(base_url()."Events/dashboard", 'location');
    //    }

  //  }else{
        //Pour affichage de la liste des évènements
        $eventData = $eventManager->getAllEvent();

        $eventList = array();

        foreach($eventData as $val){

            $event->hydrate($val);

            //var_dump($event);
            $data =  $event->getData();
            $data['author'] = $val['userFirstname'];
            array_push($eventList, $data);

    //    }
        var_dump($eventList);
        
        $this->smarty->assign('event', $eventList);
        $this->smarty->assign('page', 'admin/event.tpl');
  //  }   
    
//}  
//}
*/
}
?>