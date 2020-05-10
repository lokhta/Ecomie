<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        // if((empty($_SESSION['id']))||(($_SESSION['role']) =='3')){
        //     redirect('pages/access_denied', 'location');
        // }
    }

    public function index(){
        //var_dump($_POST);
        $subscription_manager = create_object('Subscription_manager');
        $subscription = create_object('Subscription');
        
        //Permettre a un membre de s'abonné à la newsletter
        $is_in_base = $subscription_manager->inBase($_SESSION['email']);
        $this->smarty->assign('is_in_base', $is_in_base);
        if(!empty($_POST['check_news']) && $_POST['check_news'] == 1 && !$is_in_base){
            $subscription->hydrate(array('subscribeEmail'=>$_SESSION['email']));
            write_data($subscription_manager, $subscription, 'addSubscriber', $_POST);
            //$is_in_base = $subscription_manager->addSubscriber($subscription);
            redirect(base_url().'dashboard', 'location');
        }

        //Nombre d'article publié
        $article_manager = create_object("Article_manager");
        $count_article = $article_manager->count_article();
        $this->smarty->assign("nb_articles", $count_article);

        //Nombre d'utilisateur inscrit
        $user_manager = create_object("User_manager");
        $count_user = $user_manager->count_user();
        $this->smarty->assign("nb_users", $count_user);

        //Nombre d'event à venir
        $event_manager = create_object("Event_manager");
        $count_event = $event_manager->count_event();
        $this->smarty->assign("nb_events", $count_event);

        //Coment signalé
        $comment_manager = create_object("Comment_manager");
        $com_report = $comment_manager->getAllComment();
        $this->smarty->assign("com_report", $com_report);
        // var_dump($com_report);



        $this->smarty->assign('page', 'admin/home.tpl');
        $this->smarty->assign('title', 'Ecomie - Tableau de bord');
        $this->smarty->view('admin/dashboard.tpl');
    }

    public function Galeries(){
        $this->smarty->assign('page', 'admin/archive.tpl');
        $this->smarty->view('admin/dashboard.tpl');
    }
}