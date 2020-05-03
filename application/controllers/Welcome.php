<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$this->load->view('welcome_message');
	// }

	public function __construct(){

		parent::__construct();
		
		$this->smarty->assign('base_url', base_url());
    }

    public function index(){

		//Inscription newsletter
		if(!empty($_POST) && empty($_GET)){

			$subscription_manager = create_object('Subscription_manager');
			$subscription = create_object('Subscription');

            write_data($subscription_manager, $subscription, 'addSubscriber', $_POST);
            redirect(base_url(), 'location');
		}
		
		$this->smarty->view('pages/home.tpl');
		
	}

}
