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
	    * Fonction permettant d'ajouter un utilisateur
	    * @param user tableau des données de l'utilisateur
	    * @return array ajoute les données du tableau dans la BDD
        */
        public function addUser(User $user){
            return  $this->db->insert('users', $user->getData());
        }
    
        /**
	    * Fonction permettant de modifier les informations de l'utilisateur
	    * @param user tableau des données de l'utilisateur
	    * @return array remplace les données de la BDD avec celles du tableau 
        */
        public function editUser(User $user){
            return  $this->db->where('userId', $user->getId())->update('users',  $user->getData());
        }
        
        /**
	    * Fonction permettant de supprimer un utilisateur
	    * @param user_id identifiant de l'utilisateur demandé
	    * @return array supprime le contenu de l'utilisateur dans la bdd en fonction de l'id
        */

        public function deleteUser($user_id){
            return $this->db->where('userId', $user_id)->delete('users');
        }
        
        /**
	    * Fonction permettant de vérifier si un utilisateur existe déjà dans la BDD
	    * @return array les informations de l'utilisateur si trouvé
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
        * Fonction permettant de récupérer les informations d'un utilisateur
        * @param user_id identifiant de l'utilisateur demandé
	    * @return array Toutes les données d'un utilisateur en fonction de son identifiant
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
        * Fonction permettant de récupérer les informations de tout les utilisateurs
	    * @return array Toutes les données des utilisateurs
        */
        public function getAllUser(){
            $query = $this->db
            ->select('userId, userName, userFirstname, userEmail, userPhone, userAddress, userCp, userCity, userPwd, userAvatar, userRole, roleName')
            ->from('users')
            ->join('roles', 'roles.roleId = users.userRole')
            ->get();
            return $query->result_array();
        }

        /**
        * Fonction permettant de récupérer le role d'un utilisateur
	    * @return array le role de l'utilisateur
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
	    * Fonction permettant de supprimer la photo de profil d'un utilisateur
	    * @param user_id identifiant de l'utilisateur demandé
	    * @return array supprime la photo de profil d'un utilisateur
        */
        public function del_avatar($user_id){
            $data = array('userAvatar'=>'user-solid.svg');
            $id = (int)$user_id;
            return  $this->db->where('userId', $id)->update('users', $data);
        }

        /**
	    * Fonction permettant de compter les utilisateurs
	    * @return array le nombre d'utilisateurs
        */
        public function count_user(){
            return $this->db->get("users")->num_rows();
        }
}

