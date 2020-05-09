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
            $this->smarty->view('pages/galerie.tpl');
        }else{
            /*pagination start */
            $page_url= base_url()."Galeries/galerie";
            $total_rows = $this->_galerie_manager->count_galerie();

            $data_pagination = pagination($page_url, $total_rows, 6);
            $pagination_link = $data_pagination['pagination_link'];
            //var_dump($total_rows);
            $this->smarty->assign('pagination', $pagination_link);
            /*pagination end*/

            $data = get_all_data($this->_galerie_manager, $this->_galerie, 'getAllGalerie',$data_pagination['limit'], $data_pagination['offset']);
           // $data = $this->_galerie_manager->getAllGalerie($data_pagination['limit'],$data_pagination['offset']);
            //var_dump($data);

            $this->smarty->assign('galerie', $data);
            $this->smarty->view('pages/galeries.tpl');
        }
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
    
    public function editor(){
        // $count = $this->_galerie_manager->count_image("13");
        //$notBase = $this->_galerie_manager->eventNotInBase();
        // var_dump($notBase);

        if(!empty($_POST)){
            $timestamp_to_date = timestamp_to_date();
            
            $config['upload_path'] = "assets/img/upload";
            $config['allowed_types'] = "gif|jpg|png";
            $config['max_size'] = 2000;
            $config['file_name'] = $timestamp_to_date;
            $this->load->library('upload', $config);



            if(!$this->upload->do_upload('imgName')){
                echo json_encode(array('error' => $this->upload->display_errors()));
                
            }else{
                $upload_data = $this->upload->data();

                $this->load->library("image_lib");

                /*Resize image uploader */
                $resize_image["image_library"] = "gd2";
                $resize_image["source_image"] = $upload_data['full_path'];
                $config['create_thumb'] = FALSE;
                $resize_image["maintient_ratio"] = FALSE;
                $resize_image["width"] = 600;
                $resize_image["height"] = 600;

                $this->image_lib->initialize($resize_image);
                $this->image_lib->resize();

                echo json_encode(array('file_name' => $upload_data['file_name']));
                $_POST['imgName'] = $upload_data['file_name'];
                write_data($this->_galerie_manager, $this->_galerie, 'addImage', $_POST);
            }
            
            //var_dump($_POST);

        }


        $option = get_option_select_input($this->_galerie_manager, "eventNotInBase","eventId","eventName","Evénements");
        $this->smarty->assign("option", $option);
        // var_dump($option);

        $this->smarty->view('admin/galerie_creator.tpl');
    }


}