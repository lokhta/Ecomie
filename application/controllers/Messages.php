<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Messages
 * \author Sofiane AL AMRI
 * \version 3.0
 * @brief  Ce contrôleur permet de gérer l'envoi et l'affichage des messages envoyés par la page contact
 */

class Messages extends CI_Controller{
    private $_message_manager;
    private $_message;

    public function __construct(){
        parent::__construct();
        $this->_message_manager = create_object("Message_manager");
        $this->_message = create_object("Message");
    }

    /**
     * @brief send_message() enregistre les données dans la BDD et les affiches dans le dashboard
     * @param $_POST contient les informations du message (adresse mail, objet, contenus, validation des conditions d'utilisations)
     * @param write_data exécute le helper dans func_helper.php avec les paramètres associés
     * @param json_encode exécute le script java pour afficher les erreurs sur la page contact
     */

    public function send_message(){
        if(!empty($_POST['msgContent'])){
            write_data($this->_message_manager, $this->_message,"addMessage" ,$_POST);
            echo json_encode(array("success" => "<div class='alert alert-success'>Votre message a bien été envoyé</div>"));
        }else{
            echo json_encode(array("error"=>true, "error_message" => "<div class='alert-error'>Veuillez renseigner un message</div>"));
        }
    }

    /**
     * @brief dashboard() permet d'afficher tout les messages reçus dans le dashboard et de les gérés
     * @param $_GET cette variable contient l'identifiant du message lorsque l'on clique dessus
     * @param $data contient les données du message qu'il récupère de la BDD
     * @param del_data supprime les données dans la BDD en fonction de l'id du message séléctionné
     * @param get_all_data récupère tout les messages associés à l'id de l'utilisateur depuis la BDD
     */

    public function dashboard(){
        if(!empty($_GET)){

            if(!empty($_GET['message_id'])){
                $data = get_data($this->_message_manager, $this->_message, 'getMessage', $_GET['message_id']);
                $this->smarty->assign('msg',$data);
                $this->smarty->assign('page', 'admin/message_detail.tpl');
            }

            //Suppression message
            if(!empty($_GET['message_id']) && !empty($_GET['del'])){
                del_data($this->_message_manager, 'delMessage', $_GET['message_id']);
                redirect(base_url()."Messages/dashboard", 'location');
            }
            
        }else{
            $data = get_all_data($this->_message_manager, $this->_message, "getAllMessage", $_SESSION['id']);
            $this->smarty->assign("message", $data);
            $this->smarty->assign('page', 'admin/messagerie.tpl');
        }
        $this->smarty->view('admin/dashboard.tpl');

    }
}