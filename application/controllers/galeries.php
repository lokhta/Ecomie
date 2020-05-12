<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Galeries
 * \author Jean-Baptiste Abeilhe
 * \version 3.0
 * @brief  permet d'afficher ou de gérer les images des galeries
 */

class Galeries extends CI_Controller{
    
   private $_galerie_manager;
   private $_galerie;
   
    public function __construct(){
        parent::__construct();
        $this->_galerie_manager = create_object('Galerie_manager');
        $this->_galerie = create_object('Galerie');
    }

    /**
     * @brief galeries() affiche les images de la galerie
     */
   
    public function galeries() {
        if(!empty($_GET['event_id'])){
            $data = get_data($this->_galerie_manager, $this->_galerie, "getGalerie", $_GET['event_id']);

            $array_image = array();

            foreach($data as $key => $value){
                array_push($array_image, "<img src='".base_url()."assets/img/upload/".$value["imgName"]."' alt='".$value["imgAlt"]."' class='slide_image'>");
            }

            $this->smarty->assign("images", $array_image);

            $this->smarty->assign('galerieDetail', $data);

            $this->smarty->view('pages/galerie.tpl');
        }else{
            $data = get_all_data($this->_galerie_manager, $this->_galerie, 'getAllGalerie');

            $this->smarty->assign('galerie', $data);
            $this->smarty->view('pages/galeries.tpl');
        }
    }


    /**
     * @brief dashboard() affiche la page d'administration de la galerie dans le dashboard
     */

    public function dashboard(){

        if(!empty($_GET['event_id'])){
            $data = get_data($this->_galerie_manager, $this->_galerie, "getGalerie", $_GET['event_id']);

            $array_image = array();

            foreach($data as $key => $value){
                array_push($array_image, "<img src='".base_url()."assets/img/upload/".$value["imgName"]."' alt='".$value["imgAlt"]."' class='slide_image'>");
            }

            $this->smarty->assign("images", $array_image);

            $this->smarty->assign('galerieDetail', $data);

            $this->smarty->assign('page', 'admin/galerie_detail.tpl');
        }else{
            $data = get_all_data($this->_galerie_manager, $this->_galerie, 'getAllGalerie');


            $this->smarty->assign('galerie', $data);
            $this->smarty->assign('page', 'admin/galerie.tpl');
        }

        $this->smarty->view('admin/dashboard.tpl');

    }
    
    /**
     * @brief editor() permet d'éditer une galerie pour ajouter des images
     */

    public function editor(){

        if(!empty($_POST)){
            $count_image = $this->_galerie_manager->count_image($_POST['imgEvent']);
            if($count_image < 20){
                $_POST['imgName'] = upload_image("imgName",600, 600);
                write_data($this->_galerie_manager, $this->_galerie, "addImage",$_POST);
            }
        }


        $option = get_option_select_input($this->_galerie_manager, "eventNotInBase","eventId","eventName","Evénements");
        $this->smarty->assign("option", $option);

        $this->smarty->assign('page','admin/galerie_creator.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }


}