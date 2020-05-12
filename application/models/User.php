<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	/**
 	* Classe User (model)
 	* \author Julien MARIUZZA
 	* \version 3.0
	* 
	*/

	class User extends CI_Model{

		/* ATTRIBUTS */
		private $_userId;
		private $_userName;
		private $_userFirstname;
        private $_userEmail;
        private $_userPhone;
        private $_userAddress;
        private $_userCp;
        private $_userCity;
        private $_userPwd;
		private $_userAvatar;
		private $_userRole;
		
		/* CONSTRUCTEUR */
		public function __construct(){
		}
		
	/**
     * @brief Fonction d'hydratation permettant d'asigner des valeurs aux paramètres de la classe en passant par les setters
     * @param $data Tableau associatif contenant les données à hydrater
     */

	public function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set'.str_replace('user','',$key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
		
		/* SETTERS */

		/**
     	* @brief Fonction setter pour ajouter un id à la class
    	* @param $intUserId integer
    	*/
		public function setId($intUserId){
			$this->_userId = $intUserId;
		}
		/**
     	* @brief Fonction setter pour ajouter un nom
     	* @param $strUserName string
     	*/
		public function setName($strUserName){
			$this->_userName = $strUserName;
		}
		/**
     	* @brief Fonction setter pour ajouter un prénom
     	* @param $strUserFirstname string
     	*/
		public function setFirstname($strUserFirstname){
			$this->_userFirstname = $strUserFirstname;
		}
		/**
     	* @brief Fonction setter pour ajouter une adresse mail
     	* @param $strUserEmail string
     	*/
		public function setEmail($strUserEmail){
			$this->_userEmail = $strUserEmail;
		}
		/**
     	* @brief Fonction setter pour ajouter un numéro de téléphone
     	* @param $strUserPhone string
     	*/
        public function setPhone($strUserPhone){
            $this->_userPhone = $strUserPhone;
		}
		/**
     	* @brief Fonction setter pour ajouter une adresse postale
     	* @param $strUserAddress string
     	*/
        public function setAddress($strUserAddress){
            $this->_userAddress = $strUserAddress;
		}
		/**
     	* @brief Fonction setter pour ajouter un code postal
     	* @param $strUserCp string
     	*/
        public function setCp($strUserCp){
            $this->_userCp = $strUserCp;
		}
		/**
     	* @brief Fonction setter pour ajouter une ville
     	* @param $strUserCity string
     	*/
        public function setCity($strUserCity){
            $this->_userCity = $strUserCity;
		}
		/**
     	* @brief Fonction setter pour ajouter un mot de passe 
     	* @param $strUserPwd string
     	*/
        public function setPwd($strUserPwd){
			$this->_userPwd = password_hash($strUserPwd, PASSWORD_DEFAULT);
		}
		/**
     	* @brief Fonction setter pour ajouter une photo de profil/Avatar
     	* @param $strUserAvatar string
     	*/
        public function setAvatar($strUserAvatar){
            $this->_userAvatar = $strUserAvatar;
		}
		/**
     	* @brief Fonction setter pour ajouter un rôle
     	* @param $strUserRole string
     	*/
		public function setRole($strUserRole){
            $this->_userRole = $strUserRole;
        }
		
		/* GETTERS */

		/**
    	* @brief Fonction getter permettant de récupérer l'ID d'un utilisateur
     	* @return integer l'identifiant
     	*/
		public function getId(){
			return $this->_userId;
		}
		/**
     	* @brief Fonction getter permettant de récupérer le nom d'un utilisateur
     	* @return integer le nom
     	*/
		public function getName(){
			return $this->_userName;
		}
		/**
     	* @brief Fonction getter permettant de récupérer le prénom d'un utilisateur
     	* @return integer le prénom
     	*/	
		public function getFirstname(){
			return $this->_userFirstname;
		}
		/**
     	* @brief Fonction getter permettant de récupérer l'adresse mail d'un utilisateur
     	* @return integer l'adresse mail
     	*/	
		public function getEmail(){
			return $this->_userEmail;
		}
		/**
     	* @brief Fonction getter permettant de récupérer le numéro de téléphone d'un utilisateur
     	* @return integer le numéro de téléphone
     	*/
        public function getPhone(){
			return $this->_userPhone;
		}
		/**
     	* @brief Fonction getter permettant de récupérer l'adresse postale d'un utilisateur
     	* @return integer l'adresse postale
     	*/
        public function getAddress(){
			return $this->_userAddress;
		}
		/**
     	* @brief Fonction getter permettant de récupérer le code postal d'un utilisateur
     	* @return integer le code postal
     	*/ 
        public function getCp(){
			return $this->_userCp;
		}
		/**
     	* @brief Fonction getter permettant de récupérer la ville d'un utilisateur
     	* @return integer la ville
     	*/ 
        public function getCity(){
			return $this->_userCity;
		}
		/**
     	* @brief Fonction getter permettant de récupérer le mot de passe d'un utilisateur
     	* @return integer le mot de passe
     	*/ 
		public function getPwd(){
			return $this->_userPwd;
		}
		/**
     	* @brief Fonction getter permettant de récupérer la photo de profil d'un utilisateur
     	* @return integer la photo de profil
     	*/ 
		public function getAvatar(){
			return $this->_userAvatar;
		}
		/**
     	* @brief Fonction getter permettant de récupérer le role d'un utilisateur
     	* @return integer le role
     	*/ 
		public function getRole(){
			return $this->_userRole;
		}	

		/**
    	* @brief Fonction getter permettant de récupérer les données
    	* @return integer les données liés à un utilisateur
    	*/
		public function getData(){
			$userData = get_object_vars($this);
	
			$data = array();
			foreach($userData as $key => $value){
				$data[substr($key, 1)] = $value;
			}
			$data = array_filter($data);
		   return $data;
		}	
	}
