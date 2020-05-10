<?php
/**
 * Fichier des fonctions utiles
 * @author Sofiane AL AMRI
 * @version 1.0
 */

if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @author Sofiane AL AMRI
 * @brief create_object() permet de créer un objet.
 * @param $class Nom de la class a partir de la quel on instancie l'objet
 * @return Object
 */
function create_object($class){

    $ci = get_instance();
    $ci->load->model($class);

    if(!class_exists($class)){
        echo "Erreur : La class que vous avez renseigné n'existe pas";
        exit;
    }

    return $obj_class = new $class;
}

/**
 * @author Sofiane AL AMRI
 * @brief get_data() retourne un tableau contenant les données concernant l'objet passé en paramètre
 * @param $obj_manager Nom de la class manager
 * @param $obj_class Nom de la class associé au manager $obj_manager
 * @param $method Nom de la methode appartenant au manager que l'on souhaite appeler
 * @param  $param Argument de $method
 * @return Array 
 */
function get_data($obj_manager, $obj_class, $method, $param){
    $get_method = get_class_methods($obj_manager);
    //var_dump($get_method);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }
    
    $get_data_in_base = $obj_manager->$method($param);
    // var_dump($get_data_in_base);;


    if(get_class($obj_manager) == "Galerie_manager"){
        $data = array();
        foreach($get_data_in_base as $key => $value){
            $obj_class->hydrate($value);
            $array_data = $obj_class->getData();

            $array_data["eventName"] = $value["eventName"];
            
            array_push($data, $array_data);
        }
    }else{
        $obj_class->hydrate($get_data_in_base);
        //var_dump($obj_class);
    
        $data = $obj_class->getData();
        // var_dump($data);
    
        if(!empty($get_data_in_base['categoryName'])){
            $data['category'] = $get_data_in_base['categoryName'];
        }
        
        if(!empty($get_data_in_base['userFirstname'])){
            $data['author'] = $get_data_in_base['userFirstname'];
            $data['email'] = $get_data_in_base['userEmail'];
        }
    
        if(!empty($get_data_in_base['roleName'])){
            $data['role'] = $get_data_in_base['roleName'];
        }
        
    
        if(!in_array(get_class($obj_manager), array('User_manager', 'Form_manager', 'Subscription_manager'))){
            $date_time = get_date($get_data_in_base);
            if(!empty($date_time)){
                $data['date'] = $date_time['date'];
                $data['time'] = $date_time['time'];
            }
        }
    }
    // var_dump($data);;
    return $data;
}

/**
 * @author Sofiane AL AMRI
 * @brief get_category_article() retourne la liste des catégories
 * @param $obj_manager Objet Article_manager
 * @return Array
 */
function get_category_article($obj_manager){
    $category = $obj_manager->getCategory();
    $liste = array('-- Catégorie --');

    foreach($category as $value){
        array_push($liste, $value['categoryName']);
    }

    return $liste;
}

function get_role_user($obj_manager){
    $role = $obj_manager->getRole();
    $liste = array('-- Roles --');

    foreach($role as $value){
        array_push($liste, $value['roleName']);
    }

    // var_dump($liste);
    return $liste;
}

function get_option_select_input($obj_manager, $method,$return_id, $return_value,$name_default_option = null){
    $liste = array();

    if($name_default_option){
        $liste = array("-- ".$name_default_option." --");
    }

    foreach($obj_manager->$method() as $value){
        $liste[$value[$return_id]] = $value[$return_value];
    }

    return $liste;

}

/**
 * @author Sofiane AL AMRI
 * @brief write_data() permet d'écrire des données dans la base de donnée. (Insérer ou mettre à jour)
 * @param $obj_manager Nom de la class manager
 * @param $obj_class Nom de la class associé au manager $obj_manager
 * @param $method Nom de la methode appartenant au manager que l'on souhaite appeler
 * @param $data Tableau contenant les informations permetant d'inserer ou mettre à jour la base de données.
 * @param $data Tableau associatif qui a pour clé le nom d'un champ de table et pour valeur la donnée à insérer ou l'id qui sera utilisé dans un WHERE pour modification
 */
function write_data($obj_manager, $obj_class, $method, array $post, array $data = null){
    $get_method = get_class_methods($obj_manager);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }

    if($data){
        foreach($data as $key => $value){
            $post[$key] = $value;
        }
    }


    if(!empty($_SESSION['id']) && $method == 'editUser'){
        foreach($post as $key=>$value){
            if($post[$key] == ""){
                unset($post[$key]);
            }
        }
        $post['userRole'] = $_SESSION['role'];
        // var_dump($post);exit;
    }
    //  var_dump($post);;

    $obj_class->hydrate($post);

    // var_dump($obj_class);exit;;

    //Actualisation de la session après la modificationd du profil
    if($method == 'editUser'){
        $userTab = $obj_class->getData();
        // var_dump($userTab);;
        foreach($userTab as $key => $value){
            $key_session = lcfirst(str_replace('user', '', $key));
            $_SESSION[$key_session] = $value;
        }
    }

    $obj_manager->$method($obj_class);
    // var_dump($obj_manager);;;
}

/**
 * @author Sofiane AL AMRI
 * @brief del_data() permet d'effectuer une suppression dans la base de données
 * @param $obj_manager Nom de la class manager
 * @param $method Nom de la methode appartenant au manager que l'on souhaite appeler
 * @param $id Identifiant de la ligne à supprimer
 */
function del_data($obj_manager, $method, $id){
    $get_method = get_class_methods($obj_manager);

    if(!in_array($method, $get_method)){
        echo "la methode que vous avez renseigné n'existe pas";
        exit;
    }

    $obj_manager->$method($id);
    //var_dump($obj_manager->$method($id));
}

/**
 * @author Sofiane AL AMRI
 * @brief get_all_data permet de récupérer toutes les données d'une table
 * @param $obj_manager Nom de la class manager
 * @param $obj_class Nom de la class associé au manager $obj_manager
 * @param $method Nom de la methode appartenant au manager que l'on souhaite appeler
 * @param  $param Argument de $method. Initalisé a null si $method n'a pas d'argument
 * @return Array
 */
function get_all_data($obj_manager, $obj_class, $method,$param=null){
    $get_method = get_class_methods($obj_manager);
    //var_dump($get_method);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }

    if($param){
        $get_data_in_base = $obj_manager->$method($param);
        //var_dump($get_data_in_base);
    }else{
        $get_data_in_base = $obj_manager->$method();
    }

    

    $liste = array();

    foreach($get_data_in_base as $key => $value){
        $obj_class->hydrate($value);
        //var_dump($obj_class);
        $data = $obj_class->getData();
        //var_dump($data);

        if(!empty($value['roleName'])){
            $data['roleName'] = $value['roleName'];
        }else{

            if(!empty($value['categoryName'])){
                $data['category'] = $value['categoryName'];
            }
                
            if(!empty($value['userFirstname'])){
                $data['author'] = $value['userFirstname'];
            }

            if(!empty($value['eventName']) && get_class($obj_manager) == "Galerie_manager"){
                $data['eventName'] = $value['eventName'];
            }
        }
        
        //var_dump($data);

        if(!in_array(get_class($obj_manager), array('User_manager', 'Form_manager'))){
            $date_time = get_date($value);
            if(!empty($date_time)){
                $data['date'] = $date_time['date'];
                $data['time'] = $date_time['time'];
                // var_dump($data);
            }
        }


        
        array_push($liste, $data);
    }
    //var_dump($liste);
    return $liste;
}

/**
 * @author Sofiane AL AMRI
 * @brief get_date() recherche dans un tableau si une date est présente dans un tableau et l'a formate
 * @param $data Tableau associatif dont une dès clé contient le mot Date
 */
function get_date($data){
    foreach($data as $k => $v){
        if(strpos($k, 'Date') != false){
            $convertDate = strtotime($v);
        }
    }
    
    if(isset($convertDate)){
        $date = date('d/m/Y', $convertDate);
        $time = date('H:i:s', $convertDate);
    }else{
        $date = '0';
        $time = '0';
    }

    return array('date' => $date, 'time' => $time);
}

/**
 * @author Sofiane AL AMRI
 * @brief timestamp_to_date() retourne la date courante au format timestamp
 */
function timestamp_to_date(){
    $date_to_day = date_create();
    return  date_timestamp_get($date_to_day);
}

/**
 * @author Sofiane AL AMRI
 * @brief upload_image_ckeditor() permet d'enregistrer une image sur le serveur depuis l'editeur de texte ckEditor.
 * @param $type_text permet de construire le nom de l'image, ex: $type_texte = articles si l'image cocnerne un article.
 */
function upload_image_ckeditor($type_text){
    $config['upload_path'] = "assets/img/upload";
    $config['allowed_types'] = "gif|jpg|png";
    $config['max_size'] = 70;
    $dat = date_create();
    $dat = date_timestamp_get($dat);
    $config['file_name'] = $type_text.'_'.$dat;

    $ci = get_instance();
    $ci->load->library('upload', $config);

    if(!$ci->upload->do_upload('upload')){
        echo json_encode(array('error' => $ci->upload->display_errors()));
    }else{
        $upload_data = $ci->upload->data();
        echo json_encode(array('file_name' => $upload_data['file_name']));

        // Required: anonymous function reference number as explained above.
        $funcNum = $_GET['CKEditorFuncNum'] ;
        // Optional: instance name (might be used to load a specific configuration file or anything else).
        $CKEditor = $_GET['CKEditor'] ;
        // Optional: might be used to provide localized messages.
        $langCode = $_GET['langCode'] ;

        // Check the $_FILES array and save the file. Assign the correct path to a variable ($url).
        $url = base_url().'assets/img/upload/'.$upload_data['file_name'];
        // Usually you will only assign something here if the file could not be uploaded.
        $message = '';

        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
}

/**
 * @author Sofiane AL AMRI
 * @brief get_comment() Renvoi la liste des commentaires  au format Json pour être traité en ajax
 * @param $id Identifiant de l'article ou l'evenement 
 */
function get_comment($id){
    $manager = create_object("Comment_manager");
    $class = create_object("Comment");

    $comment = get_all_data($manager, $class, "getAllComment", $id);

    return json_encode($comment);
}


/**
 * @author Sofiane AL AMRI
 * @brief upload_image() permet d'uploader des images
 * @param $input_name Nom du champs input de type upload; Le nom doit être identique au champ de la base de donnée
 * @param $imageW Largeur de l'image souhaite lors de la redimenssion
 * @param $imageH Hauteur de l'image souhaité lors de la redimenssion
 */
function upload_image($input_name,int $imageW, int $imageH){
    $ci = get_instance();
        $timestamp_to_date = timestamp_to_date();
        
        $config['upload_path'] = "assets/img/upload";
        $config['allowed_types'] = "gif|jpg|png";
        $config['max_size'] = 2000;
        $config['file_name'] = $timestamp_to_date;
        $ci->load->library('upload', $config);


        if(!$ci->upload->do_upload($input_name)){
            $message = '<div class="alert-error">'.$ci->upload->display_errors().'</div>';
            $reponse = $message;
            $ci->smarty->assign("reponse", $reponse);
            
        }else{
            $upload_data = $ci->upload->data();

            $ci->load->library("image_lib");

            /*Resize image uploader */
            $resize_image["image_library"] = "gd2";
            $resize_image["source_image"] = $upload_data['full_path'];
            $config['create_thumb'] = FALSE;
            $resize_image["maintient_ratio"] = FALSE;
            $resize_image["width"] = $imageW;
            $resize_image["height"] = $imageH;

            $ci->image_lib->initialize($resize_image);
            $ci->image_lib->resize();

            if($input_name == 'userAvatar'){
                $message = "<div class='alert alert-success'>L'image de profil a été correctement modifié</div>";
            }elseif($input_name == "imgName"){
                $message = "<div class='alert alert-success'>L'image a bien été uploader</div>";
            }
            $reponse = $message;
            $ci->smarty->assign("reponse", $reponse);
            return  $upload_data['file_name'];
            // var_dump($_POST);
        }
    
}

/**
 * @author Sofiane AL AMRI
 * @brief send_mail() permet d'envoyer un email
 * @param $from Nom de l'experiteur
 * @param $to Email du déstinataire
 * @param $subject Objet du mail
 * @param $message a  envoyer
 * @param $format Format du message (text ou html)
 */
function send_mail($from, $to, $subject, $message, $format){
        $ci = get_instance();
            $config = Array(
            "protocol" => "smtp",
            "smtp_host" => "ssl://smtp.gmail.com",
            "smtp_port" => "465",
            "smpt_timeout" => "7",
            "smtp_crypto" => "SSL",
            "smtp_user" => "ecomie67@gmail.com",
            "smtp_pass" => "ecomie-disii",
            "mailtype" => $format,
            "charset" => "utf-8",
            "wordwrap" => TRUE,
            "validation" => TRUE
        );

        $ci->load->library('email', $config);
        
        $ci->email->set_newline("\r\n");
        $ci->email->from("ecomie67@gmail.com", $from);
        $ci->email->to($to);
        $ci->email->subject($subject);
        $ci->email->message($message);
    // $this->email->send();

    if($ci->email->send()){
        if(!empty($_GET["sender"])){
            echo json_encode(array("success" => "<div class='alert alert-success'>L'email a bien été envoyé</div>"));
        }
    }else{
        echo json_encode(array("error" => "<div class='red_error'>Une erreur s'est produite</div>"));
        // echo $this->email->print_debugger();
    }    

}