<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
        
// Fonction du constructeur

    public function __construct(){
            parent::__construct();
            $this->load->model('User_manager');
            $this->load->model('User');
    }

// Fonction pour la vérification de connexion

    public function connexion()
    {
        if ($_POST)
        {
            $userManager = New User_manager;
            $getUser = $userManager->getUser();
            //var_dump($getUser);
            if (empty($getUser))
            {
                echo "erreur email";
                $this->smarty->view('pages/connection.tpl');
            }else
            {
                if ($_POST['userPwd'] == $getUser['userPwd'])
                {
                    $user = New User;
                    $user->hydrate($getUser);
                    //var_dump($user);

                    $userTab = $user->getData();

                    //Création de la session 
                    foreach($userTab as $key => $value){
                        $keys = lcfirst(str_replace('user','',$key));
                        $_SESSION[$keys] = $value;
                    }

                    // var_dump($_SESSION);
                    redirect(base_url()."dashboard", 'location');
                }
                else
                {
                    echo "erreur mot de passe";
                    $this->smarty->view('pages/connection.tpl');
                }
                
            }
        }
        
        $this->smarty->view('pages/connection.tpl');
    }

// Fonction de création de compte

    public function inscription()
    {
        $userManager = new User_manager;
        //Pour insertion dans la BDD
        //var_dump($_POST);
        if(!empty($_POST['userName'])){
            $userObj = new User;
            $userObj->hydrate($_POST);
            
            // var_dump($userObj);
            // echo 'ok';

            $userManager->addUser($userObj);
            //redirect(base_url()."Users/dashboard", 'location');
            redirect("",'refresh');
        }else{
            echo"formulaire non valide";
            redirect("",'refresh');
        }
    }

// Fonction de déconnexion / Kill la session

    public function logout()
    {
        session_destroy();
    }

}
