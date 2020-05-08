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

    public function connexion(){
        //$this->smarty->view('pages/connection.tpl');

        if ($_POST)
        {
            $userManager = New User_manager;
            $getUser = $userManager->inBase();
            //var_dump($_POST);
            // var_dump($getUser);
            if (!empty($_POST['userEmail'])){
                if (!empty($_POST['userPwd'])){  
                    if (!empty($getUser)){
                        //var_dump($getUser);
                        if (password_verify($_POST['userPwd'], $getUser['userPwd'])){
                            $user = New User;
                            $user->hydrate($getUser);
                            // var_dump($user);exit;

                            $userTab = $user->getData();

                            //Création de la session 
                            foreach($userTab as $key => $value){
                                $keys = lcfirst(str_replace('user','',$key));
                                $_SESSION[$keys] = $value;
                            }
                            echo json_encode(array("success"=> true, "redirect" => base_url()."users/profil"));
                        }else{
                                echo json_encode(array("error"=> true, "error_pwd"=>"Mot de passe incorrect"));
                        }
                    }else{
                        echo json_encode(array("error"=> true, "error_email"=>"Adresse e-mail incorrect"));
                    }
                }else{
                    echo json_encode(array("error"=> true, "error_pwd"=>"Veuillez renseigner un mot de passe"));
                }
            }else{
                echo json_encode(array("error"=> true, "error_email"=>"Veuillez renseigner une adresse mail"));
            }
        }
    }
    

// Fonction de création de compte

    public function inscription()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $config = array(
                array(
                    'field' => 'userName',
                    'label' => 'Nom',
                    'rules' => 'required|alpha|min_length[3]|max_length[12]'
                ),
                array(
                    'field' => 'userFirstname',
                    'label' => 'Prénom',
                    'rules' => 'required|alpha|min_length[3]|max_length[12]'
                ),
                array(
                    'field' => 'userEmail',
                    'label' => 'Addresse mail',
                    'rules' => 'required|valid_email|is_unique[users.userEmail]'
                ),
                array(
                    'field' => 'userPhone',
                    'label' => 'N° de Téléphone',
                    'rules' => 'numeric|min_length[10]|max_length[10]'
                ),
                array(
                    'field' => 'userAddress',
                    'label' => 'Adddresse postale',
                    'rules' => 'required|alpha_numeric_spaces|max_length[30]'
                ),
                array(
                    'field' => 'userCp',
                    'label' => 'Code postal',
                    'rules' => 'required|numeric|min_length[5]|max_length[5]'
                ),
                array(
                    'field' => 'userCity',
                    'label' => 'Ville',
                    'rules' => 'required|alpha|max_length[30]'
                ),
                array(
                    'field' => 'userPwd',
                    'label' => 'Mot de passe',
                    'rules' => 'required|min_length[5]|alpha_numeric'
                ),
                array(
                    'field' => 'confirmPwd',
                    'label' => 'Confirmez le mot de passe',
                    'rules' => 'required|matches[userPwd]'
                )
            );
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE)
        {
            $array = array(
                'error'   => true,
                'name_error' => form_error('userName'),
                'firstname_error' => form_error('userFirstname'),
                'email_error' => form_error('userEmail'),
                'address_error' => form_error('userAddress'),
                'cp_error' => form_error('userCp'),
                'city_error' => form_error('userCity'),
                'pwd_error' => form_error('userPwd'),
                'confirmPwd_error' => form_error('confirmPwd')
            );
        }
        else
        {
            $array = array(
                'success' => '<div class="alert alert-success">Votre inscription a bien été enregistrée</div>'
            );

            $_POST['userAvatar'] = "user-solid.svg";
            $_POST['userRole'] = 3;
            write_data($this->_user_manager, $this->_user, 'addUser', $_POST);
        }

        echo json_encode($array);
        
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
            //redirect(base_url()."users/profil", 'refresh');
        }

        $avatarIcon =  $_SESSION['avatar'];
        //var_dump($avatarIcon);
        $this->smarty->assign('avatar', $avatarIcon);
        $this->smarty->assign('page', 'admin/profil.tpl');
        $this->smarty->view('admin/dashboard.tpl');
        

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
            
            //var_dump($_POST);
            write_data($this->_user_manager, $this->_user, 'editUser', $_POST, array('userId'=>$_SESSION['id']));
            redirect(base_url()."users/profil", 'refresh');
        }
    }

    public function membres()
    {

        if((empty($_SESSION['id']))||(($_SESSION['role'])!=='1')){
            redirect('pages/access_denied', 'location');
        }

        /* pagination start */
        $page_url= base_url()."users/membres";
        $total_rows = $this->_user_manager->count_user();

        $data_pagination = pagination($page_url, $total_rows, 20);
        $pagination_link = $data_pagination['pagination_link'];

        $this->smarty->assign('pagination', $pagination_link);
        /*pagination end*/
        
        //$this->load->library('javascript/jquery');
        // var_dump($_SESSION);
        $data_list = get_all_data($this->_user_manager, $this->_user,'getAllUser',$data_pagination['limit'], $data_pagination['offset']);
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