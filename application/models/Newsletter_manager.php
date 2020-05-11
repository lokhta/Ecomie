<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Newsletter Manager
 * \author Sofiane AL AMRI
 * \version 3.0
 * \brief Modèle pour créer une newsletter. (Partie Admin)
 */

class Newsletter_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
	* Fonction permettant de récupérer une newsletter
	* @param id identifiant de la newsletter
	* @return array les données d'une newsletter
    */
    public function getNews($id){
        $query = $this->db
        ->select('*')
        ->from('newsletters')
        ->where('newsId', $id)
        ->get();
        return $query->row_array();
    }

    /**
	* Fonction permettant de récupérer toutes les newsletters
	* @return array le tableau de données de toutes les newsletters
    */
    public function getAllNews(){
        $this->db->select('*');
        $this->db->from('newsletters');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
	* Fonction permettant d'ajouter une newsletter
	* @param news le contenu de la newsletter
	* @return array les données d'une newsletter
    */
    public function addNews(Newsletter $news){
        return  $this->db->insert('newsletters', $news->getData()); 
    }

    /**
	* Fonction permettant de modifier une newsletter
	* @param news le contenu de la newsletter
	* @return array met à jour les données dans la BDD avec les valeurs du tableau retourné
    */
    public function editNews(Newsletter $news){
        return  $this->db->where('newsId', $news->getId())->update('newsletters',  $news->getData());
    }

    /**
	* Fonction permettant de supprimer une newsletter
	* @param id l'identifiant d'une newsletter
	* @return array supprime la newsletter en fonction de l'id
    */
    public function deleteNews($id){
        return $this->db->where('newsId', $id)->delete('newsletters');
    }

    /**
	* Fonction permettant de compter le nombres de newsletters
	* @return array le nombres de newsletters
    */
    public function count_news(){
        return $this->db->get("newsletters")->num_rows();
    }
}