<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Email
 * \author Sofiane AL AMRI
 * \version 1.0
 * @brief permet d'envoyer un mail
 */

class Email extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
    }

    /**
    * @brief send_page() permet de partager un article par mail
    * @param $subject contient l'objet du mail avec le nom de l'utilisateur qui l'as envoyé
    * @param $message contient le contenu du mail avec le nom de l'utilisateur qui l'as envoyé ainsi que le lien de l'article
    * @param send_mail appel la fonction dans le fichier func_helper pour envoyer le mail à sont destinataire
    */

    public function send_page(){
 
        $subject = "Email envoyé par ".$_GET["sender"];
        $message = $_GET["sender"]." vous a envoyé cette article qui pourrait vous plaire : ".$_GET["url"];
        
        send_mail($_GET['sender'], $_GET['recipient'], $subject, $message, "text");

    }
   
}