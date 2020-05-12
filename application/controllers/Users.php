<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    /**
    * Contrôleur Users
    * \author Julien MARIUZZA
    * \version 3.0
    */

class Users extends CI_Controller{
        
    private $_user_manager;
    private $_user;
// Fonction du constructeur

    /**
    * @brief __construct() permet de charger les fonctions se trouvant dans les modèles User et User_manager
    * @param _user_manager Devient un nouvel objet user_manager
    * @param _user Devient un nouvel objet user
    */

    public function __construct(){
            parent::__construct();
            $this->load->model('User_manager');
            $this->load->model('User');
            $this->_user_manager = create_object('User_manager');
            $this->_user = create_object('User');
    }

// Fonction pour la vérification de connexion

    /**
    * @brief connexion() permet au utilisateurs ayant déjà un compte créé, de se connecté
    * @param $_POST contient les données du formulaire envoyé par l'utilisateur
    * @param $userManager le nouvel objet user_manager devient une nouvelle variable $user_manager
    * @param $getUser contient une ligne de la table user
    * @param $user le nouvel objet user devient une nouvelle variable $user
    * @param $userTab est un tableau contenant les données de l'objet $user
    * @param $keys variable contenant le nom de la clé dans $userTab en effaçant le caractère "user" pour chaques clés
    */

    public function connexion(){

        if ($_POST)
        {
            $userManager = New User_manager;
            $getUser = $userManager->inBase();
            if (!empty($_POST['userEmail'])){

                if (!empty($_POST['userPwd'])){  

                    if (!empty($getUser)){

                        if (password_verify($_POST['userPwd'], $getUser['userPwd'])){

                            $user = New User;
                            $user->hydrate($getUser);
                            $userTab = $user->getData();
                            
                            foreach($userTab as $key => $value){
                                $keys = lcfirst(str_replace('user','',$key));
                                var_dump($keys);
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

    /**
    * @brief inscription() permet aux visiteurs du site de s'inscrire en tant que membre
    * @param helper permet de charger les helpers de codeigniter form et url
    * @param library permet de charger la librairie codeigniter 'form_validation' pour afficher les messages d'erreurs des champs obligatoires
    * @param set_error_delimiters est un paramètre de form_validation permettant d'ajouter la classe "error" dans la vue inscription
    * @param $config contient un tableau à plusieurs dimension contenant les "rôles" de chaques champs dans le formulaire inscription
    * @param set_rules met les rôles pour form_validation à jour avec le tableau $config
    * @param run retourne faux si il y a une erreur dans form_validation et true si les champs sont bien renseignés
    * @param write_data envoi les données reçus à la BDD pour les insérés dans la table users
    * @param send_mail envoi un mail de confirmation au visiteur venant de s'inscrire
    */

    public function inscription()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        $config = array(
                array(
                    'field' => 'userName',
                    'label' => 'Nom',
                    'rules' => 'required|min_length[3]|max_length[15]'
                ),
                array(
                    'field' => 'userFirstname',
                    'label' => 'Prénom',
                    'rules' => 'required|min_length[3]|max_length[15]'
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
                    'rules' => 'required|max_length[30]'
                ),
                array(
                    'field' => 'userCp',
                    'label' => 'Code postal',
                    'rules' => 'required|numeric|min_length[5]|max_length[5]'
                ),
                array(
                    'field' => 'userCity',
                    'label' => 'Ville',
                    'rules' => 'required|max_length[30]'
                ),
                array(
                    'field' => 'userPwd',
                    'label' => 'Mot de passe',
                    'rules' => 'required|min_length[5]'
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


            $subject= "Confirmation d'inscription";
            $message = "<p>Bonjour ".$_POST["userFirstname"]."</p><p> Vous êtes désormais inscrit sur Ecomie. Nous sommes heureux de vous compter parmis nos membres</p>";
            send_mail("Ecomie", $_POST["userEmail"], $subject, $message, "html");
        }

        echo json_encode($array);
        
    }

// Fonction de déconnexion / Kill la session

    /**
    * @brief logout() permet aux utilisateurs connectés de se déconnecter
    * @param session_destroy permet de "détruire" la session en cours
    * @param redirect_base_url permet de rediriger la page en cours vers la page d'accueil du site
    */

    public function logout()
    {
        session_destroy();
        redirect(base_url(), 'location');
    }

// Fonction de la page modification des données utilisateurs

    /**
    * @brief profil() permet aux membres d'accéder à l'heure profil et de modifier leurs informations
    * @param $_GET récupère la valeur pour ['del'] afin de supprimer la photo de profil ou non
    * @param del_avatar supprime la photo de profil en fonction de l'identifiant de la session
    * @param smarty->assign permet d'assigner une valeur à une variable smarty pour l'utiliser dans la vue
    * @param $_SESSION contient les données de la session de l'utilisateur
    * @param $_POST contient les données renseingés par l'utilisateurs dans le formulaire pour modifier ses informations
    */

    public function profil()
    {   
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
            $_POST['userAvatar'] = upload_image("userAvatar",200, 200);
            write_data($this->_user_manager, $this->_user, "editUser", $_POST, array('userId'=>$_SESSION['id']));
            redirect(base_url()."users/profil", 'refresh');
        }
    }

    /**
    * @brief membres() permet d'afficher la liste des utilisateurs dans la dashboard
    * @param $_GET récupère la valeur pour modifier le rôle de l'utilisateur
    * @param $role contient le role de l'utilisateur
    * @param smarty->assign permet d'assigner une valeur à une variable smarty pour l'utiliser dans la vue
    * @param $data_list contient un tableau de la liste des utilisateurs avec leurs données
    * @param $_POST contient les données renseingés par l'utilisateurs dans le formulaire pour modifier ses informations
    */

    public function membres()
    {

        if(!empty($_GET['userRole'])){

            write_data($this->_user_manager, $this->_user, 'editUser', $_GET, array("userId" => $_GET['userId']));

        }
        
        $role = get_role_user($this->_user_manager);
        $this->smarty->assign('option', $role); 

        $data_list = get_all_data($this->_user_manager, $this->_user,'getAllUser');
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