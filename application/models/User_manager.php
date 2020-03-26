<?php

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
    
    
        public function editUser(){
    
        }
    
        public function deleteUser(){
    
        }
    
        public function getUser(){
    
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
