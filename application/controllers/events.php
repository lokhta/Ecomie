<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller{
    
   private $_event_manager;
   private $_event;


    public function __construct(){
        parent::__construct();
        $this->load->model('Event_manager');
        $this->load->model('Event');
        $this->_event_manager = create_object('Event_manager');
        $this->_event = create_object('Event');
    }

  public function events(){
    $eventManager = new Event_manager;
    $event = new Event;

    //Afficher un seul évènement
    if(!empty($_GET['event_id'])){

        $eventArray = $eventManager->getEvent($_GET['event_id']);
        $eventArray['author'] = $eventArray['userFirstname']; 
        $event->hydrate($eventArray);
        
         //var_dump($event);

        $this->smarty->assign('eventDetail', $event->getData());
        $this->smarty->view('pages/event.tpl');
    }else{
        //Afficher tout les events
        $eventData = $eventManager->getAllEvent();
        //var_dump($eventData);

        $eventList = array();

        foreach($eventData as $val){
            
            $event->hydrate($val);
            //var_dump($val);

            $data =  $event->getData();
            $data['author'] = $val['userFirstname']; 
            array_push($eventList, $data); 
        }
        //var_dump($eventList);

        $this->smarty->assign('event', $eventList);
        $this->smarty->view('pages/events.tpl');
    }
  }

  public function dashboard(){
    //Pour insertion dans la BDD
    if(!empty($_POST) && empty($_GET)){
        write_data($this->_event_manager, $this->_event, 'addEvent', $_POST, 'eventAuthor', $_SESSION['id']);
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
        }

        //Modification évènement
        if(!empty($_POST) && !empty($_GET['update'])){
            $date_modif = date('Y-m-d H:i:s');

            write_data($this->_event_manager, $this->_event, 'editEvent', $_POST, 'eventDate', $date_modif);

            redirect($url, 'location');
        }

        //Suppression évènement
        if(!empty($_GET['event_id']) && !empty($_GET['del'])){
            del_data($this->_event_manager, 'deleteEvent', $_GET['event_id']);
            redirect(base_url()."Events/dashboard", 'location');
        }

    }else{ //Pour affichage de la liste des évènements
        $data = get_data($this->_event_manager, $this->_event, 'getAllEvent');
        $this->smarty->assign('event', $data);
        $this->smarty->assign('page', 'admin/event.tpl');
        var_dump($data);
    }   
    
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