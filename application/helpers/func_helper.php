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
 * @param $obj_manager Nom de la class associé au manager $obj_manager
 * @param $method Nom de la method appartenant au manager que l'on souhaite appeler
 * @param  $param Permet d'ajouter un paramètre à $method. $param est initialisé à null par defaut si $method n'utilise pas de paramètre
 * @return Array 
 */
function get_data($obj_manager, $obj_class, $method, $param=null){
    $get_method = get_class_methods($obj_manager);
    // var_dump($get_method);

    if(!in_array($method, $get_method)){
        echo "La methode que vous souhaitez utiliser n'existe pas";
        exit;
    }

    if($param){
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
    }else{
        $get_data_in_base = $obj_manager->$method();
        // var_dump($get_data_in_base);

        $liste = array();

        foreach($get_data_in_base as $value){
            $obj_class->hydrate($value);

            $data = $obj_class->getData();

            if(get_class($obj_manager) == 'Article_manager' || get_class($obj_class) == 'Article'){
                $data['author'] = $value['userFirstname'];
                $data['category'] = $value['categoryName'];
                // var_dump($data);
            }

            array_push($liste, $data);
        }
        // var_dump($liste);
        return $liste;
    }
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