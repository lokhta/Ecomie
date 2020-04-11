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
    // var_dump($get_method);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }
    
    $get_data_in_base = $obj_manager->$method($param);
    // var_dump($get_data_in_base);

    $obj_class->hydrate($get_data_in_base);
    // var_dump($obj_class);

    $data = $obj_class->getData();
    // var_dump($data);

    if($obj_manager == 'Article_manager' || $obj_class == 'Article'){
        $data['author'] = $get_data_in_base['userFirstname'];
        $data['category'] = $get_data_in_base['categoryName'];
    }

    // var_dump($data);
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

    // vat_dump($liste);
    return $liste;
}

/**
 * @author Sofiane AL AMRI
 * @brief write_data() permet d'écrire des données dans la base de donnée. (Insérer ou mettre à jour)
 * @param $obj_manager Nom de la class manager
 * @param $obj_class Nom de la class associé au manager $obj_manager
 * @param $method Nom de la methode appartenant au manager que l'on souhaite appeler
 * @param $data Tableau contenant les informations permetant d'inserer ou mettre à jour la base de données.
 * @param $key Nom du champ qui est utilisé pour le WHERE de la réquete sql. Inialiser à null si la requête n'utilise pas de WHERE. Si $key n'est pas null, $value ne peut pas être null.
 * @param $value Valeur qui permet de filtrer la requete sql avec WHERE. Initialiser a null. 
 */
function write_data($obj_manager, $obj_class, $method, array $data, $key = null, $value = null){
    $get_method = get_class_methods($obj_manager);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }

    if($key && $value){
        $data[$key] = $value;
    }
    // var_dump($data);

    $obj_class->hydrate($data);
    // var_dump($obj_class);

    if($method == 'editUser'){
        $userTab = $obj_class->getData();

        foreach($userTab as $key => $value){
            $key_session = lcfirst(str_replace('user', '', $key));
            $_SESSION[$key_session] = $value;
        }
    }

    $obj_manager->$method($obj_class);
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
function get_all_data($obj_manager, $obj_class, $method, $param=null){
    $get_method = get_class_methods($obj_manager);
    //var_dump($get_method);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }

    if($param){
        $get_data_in_base = $obj_manager->$method($param);
    }else{
        $get_data_in_base = $obj_manager->$method();
    }

    //var_dump($get_data_in_base);

    $liste = array();

    foreach($get_data_in_base as $key => $value){
        $obj_class->hydrate($value);
        //var_dump($obj_class);
        $data = $obj_class->getData();
        //var_dump($data);
        //var_dump($obj_manager);
        //var_dump($obj_class);

        if(!empty($value['roleName'])){
            $data['roleName'] = $value['roleName'];
        }else{

            if(!empty($value['categoryName'])){
                $data['category'] = $value['categoryName'];
            }
                
            if(!empty($value['userFirstname'])){
                $data['author'] = $value['userFirstname'];
            }
    }
        

        // if($key == 'commentDate'){
        //     var_dump($value['commentDate']);exit;
        // }

        
        if(!empty($value['articleDate'])){
            foreach($value as $k => $v){
                if(strpos($k, 'Date') !== false){
                    $convertDate = strtotime($v);
                }
            }
            $date = date('d/m/Y', $convertDate);
            $time = date('H:i:s', $convertDate);

            $data['date'] = $date;
            $data['time'] = $time;
        }

        // var_dump($data);
        array_push($liste, $data);
    }
    // var_dump($liste);
    return $liste;
}
