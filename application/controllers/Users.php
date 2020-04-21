<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
        
    private $_user_manager;
    private $_user;
// Fonction du constructeur

    public function __construct(){
            parent::__construct();
            $this->load->model('User_manager');
            $this->load->model('User');
            $this->_user_manager = create_object('User_manager');
            $this->_user = create_object('User');
    }

// Fonction pour la vérification de connexion

    public function connexion()
    {
    $this->smarty->view('pages/connection.tpl');
    $this->load->library('encryption');
        if ($_POST)
        {
            $userManager = New User_manager;
            $getUser = $userManager->inBase();
            //var_dump($_POST);
            // var_dump($getUser);
            if (!empty($_POST['userEmail']))
            {
                if (!empty($_POST['userPwd']))
                {  
                    if (!empty($getUser))
                    {
                        //var_dump($getUser);
                        if (password_verify($_POST['userPwd'], $getUser['userPwd']))
                        {
                            $user = New User;
                            $user->hydrate($getUser);
                            // var_dump($user);exit;

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
            if($_POST['userPwd'] == $_POST['confirmPwd']){
                $userObj = new User;
                $userObj->hydrate($_POST);
                //var_dump($userObj);
    
                $userManager->addUser($userObj);
                //redirect(base_url()."Users/dashboard", 'location');
                redirect("",'refresh');
            }else{
                echo"formulaire non valide";
                //redirect("",'refresh');
            }
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

// Fonction de la page modification des données utilisateurs
    public function profil()
    {   

        
        //Condition pour la suppression de l'image de profil
        // if ($_GET){
        //     $_SESSION['avatar'] = 'user-solid.svg';
        //     foreach($_SESSION as $key => $value){
        //         $key= ucfirst($key);
        //         $key_session = "user".$key;
        //         $_GET[$key_session] = $value;
        //     }
        //     //$imagePath = 'C:\wamp64\www\Ecomie\assets\img\'.$_GET;
        //     // unlink($imagePath);
        //     write_data($this->_user_manager, $this->_user, 'editUser', $_GET, array('userId'=>$_SESSION['id']));
        //     redirect(base_url()."users/profil");
        // }

        if(!empty($_GET['del']) && $_GET['del'] == 1){
            $this->_user_manager->del_avatar($_SESSION['id']);
            $this->smarty->assign('avatar', 'user-solid.svg');
            $_SESSION['avatar'] =  'user-solid.svg';
            redirect(base_url()."users/profil", 'refresh');
        }

        $avatarIcon =  $_SESSION['avatar'];
        var_dump($avatarIcon);
        $this->smarty->assign('avatar', $avatarIcon);
        $this->smarty->view('pages/profil.tpl');
        

        if(!empty($_POST)){
            $timestamp_to_date = timestamp_to_date();
            
            $config['upload_path'] = "assets/img/upload";
            $config['allowed_types'] = "gif|jpg|png";
            $config['max_size'] = 70;
            $config['file_name'] = $_SESSION['firstname'].'_'.$_SESSION['id'].'_'. $timestamp_to_date;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('userAvatar')){
                echo json_encode(array('error' => $this->upload->display_errors()));
                
            }else{
                $upload_data = $this->upload->data();
                echo json_encode(array('file_name' => $upload_data['file_name']));
                $_POST['userAvatar'] = $upload_data['file_name'];
            }
            write_data($this->_user_manager, $this->_user, 'editUser', $_POST, array('userId'=>$_SESSION['id']));
            redirect(base_url()."users/profil", 'refresh');
        }
    }

    public function membres()
    {
        // var_dump($_SESSION);
        $data_list = get_all_data($this->_user_manager, $this->_user,'getAllUser');
        //var_dump($data);

        if(!empty($_GET['user_id']) && empty($_GET['del'])){
            $data_user = get_data($this->_user_manager, $this->_user, "getUser", $_GET['user_id']);

            $role = get_role_user($this->_user_manager);

            $this->smarty->assign('option', $role); 

            $this->smarty->assign('user', $data_user);
        }

        if(!empty($_POST['userRole'])){
            write_data($this->_user_manager, $this->_user, 'editUser', $_POST);
            redirect(base_url()."users/membres", 'refresh');
        }

        
        $this->smarty->assign('users_list', $data_list);
        $this->smarty->assign('page', 'admin/membre.tpl');
        $this->smarty->view('admin/dashboard.tpl');

        // Suppression user
        if(!empty($_GET['user_id']) && !empty($_GET['del'])){
            del_data($this->_user_manager, 'deleteUser', $_GET['user_id']);
            redirect(base_url()."users/membres", 'location');
        }
    }

}