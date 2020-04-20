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
            $getUser = $userManager->getUser();
            //var_dump($_POST);
            //var_dump($getUser);
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
        $avatarIcon =  $_SESSION['avatar'];
        $this->smarty->assign('avatar', $avatarIcon);
        $this->smarty->view('pages/profil.tpl');
        
        //Condition pour la suppression de l'image de profil
        if ($_GET){
            $_SESSION['avatar'] = 'user_solid.svg';
            foreach($_SESSION as $key => $value){
                $key= ucfirst($key);
                $key_session = "user".$key;
                $_GET[$key_session] = $value;
            }
            //$imagePath = 'C:\wamp64\www\Ecomie\assets\img\'.$_GET;
            unlink($imagePath);
            write_data($this->_user_manager, $this->_user, 'editUser', $_GET, array('userId'=>$_SESSION['id']));
            redirect(base_url()."users/profil");
        }
        

        if(!empty($_POST)){

            // Condition pour l'ajout de la photo de profil
            if(!empty($_FILES['userAvatar']['tmp_name'])){
                $imgName = $_FILES['userAvatar']['tmp_name'];

                if(($_FILES['userAvatar']['type'])=='image/jpeg'){
                    $imgDest = 'C:\wamp64\www\Ecomie\assets\img\profile_'.$_SESSION['id'].'.jpg';
                    move_uploaded_file($imgName, $imgDest);
                    $_POST['userAvatar'] = 'profile_'.$_SESSION['id'].'.jpg';
                }else{

                    if(($_FILES['userAvatar']['type'])=='image/png'){
                        $imgDest = 'C:\wamp64\www\Ecomie\assets\img\profile_'.$_SESSION['id'].'.png';
                        move_uploaded_file($imgName, $imgDest);
                        $_POST['userAvatar'] = 'profile_'.$_SESSION['id'].'.png';
                    }else{

                        if(($_FILES['userAvatar']['type'])=='image/svg+xml'){
                            $imgDest = 'C:\wamp64\www\Ecomie\assets\img\profile_'.$_SESSION['id'].'.svg';
                            move_uploaded_file($imgName, $imgDest);
                            $_POST['userAvatar'] = 'profile_'.$_SESSION['id'].'.svg';
                        }else{
                            echo "Ce type de fichier n'est pas pris en charge !!!";
                            $_POST['userAvatar']=$_SESSION['avatar'];
                            }
                        }
                }
            }else{
                $_POST['userAvatar']=$_SESSION['avatar'];
            }
            write_data($this->_user_manager, $this->_user, 'editUser', $_POST, array('userId'=>$_SESSION['id']));
            //Rafraichissement de la page
            header('refresh:0');
        }
    }

    public function membres()
    {
        $userManager = new User_manager;
        $user = new User;
        $data = get_all_data($this->_user_manager, $this->_user,'getAllUser');
        //var_dump($data);
        $this->smarty->assign('users', $data);
        $this->smarty->view('admin/membre.tpl');

        // Suppression user
        if(!empty($_GET['user_id']) && !empty($_GET['del'])){
            del_data($this->_user_manager, 'deleteUser', $_GET['user_id']);
            redirect(base_url()."users/membres", 'location');
        }
    }

}