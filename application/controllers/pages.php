<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Contrôleur Pages
 * \author Sofiane AL AMRI
 * \version 1.0
 */

class Pages extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    /**
    * @brief connexion() permet d'afficher la page de connection
    */

    public function connexion(){
        $this->smarty->view('pages/connection.tpl');
    }

    /**
    * @brief inscription() permet d'afficher la page d'inscription
    */

    public function inscription(){
        $this->smarty->assign('url_form', base_url()."users/inscription");
        $this->smarty->view('pages/inscription.tpl');
    }


    /** 
    * @brief galerie() permet d'afficher la page galerie
    */

    public function galerie(){
        $this->smarty->view('pages/galeries.tpl');
    }

    /** 
    * @brief contact() permet d'afficher la page contact
    */

    public function contact(){
        $this->smarty->assign('url_form', base_url()."forms/send_message");
        $this->smarty->view('pages/contact.tpl');
    }

    /** 
    * @brief cgu() permet d'afficher la page des conditions d'utilisations
    */

    public function cgu(){
        $this->smarty->view('pages/cgu.tpl');
    }

    /** 
    * @brief mentions() permet d'afficher la page des mentions légales
    */

    public function mentions(){
        $this->smarty->view('pages/mentions.tpl');
    }

    /** 
    * @brief plan() permet d'afficher la page du plan du site
    */

    public function plan(){
        $this->smarty->view('pages/plan.tpl');
    }

    /** 
    * @brief access_denied() permet d'afficher la page d'erreur quand l'utilisateur n'as pas accès à l'url qu'il a renseigné
    */

    public function access_denied(){
        $this->smarty->view('pages/access_denied.tpl');
    }
}