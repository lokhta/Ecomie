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
    $this->smarty->view('pages/connection.tpl');
    $this->load->library('encryption');
        if ($_POST)
        {
            $userManager = New User_manager;
            $getUser = $userManager->getUser();
            //var_dump($_POST);
            //var_dump($getUser);
            if (!empty($_POST['userEmail']))
            {
                if (!empty($_POST['userPwd']))
                {  
                    if (!empty($getUser))
                    {
                        $decryptedPwd = $getUser['userPwd'];
                        $getUser['userPwd'] = $this->encryption->decrypt($decryptedPwd);
                        //var_dump($getUser);
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
                            redirect(base_url()."users/profil", 'location');
                        }else{
                                echo 'Identifiants incorrects';
                        }
                    }else{
                        echo 'Identifiants incorrects';
                    }
                }else{
                    echo 'Veuillez renseigner un mot de passe';
                }
            }else{
                echo 'Veuillez renseigner une adresse mail';
            }
        }
    }
    

// Fonction de création de compte

    public function inscription()
    {
        $this->load->library('encryption');
        $userManager = new User_manager;
        //Pour insertion dans la BDD
        //var_dump($_POST);
        if(!empty($_POST['userName'])){
            
            $userObj = new User;
            $password = $_POST['userPwd'];
            $encryptedPwd = $this->encryption->encrypt($password);
            $_POST['userPwd'] = $encryptedPwd;
            $userObj->hydrate($_POST);
            var_dump($userObj);
            // echo 'ok';

            $userManager->addUser($userObj);
            //redirect(base_url()."Users/dashboard", 'location');
            //redirect("",'refresh');
        }else{
            echo"formulaire non valide";
            //redirect("",'refresh');
        }
    }

// Fonction de déconnexion / Kill la session

    public function logout()
    {
        session_destroy();
        redirect(base_url(), 'location');
    }

    public function profil()
    {
        $this->smarty->view('pages/profil.tpl');
        if(!empty($_POST)){ 
            $userManager = new User_manager;
            $userObj = new User;
            $userObj->hydrate($_POST);
            $userManager->editUser($userObj);
            var_dump($userObj);
            //Rafraichissement de la page
            //header('refresh:0');
        }
    }
}