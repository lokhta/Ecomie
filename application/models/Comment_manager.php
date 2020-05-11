<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Article Manageur
 * \author Jean-Baptiste Abeilhe
 * \version 3.0
 */

class Comment_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
	* Fonction permettant d'ajouter un commentaire
	* @param comment tableau des données du commentaire
	* @return array ajoute les données du tableau dans la BDD
    */
    public function addComment(Comment $comment){
        return  $this->db->insert('comments', $comment->getData()); 
    }

    /**
	* Fonction permettant de modifier les informations d'un commentaire
	* @param comment tableau des données à modifier
	* @return array remplace les données de la BDD avec celles du tableau
    */
    public function editComment(Comment $comment){
        return  $this->db->where('commentId', $comment->getId())->update('comments',  $comment->getData());
    }

    /**
	* Fonction permettant de supprimer un commentaire
	* @param comment_id identifiant du commentaire demandé
	* @return array supprime le contenu du commentaire dans la bdd en fonction de l'id
    */
    public function deleteComment($comment_id){
        return $this->db->where('commentId', $comment_id)->delete('comments');
    }

    /**
	* Fonction permettant de récupérer le contenu d'un commentaire
	* @param comment_id identifiant du commentaire demandé
	* @return array Tableau d'un commentaire
    */
    public function getComment($comment_id){
        $this->db->select('commentId, commentContent, commentDate, commentReport, commentAuthor, commentArticle, commentEvent, userFirstname');
        $this->db->from('comments');
        $this->db->join('users', 'users.userId = comments.commentAuthor');
        if(current_url() == base_url()."Articles/articles"){
            $this->db->join('articles', 'articles.articleId = comments.commentArticle');
        }elseif(current_url() == base_url()."Events/events"){
            $this->db->join('events', 'events.eventId = comments.commentEvent');
        }
        $this->db->where('commentId', $comment_id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    /**
	* Fonction permettant de récupéré la liste des commentaires
	* @param id contient l'id de l'article concerné
	* @return array liste tout les commentaires dans un tableau
    */
    public function getAllComment($id){

        $this->db->select('commentId, commentContent, commentDate, commentReport, commentAuthor, commentArticle, commentEvent, userFirstname');
        $this->db->from('comments');
        $this->db->join('users', 'users.userId = comments.commentAuthor');
        if(!empty($_GET['article_id'])){
            $this->db->join('articles', 'articles.articleId = comments.commentArticle');
            $this->db->where('commentArticle', $id);
        }elseif(!empty($_GET['event_id'])){
            $this->db->join('events', 'events.eventId = comments.commentEvent');
        }
        $this->db->order_by('commentDate', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
    * Fonction permettant de compter les commentaires
    * @param id contient l'id de l'article concerné
	* @return array le nombre de commentaires
    */

    public function count_comment($id){
        $this->db->select('commentId, commentContent, commentDate, commentReport, commentAuthor, commentArticle, commentEvent, userFirstname');
        $this->db->from('comments');
        $this->db->join('users', 'users.userId = comments.commentAuthor');

        if(!empty($_GET['article_id'])){
            $this->db->join('articles', 'articles.articleId = comments.commentArticle');
            $this->db->where('commentArticle', $id);
        }elseif(!empty($_GET['event_id'])){
            $this->db->join('events', 'events.eventId = comments.commentEvent');
        }
        return $this->db->get("newsletters")->num_rows();
    }
}