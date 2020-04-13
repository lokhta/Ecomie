<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_manager extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function addComment(Comment $comment){
        return  $this->db->insert('comments', $comment->getData()); 
    }


    public function editComment(Comment $comment){
        return  $this->db->where('commentId', $comment->getId())->update('comments',  $comment->getData());
    }

    public function deleteComment($comment_id){
        return $this->db->where('commentId', $comment_id)->delete('comments');
    }

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
    
    public function getAllComment($id){

        $this->db->select('commentId, commentContent, commentDate, commentReport, commentAuthor, commentArticle, commentEvent, userFirstname');
        $this->db->from('comments');
        $this->db->join('users', 'users.userId = comments.commentAuthor');
        if(current_url() == base_url()."Articles/articles"){
            $this->db->join('articles', 'articles.articleId = comments.commentArticle');
            $this->db->where('commentArticle', $id);
        }elseif(current_url() == base_url()."Events/events"){
            $this->db->join('events', 'events.eventId = comments.commentEvent');
        }
        $this->db->order_by('commentDate', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}