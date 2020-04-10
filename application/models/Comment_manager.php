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
        $query = $this->db
        ->select('*')
        ->from('comment')
        ->join('users', 'users.userId = comments.commentAuthor')
        ->join('events', 'events.eventId = comments.commentEvent')
        ->join('articles', 'articles.articleId = comments.commentArticle')
        ->where('commentId', $comment_id)
        ->get();
        return $query->row_array();
    }

    public function getAllComment($field, $id){

        $this->db->select('*');
        $this->db->from('comment');
        $this->db->join('users', 'users.userId = comments.commentAuthor');
        $this->db->join('events', 'events.eventId = comments.commentEvent');
        $this->db->join('articles', 'articles.articleId = comments.commentArticle');
        $this->db->where($field, $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}