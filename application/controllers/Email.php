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
    */

    public function send_page(){
        $subject = "Email envoyé par ".$_GET["sender"];
        $message = $_GET["sender"]." vous a envoyé cette article qui pourrait vous plaire : ".$_GET["url"];
        
        send_mail($_GET['sender'], $_GET['recipient'], $subject, $message, "text");
    }

    public function send_warning(){
        $subject = "Avertissement : un de vos commentaires a été signalé";
        $message ="<p>Bonjour ".$_GET["author"]."</p><p>Nous vous informons que votre commentaire ci-dessous a été signalé. Nous vous envoyons cette avertissement car votre commentaires a été jugé abusif, indésirable ou injurieux.</p><p>Commentaire signalé : </p><p>".$_GET["comment"]."</p>";
        
        send_mail("Ecomie", $_GET['email'], $subject, $message, "html");
        redirect(base_url()."dashboard", "location");
    }

    public function send_reponse(){
        send_mail("Ecomie", $_GET['recipient'], $_GET["subject"], $_GET["reponse"], "text");
    }
   
}