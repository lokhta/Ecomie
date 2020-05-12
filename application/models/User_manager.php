<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    /**
    * Classe User Manageur
    * \author Julien MARIUZZA
    * \version 3.0
    */
      
    class User_manager extends CI_Model{
        public function __construct(){
            parent::__construct();
        }
        
    /**
     * @brief addUser() ajoute un membre dans la tables users
     * @param $user Prend en paramètre une instance de la classe User
     */
        public function addUser(User $user){
            return  $this->db->insert('users', $user->getData());
        }
    
        /**
         * @brief editUser() modifie un user
         * @param $user Prend en paramètre une instance de la class User 
         */
        public function editUser(User $user){
            return  $this->db->where('userId', $user->getId())->update('users',  $user->getData());
        }
        
        /**
         * @brief deleteUser() supprime un user
         * @param $user_id Prend en paramètre l'identifiant de l'user à supprimer
         */
        public function deleteUser($user_id){
            return $this->db->where('userId', $user_id)->delete('users');
        }
        
        /**
         * @brief inBase() permet de vérifier si un User existe deja dans la table users
         * @return Array
         */
        public function inBase(){
            $query = $this->db
            ->select('*')
            ->from('users')
            ->where('userEmail',$_POST['userEmail'])
            ->get();
            return $query->row_array();
        }

        /**
         * @brief getUser() retourne une ligne de la table user
         * @param $user_id Prend en paramètre l'identifiant de l'user à retourner
         * @return Array
         */
        public function getUser($user_id){
            $query = $this->db
            ->select('*')
            ->from('users')
            ->join('roles', 'roles.roleId = users.userRole')
            ->where('userId',$user_id)
            ->get();
            return $query->row_array();
        }
        
        /**
         * @brief getAllUser() retourne un tableau multidimensionnels contenant des users
         * @return Array
         */
        public function getAllUser(){
        
            $this->db->select('userId, userName, userFirstname, userEmail, userPhone, userAddress, userCp, userCity, userPwd, userAvatar, userRole, roleName');
            $this->db->from('users');
            $this->db->join('roles', 'roles.roleId = users.userRole');

            if($_SESSION['role'] == '3'){
                $this->db->where("userRole" , 3);
            }

            $query = $this->db->get();
            return $query->result_array();

        }

        /**
         * @brief getRole() Retourne un tableau multidimensionnels contenant les roles
         * @return Array
         */
        public function getRole(){
            $query = $this->db
            ->select('*')
            ->from('roles')
            ->order_by('roleId','ASC')
            ->get();
            return $query->result_array();
        }

        /**
         * @brief del_avatar() permet de supprimer l'image de profil
         * @param $user_id Prend en paramètre l'identifiant de l'utilisateur
         * @return Array
         */
        public function del_avatar($user_id){
            $data = array('userAvatar'=>'user-solid.svg');
            $id = (int)$user_id;
            return  $this->db->where('userId', $id)->update('users', $data);
        }

        /**
         * @brief count_user() Retourne le nombre d'user présent dans la table users
         * @return Integer
         */
        public function count_user(){
            return $this->db->get("users")->num_rows();
        }
}

