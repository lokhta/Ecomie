<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(empty($_SESSION['id'])){
            redirect('pages/access_denied', 'location');
        }
    }

    public function index(){
        //var_dump($_POST);
        $subscription_manager = create_object('Subscription_manager');
        $subscription = create_object('Subscription');
        
        $is_in_base = $subscription_manager->inBase($_SESSION['email']);
        
        $this->smarty->assign('is_in_base', $is_in_base);

        if(!empty($_POST['check_news']) && $_POST['check_news'] == 1 && !$is_in_base){
            $subscription->hydrate(array('subscribeEmail'=>$_SESSION['email']));
            write_data($subscription_manager, $subscription, 'addSubscriber', $_POST);
            //$is_in_base = $subscription_manager->addSubscriber($subscription);
            redirect(base_url().'dashboard', 'location');
        }

        $this->smarty->assign('page', 'admin/home.tpl');
        $this->smarty->assign('title', 'Ecomie - Tableau de bord');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function Galeries(){
        $this->smarty->assign('page', 'admin/archive.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }
}