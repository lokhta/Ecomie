<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Classe Article Manageur
 * \author Sofiane AL AMRI
 * \version 3.0
 */

class Comment_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * @brief addComment() ajoute un commentaire dans la table comments
     * @param $comment Prend en paramètre une instance de la classe Comment
     */
    public function addComment(Comment $comment){
        return  $this->db->insert('comments', $comment->getData()); 
    }

    /**
     * @brief editComment() modifie un commentaire
     * @param $comment Prend en paramètre une instance de la class Comment 
     */
    public function editComment(Comment $comment){
        return  $this->db->where('commentId', $comment->getId())->update('comments',  $comment->getData());
    }

    /**
     * @brief deleteComment() supprime un commentaire
     * @param $comment_id Prend en paramètre l'identifiant du commentaire à supprimer
     */
    public function deleteComment($comment_id){
        return $this->db->where('commentId', $comment_id)->delete('comments');
    }

    /**
     * @brief getComment() retourne une ligne de la table comments
     * @param $comment_id Prend en paramètre l'identifiant du commentaire à retourner
     * @return Array
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
     * @brief getAllComment() retourne un tableau multidimensionnels contenant des commentaires
     * @param $id Prend en paramètre l'identifiant de l'article ou l'évenement pour lequel on souhaite récupérer les commentaires
     * @return Array
     */
    public function getAllComment($id = null){

        $this->db->select('commentId, commentContent, commentDate, commentReport, commentAuthor, commentArticle, commentEvent, userFirstname, userEmail');
        $this->db->from('comments');
        $this->db->join('users', 'users.userId = comments.commentAuthor');
        if(!empty($_GET['article_id'])){
            $this->db->join('articles', 'articles.articleId = comments.commentArticle');
            $this->db->where('commentArticle', $id);
        }elseif(!empty($_GET['event_id'])){
            $this->db->join('events', 'events.eventId = comments.commentEvent');
            $this->db->where('commentEvent', $id);
        }

        if(current_url() == base_url()."dashboard"){
            $this->db->where("commentReport", 1);
        }

        $this->db->order_by('commentDate', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * @brief count_comment() Retourne le nombre de commentaires qu'un article ou un évenement possède
     * @param $id Prend en paramètre l'identifiant de l'article ou l'évenement avec lequel les commentaires sont liés
     * @return Integer
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