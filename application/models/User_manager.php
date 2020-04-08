<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    /** UserManager
     *  /author Julien MARIUZZA
     */
      
    class User_manager extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        
        public function addUser(User $user){
            return  $this->db->insert('users', $user->getData());
        }
    
    
        public function editUser(User $user){
            return  $this->db->where('userId', $user->getId())->update('users',  $user->getData());
        }
    
        public function deleteUser($user_id){
            return $this->db->where('userId', $user_id)->delete('users');
        }
    
        public function getUser(){
            $query = $this->db
            ->select('*')
            ->from('users')
            ->where('userEmail',$_POST['userEmail'])
            ->get();
            return $query->row_array();
        }
    
        public function getAllUser(){
            $query = $this->db
            ->select('userId, userName, userFirstname, userEmail, userPhone, userAddress, userCp, userCity, userPwd, userAvatar, roleName')
            ->from('users')
            ->join('roles', 'roles.roleId = users.userRole')
            ->get();
            return $query->result_array();
        }
}

