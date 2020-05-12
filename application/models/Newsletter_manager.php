<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Newsletter_manager
 * \author Sofiane AL AMRI
 * \version 3.0

 */

class Newsletter_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief getNews() retourne une ligne de la table Newsletters
     * @param $id Prend en paramètre l'identifiant de la newsletter à retourner
     * @return Array
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
     * @brief getAllNews() retourne un tableau multidimensionnels contenant toutes les newsletters
     * @return Array
     */
    public function getAllNews(){
        $this->db->select('*');
        $this->db->from('newsletters');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @brief addNews() ajoute une newsletter dans la tables newsletters
     * @param $news Prend en paramètre une instance de la classe Newsletter
     */
    public function addNews(Newsletter $news){
        return  $this->db->insert('newsletters', $news->getData()); 
    }

    /**
     * @brief editNews() modifie une newsletter
     * @param $news Prend en paramètre une instance de la class Newsletter 
     */
    public function editNews(Newsletter $news){
        return  $this->db->where('newsId', $news->getId())->update('newsletters',  $news->getData());
    }

    /**
     * @brief deleteNews() supprime une newsletter
     * @param $id Prend en paramètre l'identifiant de le newsletter à supprimer à supprimer
     */
    public function deleteNews($id){
        return $this->db->where('newsId', $id)->delete('newsletters');
    }

    /**
     * @brief count_news() Retourne le nombre de newsletter présent dans la table newsletters
     * @return Integer
     */
    public function count_news(){
        return $this->db->get("newsletters")->num_rows();
    }
}