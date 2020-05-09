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

    }


    public function dashboard(){

        if(!empty($_GET['event_id'])){
            $data = get_data($this->_galerie_manager, $this->_galerie, "getGalerie", $_GET['event_id']);

            $array_image = array();

            foreach($data as $key => $value){
                array_push($array_image, "<img src='".base_url()."assets/img/upload/".$value["imgName"]."' alt='".$value["imgAlt"]."' class='slide_image' style='width:500px'>");
            }

            

            // var_dump($array_image);
            $this->smarty->assign("images", $array_image);

            $this->smarty->assign('galerieDetail', $data);

            // var_dump($data);
            $this->smarty->assign('page', 'admin/galerie_detail.tpl');
        }else{
            /*pagination start */
            $page_url= base_url()."Galeries/dashboard";
            $total_rows = $this->_galerie_manager->count_galerie();

            $data_pagination = pagination($page_url, $total_rows, 9);
            $pagination_link = $data_pagination['pagination_link'];
            //var_dump($total_rows);
            $this->smarty->assign('pagination', $pagination_link);
            /*pagination end*/

            $data = get_all_data($this->_galerie_manager, $this->_galerie, 'getAllGalerie',$data_pagination['limit'], $data_pagination['offset']);
           // $data = $this->_galerie_manager->getAllGalerie($data_pagination['limit'],$data_pagination['offset']);
            //var_dump($data);

            $this->smarty->assign('galerie', $data);
            $this->smarty->assign('page', 'admin/galerie.tpl');
        }

        $this->smarty->view('admin/dashboard.tpl');

    }

}